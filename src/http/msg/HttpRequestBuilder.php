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
use im\io\FileStream;
use im\util\MapArray;
use im\util\IndexArray;
use im\util\Map;
use im\util\Vector;
use Exception;

/**
 * An implementation of `im\http\msg\RequestBuilder`
 */
class HttpRequestBuilder extends HttpMessageBuilder implements RequestBuilder {

    /** @internal */
    protected mixed $parsedBody = null;

    /** @internal */
    protected MapArray $params;

    /** @internal */
    protected IndexArray $files;

    /** @internal */
    private ?string $requestTarget = null;

    /** @internal */
    private ?Uri $uri = null;

    /** @internal */
    private string $method = "GET";

    /** @internal */
    protected ?StreamParser $parser = null;

    /**
     * @param $method
     *      The request method
     *
     * @param $uri
     *      The request URI
     *
     * @param $parser
     *      Optional parser used to parse the content of the body
     */
    public function __construct(string $method, Uri $uri, StreamParser $parser = null) {
        parent::__construct();

        $this->files = new Vector();
        $this->params = new Map();
        $this->parser = $parser;

        $this->setMethod($method);
        $this->setUri($uri);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function getMethod(): string {
        return $this->method;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function setMethod(string $method): void {
        if (!preg_match("/^[a-z]+$/i", $method)) {
            throw new Exception("Invalid method '$method'");
        }

        $this->method = strtoupper($method);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function getUri(): Uri {
        return $this->uri;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function setUri(Uri $uri, bool $preserveHost = false): void {
        $this->params->unset( Request::P_QUERY ); // New and needs to be rebuild
        $this->uri = $uri instanceof UriBuilder
                        ? $uri->getFinal() : $uri;

        $host = $uri->getHost();
        $header = $this->getHeader("Host");

        if (!empty($host) && (!$preserveHost || $header->length() == 0)) {
            $this->setHeader("Host", $host);
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function getRequestTarget(): string {
        if ($this->requestTarget == null) {
            /*
             * Do not store this value in 'mRequestTarget'.
             * Unless 'setRequestTarget' has been used, we should always get this
             * from the Uri object, it may change.
             */

            $uri = $this->getUri();
            $path = $uri->getFullPath();
            $query = $uri->getQuery();

            return preg_replace("/\s+/", "%20", rawurldecode($path . (!empty($query) ? "?" : "") . $query));
        }

        return $this->requestTarget;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function setRequestTarget(?string $requestTarget): void {
        if (!empty($requestTarget)) {
            $this->requestTarget = preg_replace("/\s+/", "%20", rawurldecode(trim($requestTarget)));

        } else {
            $this->requestTarget = null;
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function addFile(File $file): void {
        $this->files->add($file);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function getFile(string $name): ?File {
        foreach ($this->files as $file) {
            if ($file->getName() == $name) {
                return $file;
            }
        }

        return $file;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function removeFile(string $name): void {
        $this->files = $this->files->copy(function($key, $file) use ($name) {
            return $file->getName() != $name;
        });
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function getFiles(string $name = null): IndexArray {
        if ($name != null) {
            $files = $this->files->copy(function($key, $file) use ($name) {
                return $file->getName() == $name;
            });

        } else {
            $files = $this->files->copy();
        }

        $files->lock();

        return $files;
    }

    /**
     * @internal
     */
    protected function buildParams(string $type): MapArray {
        $map = new Map();

        switch ($type) {
            // Equal to PHP's $_POST
            case Request::P_BODY:
                if (is_array($this->parsedBody)) {
                    foreach ($this->parsedBody as $key => $value) {
                        if (is_string($key)) {
                            $map->set($key, $value);
                        }
                    }
                }

                break;

            // Equal to PHP's $_COOKIE
            case Request::P_COOKIES:
                $headers = $this->getHeader("Cookie");

                foreach ($headers as $header) {
                    $cookies = explode("; ", implode("; ", $header));

                    foreach ($cookies as $cookie) {
                        $name = substr($cookie, 0, ($pos = strpos($cookie, "=")));
                        $value = urldecode(substr($cookie, $pos+1));

                        $map->set($name, $value);
                    }
                }

                break;

            // Equal to PHP's $_GET
            case Request::P_QUERY:
                $query = $this->getUri()->getQuery();

                if (!empty($query)) {
                    parse_str($query, $list);

                    if (!empty($list)) {
                        foreach ($list as $key => $value) {
                            $map->set($key, $value);
                        }
                    }
                }
        }

        return $map;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function getParam(string $name, mixed $default = null, string $type = Request::P_ATTR): mixed {
        $map = $this->params->get($type);

        if ($map == null) {
            $this->params->set($type, ($map = buildParams($type)));
        }

        return $map->get($name);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function hasParam(string $name, string $type = Request::P_ATTR): bool {
        $map = $this->params->get($type);

        if ($map == null) {
            $this->params->set($type, ($map = buildParams($type)));
        }

        return $map->isset($name);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function setParam(string $name, mixed $value, string $type = Request::P_ATTR): void {
        $map = $this->params->get($type);

        if ($map == null) {
            $this->params->set($type, ($map = buildParams($type)));
        }

        $map->set($name, $value);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function getParsedBody(): mixed {
        if ($this->parsedBody == null
                && $this->parser != null) {

            if ($this->hasHeader("content-type")) {
                $type = $this->getHeader("content-type")->join(";");

            } else {
                $type = "text/plain";
            }

            $this->parsedBody = $this->parser->parse($this->getStream(), $type);
        }

        return $this->parsedBody;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function getBody(): Stream {
        /* We copy input to a temp stream so that other instances may be created
         * with the original content intact.
         */
        if ($this->stream == null) {
            $this->stream = new RawStream();
            $this->stream->writeFromStream( new FileStream("php://input", 'r') );
            $this->stream->rewind();
        }

        return $this->stream;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function setBody(Stream $body): void {
        if (!$body->isReadable()) {
            throw new Exception("A request body must be readable");
        }

        $this->stream = $body;
        $this->parsedBody = null;
        $this->params->unset( Request::P_BODY ); // New and needs to be rebuild
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function toString(): string {
        $headers = [];

        foreach ($this as $name => $value) {
            $headers[] = sprintf("%s: %s", $name, $value->join("; "));
        }

        return sprintf("%s %s HTTP/%s\n\n%s\n\n%s",
            $this->getMethod(),
            $this->getRequestTarget(),
            $this->getProtocolVersion(),
            implode("\n", $headers),
            $this->getBody()->toString()
        );
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\HttpMessageBuilder")]
    public function getBuilder(): RequestBuilder {
        return parent::getBuilder();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\RequestBuilder")]
    public function getFinal(): Request {
        return new HttpRequest($this);
    }

    /**
     * @php
     */
    public function __clone() {
        parent::__clone();

        $this->params = $this->params->copy();
        $this->files = $this->files->copy();
        $this->parsedBody = null;
    }
}
