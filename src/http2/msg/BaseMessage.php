<?php declare(strict_types=1);
/*
 * This file is part of the IMPHP Project: https://github.com/IMPHP
 *
 * Copyright (c) 2016 Daniel Bergløv, License: MIT
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software
 * and associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO
 * THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR
 * THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace im\http2\msg;

use Traversable;
use Exception;
use im\io\Stream;
use im\io\RawStream;
use im\util\ImmutableListArray;
use im\util\MutableMappedArray;
use im\util\Map;
use im\util\HashSet;

/**
 * This is an implementation of the `im\http2\msg\Message` interface
 */
abstract class BaseMessage implements Message {

    /** @internal */
    protected ?Stream $body = null;

    /** @internal */
    protected MutableMappedArray $headers;

    /** @internal */
    protected MutableMappedArray $attributes;

    /** @internal */
    protected string $protocol = "1.1";

    /**
     * PSR7 states that header keys must be Case-insensitive.
     * imphp/http2 adopts this rule and so we need something
     * that can produce a proper case for the keys.
     *
     * @internal
     */
    protected static function headerKey(string $key): string {
        return preg_replace_callback("/\b\w+\b/", function($match) { return ucfirst(strtolower($match[0])); }, str_replace(" ", "-", trim($key, " \t")));
    }

    /**
     * Filter a header value
     *
     * Ensures CRLF header injection vectors are filtered.
     *
     * Per RFC 7230, only VISIBLE ASCII characters, spaces, and horizontal
     * tabs are allowed in values; header continuations MUST consist of
     * a single CRLF sequence followed by a space or horizontal tab.
     *
     * This method filters any values not allowed from the string, and is
     * lossy.
     *
     * @see http://en.wikipedia.org/wiki/HTTP_response_splitting
     * @see https://github.com/zendframework/zend-diactoros
     *
     * @internal
     */
    protected static function filterHeader(string $value): string {
        $value = trim(preg_replace("/[ \t]+/", " ", $value));
        $length = strlen($value);
        $filtered = '';

        for ($i = 0; $i < $length; $i += 1) {
            $ascii = ord($value[$i]);

            // Detect continuation sequences
            if ($ascii === 13) {
                $lf = ord($value[$i + 1]);
                $ws = ord($value[$i + 2]);

                if ($lf === 10 &&
                        ($ws === 9 || $ws === 32)) {

                    $filtered .= $value[$i] . $value[$i + 1];
                    $i += 1;
                }

                continue;
            }

            // Non-visible, non-whitespace characters
            // 9 === horizontal tab
            // 32-126, 128-254 === visible
            // 127 === DEL
            // 255 === null byte
            if (($ascii < 32 && $ascii !== 9)
                || $ascii === 127
                || $ascii > 254
            ) {
                continue;
            }

            $filtered .= $value[$i];
        }

        return $filtered;
    }

    /**
     *
     */
    public function __construct() {
        $this->headers = new Map();
        $this->attributes = new Map();
    }

    /**
     * @php
     */
    #[Override("im\http2\msg\Message")]
    public function getIterator(): Traversable {
        foreach ($this->headers as $name => $header) {
            yield $name => $header;
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Message")]
    public function getAttribute(string $name, mixed $default = null): mixed {
        return $this->attributes->get($name) ?? $default;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Message")]
    public function hasAttribute(string $name): bool {
        return $this->attributes->isset($name);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Message")]
    public function setAttribute(string $name, mixed $value): void {
        $this->attributes->set($name, $value);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Message")]
    public function removeAttribute(string $name): void {
        $this->attributes->unset($name);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Message")]
    public function hasHeader(string $name): bool {
        return $this->headers->isset( static::headerKey($name) );
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Message")]
    public function inHeader(string $name, string $search): bool {
        $header = $this->headers->get( static::headerKey($name) );

        if ($header == null || $header->length() == 0) {
            return false;
        }

        foreach ($header as $value) {
            if (stripos($value, $search) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Message")]
    public function getHeader(string $name): ImmutableListArray {
        $header = $this->headers->get( static::headerKey($name) );

        if ($header == null) {
            return new HashSet();
        }

        return $header;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Message")]
    public function getHeaderLine(string $name): ?string {
        $header = $this->headers->get( static::headerKey($name) );

        if ($header == null || $header->length() == 0) {
            return null;
        }

        return $header->join(", ");
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Message")]
    public function addHeader(string $name, string ...$values): void {
        if (count($values) == 0) {
            throw new Exception("You must provide at least one value to the header");
        }

        $name = static::headerKey($name);
        $header = $this->headers->get($name);

        if ($header == null) {
            $this->headers->set($name, ($header = new HashSet()));
        }

        foreach ($values as $value) {
            $value = static::filterHeader($value);

            if (preg_match("/^[a-z]+, [0-9]{2} [a-z]+ [0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2} [a-z]+$/i", $value)) {
                $header->add($value);

            } else if ($name == "Cookie") {
                foreach (explode(";", $value) as $subval) {
                    $header->add(trim($subval));
                }

            } else if ($name == "Set-Cookie") {
                $header->add($value);

            } else {
                foreach (explode(",", $value) as $subval) {
                    $header->add(trim($subval));
                }
            }
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Message")]
    public function setHeader(string $name, string ...$values): void {
        if (count($values) == 0) {
            throw new Exception("You must provide at least one value to the header");
        }

        $this->removeHeader($name);
        $this->addHeader($name, ...$values);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Message")]
    public function removeHeader(string $name): void {
        $this->headers->unset(static::headerKey($name));
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Message")]
    public function getProtocolVersion(): string {
        return $this->protocol;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Message")]
    public function setProtocolVersion(string $version): void {
        if (!in_array($version, ["1.1", "2.0", "2"])) {
            throw new Exception("Invalid protocol '$version'");

        } else if ($version == "2") {
            $version = "2.0";
        }

        $this->protocol = $version;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Message")]
    public function getStream(): Stream {
        if ($this->body == null || $this->body->getFlags() === 0) {
            $this->body = new RawStream();
        }

        return $this->body;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Message")]
    public function setStream(Stream $body): void {
        if ($body->getFlags() === 0) {
            throw new Exception("The body stream is inative");
        }

        $this->body = $body;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Message")]
    public function toString(): string {
        $headers = [];

        foreach ($this as $name => $value) {
            if ($name == "Cookie") {
                $headers[] = sprintf("Cookie: %s", $value->join("; "));

            } else if ($name == "Set-Cookie") {
                foreach ($value as $cookie) {
                    $headers[] = sprintf("Set-Cookie: %s", $cookie);
                }

            } else {
                $headers[] = sprintf("%s: %s", $name, $value->join(", "));
            }
        }

        return implode("\n", $headers);
    }

    /**
     * @php
     */
    public function __toString() {
        return $this->toString();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Message")]
    public function clone(): static {
        return clone $this;
    }

    /**
     * @php
     */
    public function __clone() {
        $this->headers = $this->headers->clone();
        $this->attributes = $this->attributes->clone();
    }
}
