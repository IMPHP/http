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

use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;
use im\http2\msg\Request as IRequest;
use im\http2\msg\Uri as IUri;
use im\features\Wrapper;

/**
 * A wrapper allowing you to use `im\http2\msg\Request` as `Psr\Http\Message\RequestInterface`
 */
class Request extends BaseMessage implements RequestInterface, Wrapper {

    /**
     * @param $request
     *      A Request to use
     */
    public function __construct(IRequest $request) {
        parent::__constructor($request);
    }

    /**
     * Return the original `im\http2\msg\IRequest`
     */
    #[Override("im\features\Wrapper")]
    public function unwrap(): IRequest|null {
        return $this->message;
    }

    /**
     * Retrieves the message's request target
     *
     * @return string
     */
    #[Override("Psr\Http\Message\RequestInterface")]
    public function getRequestTarget() /*string*/ {
        return $this->message->getRequestTarget();
    }

    /**
     * Return an instance with the specific request-target
     *
     * @param string $requestTarget
     *      A static request target
     *
     * @return static
     */
    #[Override("Psr\Http\Message\RequestInterface")]
    public function withRequestTarget(/*string*/ $requestTarget) /*static*/ {
        $self = clone $this;
        $self->setRequestTarget($requestTarget);

        return $self;
    }

    /**
     * Retrieves the HTTP method of the request
     *
     * @return string
     */
    #[Override("Psr\Http\Message\RequestInterface")]
    public function getMethod() /*string*/ {
        return $this->message->getMethod();
    }

    /**
     * Return an instance with the provided HTTP method
     *
     * @param string $method
     *      New method to use
     *
     * @return static
     */
    #[Override("Psr\Http\Message\RequestInterface")]
    public function withMethod(/*string*/ $method) /*static*/ {
        $self = clone $this;
        $self->setMethod($method);

        return $self;
    }

    /**
     * Retrieves the URI instance
     *
     * @return UriInterface
     */
    #[Override("Psr\Http\Message\RequestInterface")]
    public function getUri() /*UriInterface*/ {
        return new Uri($this->message->getUri());
    }

    /**
     * Returns an instance with the provided URI
     *
     * @param $uri
     *      New request URI to use
     *
     * @param bool $preserveHost
     *      Preserve the original state of the Host header
     *
     * @return static
     */
    #[Override("Psr\Http\Message\RequestInterface")]
    public function withUri(UriInterface $uri, /*bool*/ $preserveHost = false) /*static*/ {
        if ($uri instanceof Wrapper) {
            $uri = $uri->unwrap();

            if ($uri instanceof IUri) {
                $self = clone $this;
                $self->message->setUri($uri);
                $self->message->setPreserveHost($preserveHost);

                return $self;
            }
        }

        throw new InvalidArgumentException("Uri must be a wrapper containing a proper im\\http2\\msg\\Uri");
    }
}
