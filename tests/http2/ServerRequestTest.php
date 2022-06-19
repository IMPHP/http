<?php declare(strict_types=1);
/*
 * This file is part of the IMPHP Project: https://github.com/IMPHP
 *
 * Copyright (c) 2018 Daniel Bergløv, License: MIT
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
namespace im\test\http2;

use im\http2\msg\Message;
use im\http2\ServerRequest;

$_SERVER += [
    "HTTPS" => "ON",
    "HTTP_CONTENT_TYPE" => "text/plain",
    "HTTP_HOST" => "domain.com",
    "REQUEST_METHOD" => "GET",
    "REQUEST_URI" => "/index.php/path/?mykey=some+value",
    "SCRIPT_NAME" => "index.php",
    "SERVER_PORT" => 8080
];

/**
 *
 */
class ServerRequestTest extends MessageBase {

    /**
     *
     */
    public function init(): Message {
        return new ServerRequest();
    }

    /**
     *
     */
    public function test_globals(): void {
        $request = $this->init();
        $request->getStream()->write("Body");

        $this->assertEquals(
            "GET /index.php/path/?mykey=some+value HTTP/1.1\n\nContent-Type: text/plain\nHost: domain.com\n\nBody",
            (string) $request
        );
    }
}
