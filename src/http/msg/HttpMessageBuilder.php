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

namespace im\http\msg;

use im\io\Stream;
use im\io\RawStream;
use im\util\MapArray;
use im\util\ListArray;
use im\util\Map;
use im\util\Vector;
use Exception;
use Traversable;

/**
 * This is an implementation of the `im\http\msg\MessageBuilder` interface
 */
abstract class HttpMessageBuilder implements MessageBuilder {

    /** @internal */
    protected ?Stream $stream = null;

    /** @internal */
    protected MapArray $headers;

    /** @internal */
    protected string $protocol = "1.1";

    /**
     * PSR7 states that header keys must be Case-insensitive.
     * imphp/http adopts this rules and so we need something
     * that can produce a proper case for the keys.
     *
     * @internal
     */
    protected function headerKey(string $key): string {
        return preg_replace_callback("/\b\w+\b/", function($match) { return ucfirst(strtolower($match[0])); }, str_replace(" ", "-", trim($key, " \t")));
    }

    /**
     *
     */
    public function __construct() {
        $this->headers = new Map();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\MessageBuilder")]
    public function hasHeader(string $name): bool {
        return $this->headers->isset( $this->headerKey($name) );
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\MessageBuilder")]
    public function inHeader(string $name, string $search): bool {
        $header = $this->headers->get( $this->headerKey($name) );

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
    #[Override("im\http\msg\MessageBuilder")]
    public function getHeader(string $name): ListArray {
        $header = $this->headers->get( $this->headerKey($name) );

        if ($header == null) {
            return new Vector();
        }

        return $header;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\MessageBuilder")]
    public function getHeaderLine(string $name): ?string {
        $header = $this->headers->get( $this->headerKey($name) );

        if ($header == null || $header->length() == 0) {
            return null;
        }

        return $header->join("; ");
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\MessageBuilder")]
    public function addHeader(string $name, string ...$values): void {
        $name = $this->headerKey($name);
        $header = $this->headers->get($name);

        if ($header == null) {
            $this->headers->set($name, ($header = new Vector()));

        } else {
            // Unlock the immutable header
            $this->headers->set($name, ($header = $header->copy()));
        }

        foreach ($values as $value) {
            $value = $this->filterHeader($value);

            if (strpos($value, ";") !== false) {
                foreach (explode(";", $value) as $subval) {
                    $header->add(trim($subval, " \t"));
                }

            } else {
                $header->add(trim($value, " \t"));
            }
        }

        $header->lock();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\MessageBuilder")]
    public function setHeader(string $name, string ...$values): void {
        $name = $this->headerKey($name);

        $this->headers->set($name, ($header = new Vector()));

        foreach ($values as $value) {
            $value = $this->filterHeader($value);

            if (strpos($value, ";") !== false) {
                foreach (explode(";", $value) as $subval) {
                    $header->add(trim($subval, " \t"));
                }

            } else {
                $header->add(trim($value, " \t"));
            }
        }

        $header->lock();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\MessageBuilder")]
    public function removeHeader(string $name): void {
        $this->headers->unset($this->headerKey($name));
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\MessageBuilder")]
    public function getProtocolVersion(): string {
        return $this->protocol;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\MessageBuilder")]
    public function setProtocolVersion(string $version): void {
        if (!preg_match("/^[0-9]\.[0-9]+$/", $version)) {
            throw new Exception("Invalid protocol '$version'");
        }

        $this->protocol = $version;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\MessageBuilder")]
    public function getBody(): Stream {
        if ($this->stream == null || $this->stream->getFlags() === 0) {
            $this->stream = new RawStream();
        }

        return $this->stream;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\MessageBuilder")]
    public function getBuilder(): MessageBuilder {
        return clone $this;
    }

    /**
     * @php
     */
    #[Override("im\http\msg\MessageBuilder")]
    public function getIterator(): Traversable {
        return $this->headers->getIterator();
    }

    /**
     * @php
     */
    public function __toString() {
        return $this->toString();
    }

    /**
     * @php
     */
    public function __clone() {
        $this->headers = $this->headers->copy();
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
    protected function filterHeader(string $value): string {
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
}
