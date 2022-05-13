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
use im\util\IndexArray;

/**
 * An implementation of `im\http\msg\Request`
 *
 * This abstraction is used to provide read-only access to a
 * request builder in order to comply with the `Request` interface.
 */
class HttpRequest extends HttpMessage implements Request {

    /**
     * @param $request
     *      A request or request builder
     */
    public function __construct(Request $request = NULL) {
        if ($request == NULL) {
            parent::__construct(new HttpRequestBuilder());

        } else {
            parent::__construct($request);
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Request")]
    public function getMethod(): string {
        return $this->message->getMethod();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Request")]
    public function getUri(): Uri {
        return $this->message->getUri();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Request")]
    public function getRequestTarget(): string {
        return $this->message->getRequestTarget();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Request")]
    public function getFile(string $name): ?File {
        return $this->message->getFile($name);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Request")]
    public function getFiles(string $name = null): IndexArray {
        return $this->message->getFiles($name);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Request")]
    public function getParam(string $name, mixed $default = null, string $type = Request::P_ATTR): mixed {
        return $this->message->getParam($name, $default, $type);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Request")]
    public function hasParam(string $name, string $type = Request::P_ATTR): bool {
        return $this->message->hasParam($name, $type);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Request")]
    public function getParsedBody(): mixed {
        return $this->message->getParsedBody();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Request")]
    public function getBody(): Stream {
        return $this->message->getBody();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Request")]
    public function toString(): string {
        return $this->message->toString();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\HttpMessage")]
    public function getBuilder(): RequestBuilder {
        return parent::getBuilder();
    }
}
