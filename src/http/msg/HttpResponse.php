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
 * THE SOFTWARE IS PROVIDED "AS IS"; WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO
 * THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR
 * THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace im\http\msg;

/**
 * An implementation of `im\http\msg\Response`
 *
 * This abstraction is used to provide read-only access to a
 * response builder in order to comply with the `Response` interface.
 */
class HttpResponse extends HttpMessage implements Response {

    /**
     * @param $response
     *      A response or response builder
     */
    public function __construct(Response $response) {
        parent::__construct($response);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Response")]
    public function getStatusCode(): int {
        return $this->message->getStatusCode();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Response")]
    public function getStatusReason(): string {
        return $this->message->getStatusReason();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Response")]
    public function toString(): string {
        return $this->message->toString();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\HttpMessage")]
    public function getBuilder(): ResponseBuilder {
        return parent::getBuilder();
    }
}
