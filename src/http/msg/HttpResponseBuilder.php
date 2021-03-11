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

use im\io\Stream;
use Exception;

/**
 * An implementation of `im\http\msg\ResponseBuilder`
 */
class HttpResponseBuilder extends HttpMessageBuilder implements ResponseBuilder {

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
    #[Override("im\http\msg\ResponseBuilder")]
    public function getStatusCode(): int {
        return $this->status;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\ResponseBuilder")]
    public function getStatusReason(): string {
        if ($this->reason == null) {
            $code = $this->getStatusCode();
            $const = Response::class . "::REASON_{$code}";

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
    #[Override("im\http\msg\ResponseBuilder")]
    public function setStatus(int $code, string $reasonPhrase = null): void {
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
    #[Override("im\http\msg\ResponseBuilder")]
    public function setBody(Stream $body): void {
        if (!$body->isWritable()) {
            throw new Exception("A response body must be writable");
        }

        $this->stream = $body;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\HttpMessageBuilder")]
    public function getBuilder(): ResponseBuilder {
        return parent::getBuilder();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\ResponseBuilder")]
    public function getFinal(): Response {
        return new HttpResponse($this);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\ResponseBuilder")]
    public function toString(): string {
        $headers = [];

        if (!$this->hasHeader("content-type")) {
            $headers[] = sprintf("Content-Type: text/html; charset=utf-8");
        }

        foreach ($this as $name => $value) {
            $headers[] = sprintf("%s: %s", $name, $value->join("; "));
        }

        return sprintf("HTTP/%s %s %s\n\n%s\n\n%s",
            $this->getProtocolVersion(),
            $this->getStatusCode(),
            $this->getStatusReason(),
            implode("\n", $headers),
            $this->getBody()->toString()
        );
    }
}
