<?php declare(strict_types=1);
/*
 * This file is part of the IMPHP Project: https://github.com/IMPHP
 *
 * Copyright (c) 2022 Daniel Bergløv, License: MIT
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

namespace im\http2\combat\psr7;

use Psr\Http\Message\ResponseInterface;
use im\http2\msg\Response as IResponse;
use im\features\Wrapper;

/**
 * A wrapper allowing you to use `im\http2\msg\Response` as `Psr\Http\Message\ResponseInterface`
 */
class Response extends BaseMessage implements ResponseInterface, Wrapper {

    /**
     * @param $response
     *      A Response to use
     */
    public function __construct(IResponse $response) {
        parent::__constructor($response);
    }

    /**
     * Return the original `im\http2\msg\Response`
     */
    #[Override("im\features\Wrapper")]
    public function unwrap(): IResponse|null {
        return $this->message;
    }

    /**
     * Gets the response status code
     *
     * @return int
     */
    #[Override("Psr\Http\Message\ResponseInterface")]
    public function getStatusCode() /*int*/ {
        return $this->message->getStatusCode();
    }

    /**
     * Gets the response reason phrase associated with the status code
     *
     * @return string
     */
    #[Override("Psr\Http\Message\ResponseInterface")]
    public function getReasonPhrase() /*string*/ {
        return $this->message->getStatusReason();
    }

    /**
     * Return an instance with the specified status code and, optionally, reason phrase
     *
     * @param int $code
     *      The 3-digit integer result code to set
     *
     * @param string $reasonPhrase
     *      Optional reason phrase to use with the provided status code
     *
     * @return static
     */
    #[Override("Psr\Http\Message\ResponseInterface")]
    public function withStatus($code, $reasonPhrase = '') /*static*/ {
        $self = clone $this;
        $self->setStatus($code, !empty($reasonPhrase) ? $reasonPhrase : null);

        return $self;
    }
}
