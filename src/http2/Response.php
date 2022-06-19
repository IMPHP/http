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

namespace im\http2;

use Exception;
use im\http2\msg\Response as IResponse;
use im\http2\msg\BaseMessage;
use im\io\Stream;
use im\io\FileStream;

/**
 * An implementation of `im\http2\msg\Response`
 */
class Response extends BaseMessage implements IResponse {

    /**
     * @internal
     */
    protected int $status;

    /**
     * @internal
     */
    protected ?string $reason = null;

    /**
     * @param $code
     *      The response code
     */
    public function __construct(int $code = Response::STATUS_OK) {
        parent::__construct();

        $this->setStatus($code);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Response")]
    public function getStatusCode(): int {
        return $this->status;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Response")]
    public function getStatusReason(): string {
        if ($this->reason == null) {
            $code = $this->getStatusCode();
            $const = IResponse::class . "::REASON_{$code}";

            if (!defined($const)) {
                return match ( intval( $code / 100 ) ) {
                    1 => "Informational",
                    2 => "Success",
                    3 => "Redirection",
                    4 => "Client Error",

                    default => "Server Error"
                };
            }

            return constant($const);
        }

        return $this->reason;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Response")]
    public function setStatus(int $code, string|null $reasonPhrase = null): void {
        if ($code < 100 || $code > 599) {
            throw new Exception("Invalid status code '$code'");
        }

        $this->status = $code;

        if (!empty($reasonPhrase)) {
            $this->reason = $this->filterHeader($reasonPhrase);

        } else {
            $this->reason = null;
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\BaseMessage")]
    public function setStream(Stream $body): void {
        if (!$body->isReadable()) {
            throw new Exception("A response body must be readable");
        }

        $this->stream = $body;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\BaseMessage")]
    public function toString(): string {
        $headers = parent::toString();

        if (!$this->hasHeader("content-type")) {
            if (!empty($headers)) {
                $headers = "\n" . $headers;
            }

            $headers = "Content-Type: text/html; charset=utf-8" . $headers;
        }

        return sprintf("HTTP/%s %s %s\n\n%s\n\n%s",
            $this->getProtocolVersion(),
            $this->getStatusCode(),
            $this->getStatusReason(),
            $headers,
            (string) $this->getStream()
        );
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\BaseMessage")]
    public function print(): void {
        $body = $this->getStream();
        $headers = parent::toString();

        if (!$this->hasHeader("content-type")) {
            if (!empty($headers)) {
                $headers = "\n" . $headers;
            }

            $headers = "Content-Type: text/html; charset=utf-8" . $headers;
        }

        if ($body->isSeekable()) {
            $body->rewind();
        }

        $output = new FileStream("php://output", "w");
        $output->write(sprintf("HTTP/%s %s %s\n\n%s\n\n",
            $this->getProtocolVersion(),
            $this->getStatusCode(),
            $this->getStatusReason(),
            $headers
        ));

        $output->writeFromStream($body);
        $output->close();
    }
}
