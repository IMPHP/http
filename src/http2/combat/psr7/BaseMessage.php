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
use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\StreamInterface;
use im\http2\msg\Message;
use im\io\Stream as IStream;
use im\features\Wrapper;

/**
 * A wrapper base allowing you to use `im\http2\msg\Message` as `Psr\Http\Message\MessageInterface`
 */
abstract class BaseMessage implements MessageInterface {

    /** @ignore */
    protected Message $message;

    /**
     * @param $message
     *      The HTTP Message to use
     */
    public function __construct(Message $message) {
        $this->message = $message->clone();
    }

    /**
     * @php
     */
    public function __clone() /*void*/ {
        $this->message = $this->message->clone();
    }

    /**
     * Return an instance with the specified HTTP protocol version
     *
     * @param string @version
     *      HTTP protocol version
     *
     * @return static
     */
    #[Override("Psr\Http\Message\MessageInterface")]
    public function withProtocolVersion(/*string*/ $version) /*static*/ {
        $self = clone $this;
        $self->message->setProtocolVersion($version);

        return $self;
    }

    /**
     * Retrieves the HTTP protocol version as a string
     *
     * @return string
     */
    #[Override("Psr\Http\Message\MessageInterface")]
    public function getProtocolVersion() /*string*/ {
        return $this->message->getProtocolVersion();
    }

    /**
     * Retrieves all message header values
     *
     * @return string[][]
     */
    #[Override("Psr\Http\Message\MessageInterface")]
    public function getHeaders() /*array*/ {
        $headers = [];

        foreach ($this->message as $name => $header) {
            $headers[$name] = $header->toArray();
        }

        return $headers;
    }

    /**
     * Checks if a header exists
     *
     * @param string $name
     *      Header field name
     *
     * @return bool
     */
    #[Override("Psr\Http\Message\MessageInterface")]
    public function hasHeader(/*string*/ $name) /*bool*/ {
        return $this->message->hasHeader($name);
    }

    /**
     * Retrieves a message header value
     *
     * @param string $name
     *      Header field name
     *
     * @return string[]
     */
    #[Override("Psr\Http\Message\MessageInterface")]
    public function getHeader(/*string*/ $name) /*array*/ {
        return $this->message->getHeader($name)->toArray();
    }

    /**
     * Retrieves a comma-separated string of the values for a single header
     *
     * @param string $name
     *      Header field name
     *
     * @return string
     */
    #[Override("Psr\Http\Message\MessageInterface")]
    public function getHeaderLine(/*string*/ $name) /*string*/ {
        return $this->message->getHeaderLine($name) ?? "";
    }

    /**
     * Return an instance with the provided value replacing the specified header
     *
     * @param string $name
     *      Header field name
     *
     * @param string|string[] $value
     *      Header value(s)
     *
     * @return static
     */
    #[Override("Psr\Http\Message\MessageInterface")]
    public function withHeader(/*string*/ $name, /*string|array*/ $value) /*static*/ {
        $self = clone $this;

        if (is_array($value)) {
            $self->message->removeHeader($name);

            foreach ($value as $headerValue) {
                $self->message->addHeader($name, $value);
            }

        } else {
            $self->message->setHeader($name, $value);
        }

        return $self;
    }

    /**
     * Return an instance with the specified header appended with the given value
     *
     * @param string $name
     *      Header field name
     *
     * @param string|string[] $value
     *      Header value(s)
     *
     * @return static
     */
    #[Override("Psr\Http\Message\MessageInterface")]
    public function withAddedHeader(/*string*/ $name, /*string|array*/ $value) /*static*/ {
        $self = clone $this;

        if (is_array($value)) {
            foreach ($value as $headerValue) {
                $self->message->addHeader($name, $value);
            }

        } else {
            $self->message->addHeader($name, $value);
        }

        return $self;
    }

    /**
     * Return an instance without the specified header
     *
     * @param string $name
     *      Header field name
     *
     * @return static
     */
    #[Override("Psr\Http\Message\MessageInterface")]
    public function withoutHeader($name) /*static*/ {
        $self = clone $this;
        $self->message->removeHeader($name);

        return $self;
    }

    /**
     * Gets the body of the message
     *
     * @return StreamInterface
     */
    public function getBody() /*StreamInterface*/ {
        return new Stream($self->message->getStream());
    }

    /**
     * Return an instance with the specified message body
     *
     * @param $body
     *      The new Body
     *
     * @return static
     * @throws \InvalidArgumentException
     */
    #[Override("Psr\Http\Message\MessageInterface")]
    public function withBody(StreamInterface $body) /*static*/ {
        if ($body instanceof Wrapper) {
            $stream = $body->unwrap();

            if ($stream instanceof IStream) {
                $self = clone $this;
                $self->message->setStream($stream);

                return $self;
            }
        }

        throw new InvalidArgumentException("Body must be a wrapper containing a proper im\\io\\Stream");
    }
}
