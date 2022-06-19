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

namespace im\http2;

use Traversable;
use Exception;
use im\http2\msg\Uri as IUri;
use im\http2\msg\Request as IRequest;
use im\http2\msg\BaseMessage;
use im\http2\msg\File;
use im\http2\msg\ContentParser;
use im\util\ImmutableListArray;
use im\util\MutableListArray;
use im\util\MutableMappedArray;
use im\util\HashSet;
use im\util\Map;
use im\io\Stream;
use im\io\RawStream;
use im\io\FileStream;

/**
 * An implementation of `im\http2\msg\Request`
 */
class Request extends BaseMessage implements IRequest {

    /** @internal */
    protected mixed $parsedBody = null;

    /** @internal */
    protected MutableMappedArray $parsers;

    /** @internal */
    protected MutableListArray $files;

    /** @internal */
    private ?string $requestTarget = null;

    /** @internal */
    private ?Uri $uri = null;

    /** @internal */
    private string $method = "GET";

    /** @internal */
    private bool $preserveHost = false;

    /**
     * @param $method
     *      The request method
     *
     * @param $uri
     *      The request URI
     */
    public function __construct(?string $method = null, ?IUri $uri = null) {
        parent::__construct();

        $this->files = new HashSet();
        $this->parsers = new Map();

        if ($method != null) {
            $this->setMethod($method);
        }

        if ($uri != null) {
            $this->setUri($uri);
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Request")]
    public function setParser(ContentParser $parser, string|null $contentType = null): void {
        $this->parsers->set(
            $contentType !== null ? strtolower($contentType) : "null",
            $parser
        );
    }

    /**
     * @php
     */
    #[Override("im\http2\msg\BaseMessage")]
    public function getIterator(): Traversable {
        foreach (parent::getIterator() as $name => $header) {
            if ($name == "Host") {
                $header = $this->getHeader($name);
            }

            yield $name => $header;
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\BaseMessage")]
    public function hasHeader(string $name): bool {
        $name = static::headerKey($name);

        if ($name == "Host" && !$this->headers->isset($name)) {
            return $this->getUri()->getHost() != null;
        }

        return parent::hasHeader($name);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\BaseMessage")]
    public function inHeader(string $name, string $search): bool {
        $name = static::headerKey($name);

        if ($name == "Host" &&
                ($this->preserveHost || !$this->headers->isset($name))) {

            $host = $this->getUri()->getHost();

            if ($host != null) {
                return stripos($host, $search) !== false;
            }
        }

        return parent::inHeader($name, $search);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\BaseMessage")]
    public function getHeader(string $name): ImmutableListArray {
        $name = static::headerKey($name);

        if ($name == "Host" &&
                ($this->preserveHost || !$this->headers->isset($name))) {

            $host = $this->getUri()->getHost();

            if ($host != null) {
                $header = new HashSet();
                $header->add($host);

                return $header;
            }
        }

        return parent::getHeader($name);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\BaseMessage")]
    public function getHeaderLine(string $name): ?string {
        $name = static::headerKey($name);

        if ($name == "Host" &&
                ($this->preserveHost || !$this->headers->isset($name))) {

            $host = $this->getUri()->getHost();

            if ($host != null) {
                return $host;
            }
        }

        return parent::getHeaderLine($name);
    }

    /**
     *
     */
    #[Override("im\http2\msg\Request")]
    public function setPreserveHost(bool $flag): void {
        $this->preserveHost = $flag;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Request")]
    public function getMethod(): string {
        return $this->method;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Request")]
    public function setMethod(string $method): void {
        if (!preg_match("/^[a-z]+$/i", $method)) {
            throw new Exception("Invalid method '$method'");
        }

        $this->method = strtoupper($method);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Request")]
    public function getUri(): IUri {
        if ($this->uri == null) {
            $this->uri = new Uri();
        }

        return $this->uri;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Request")]
    public function setUri(IUri $uri): void {
        $this->uri = $uri;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Request")]
    public function getRequestTarget(): string {
        if ($this->requestTarget == null) {
            /*
             * Do not store this value in 'mRequestTarget'.
             * Unless 'setRequestTarget' has been used, we should always get this
             * from the Uri object, it may change.
             */

            $uri = $this->getUri();
            $path = $uri->getPath();
            $query = $uri->getQuerystring();

            $target = preg_replace("/\s+/", "%20", rawurldecode($path . (!empty($query) ? "?" : "") . $query));

            if (empty($target)) {
                return "/";
            }

            return $target;
        }

        return $this->requestTarget;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Request")]
    public function setRequestTarget(string|null $requestTarget): void {
        if (!empty($requestTarget)) {
            $this->requestTarget = preg_replace("/\s+/", "%20", rawurldecode(trim($requestTarget)));

        } else {
            $this->requestTarget = null;
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Request")]
    public function hasFile(string $name): bool {
        return $this->getFile($name) !== null;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Request")]
    public function addFile(File $file): void {
        $this->files->add($file);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Request")]
    public function getFile(string $name): ?File {
        foreach ($this->files as $file) {
            if ($file->getName() == $name) {
                return $file;
            }
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Request")]
    public function removeFiles(string|null $name = null): void {
        if ($name != null) {
            $this->files = $this->files->filter(function($file) use ($name) {
                return $file->getName() != $name;
            });

        } else {
            $this->files->clear();
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Request")]
    public function getFiles(string|null $name = null): ImmutableListArray {
        if ($name != null) {
            $files = $this->files->filter(function($file) use ($name) {
                return $file->getName() == $name;
            });

        } else {
            $files = $this->files->clone();
        }

        return $files;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Request")]
    public function getParsedData(): mixed {
        if ($this->parsedBody === null
                && $this->hasHeader("content-type")) {

            $type = $this->getHeaderLine("content-type");

            if (($pos = strpos($type, ";")) !== false) {
                $type = substr($type, $pos);
            }

            if (($parser = $this->parsers->get(strtolower($type))) != null) {
                $this->parsedBody = $parser->parse($this->getStream(), $type);
            }
        }

        if (empty($this->parsedBody)
                && ($parser = $this->parsers->get("null")) != null) {

            $this->parsedBody = $parser->parse($this->getStream(), $type);
        }

        return $this->parsedBody;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\BaseMessage")]
    public function getStream(): Stream {
        /* We copy input to a temp stream so that other instances may be created
         * with the original content intact.
         */
        if ($this->body == null) {
            $this->body = new RawStream();
            $this->body->writeFromStream( new FileStream("php://input", "r") );
            $this->body->rewind();
        }

        return $this->body;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\BaseMessage")]
    public function setStream(Stream $body): void {
        if (!$body->isReadable()) {
            throw new Exception("A request body must be readable");
        }

        $this->body = $body;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\BaseMessage")]
    public function toString(): string {
        return sprintf("%s %s HTTP/%s\n\n%s\n\n%s",
            $this->getMethod(),
            $this->getRequestTarget(),
            $this->getProtocolVersion(),
            parent::toString(),
            $this->getStream()->toString()
        );
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\BaseMessage")]
    public function print(): void {
        $body = $this->getStream();

        if ($body->isSeekable()) {
            $body->rewind();
        }

        $output = new FileStream("php://output", "w");
        $output->write(sprintf("%s %s HTTP/%s\n\n%s\n\n",
            $this->getMethod(),
            $this->getRequestTarget(),
            $this->getProtocolVersion(),
            parent::toString()
        ));

        $output->writeFromStream($body);
        $output->close();
    }

    /**
     * @php
     */
    #[Override("im\http2\msg\BaseMessage")]
    public function __clone() {
        parent::__clone();

        $this->files = $this->files->clone();
    }
}
