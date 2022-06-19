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
use im\util\ListArray;
use Traversable;

/**
 * This is an implementation of the `im\http\msg\Message` interface
 * 
 * @deprecated 
 *      This has been replaced by `im\http2\msg\BaseMessage`
 */
abstract class HttpMessage implements Message {

    /** @internal */
    protected Message $message;

    /**
     *
     */
    public function __construct(Message $message) {
        $this->message = clone $message;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Message")]
    public function hasHeader(string $name): bool {
        return $this->message->hasHeader($name);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Message")]
    public function inHeader(string $name, string $search): bool {
        return $this->message->inHeader($name, $search);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Message")]
    public function getHeader(string $name): ListArray {
        return $this->message->getHeader($name);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Message")]
    public function getHeaderLine(string $name): ?string {
        return $this->message->getHeaderLine($name);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Message")]
    public function getProtocolVersion(): string {
        return $this->message->getProtocolVersion();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Message")]
    public function getBody(): Stream {
        return $this->message->getBody();
    }

    /**
     * @php
     */
    #[Override("im\http\msg\Message")]
    public function getIterator(): Traversable {
        return $this->message->getIterator();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Message")]
    public function getBuilder(): MessageBuilder {
        return $this->message->getBuilder();
    }

    /**
     * @php
     */
    public function __toString() {
        return $this->message->toString();
    }
}
