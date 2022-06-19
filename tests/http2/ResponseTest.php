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
use im\http2\Response;

/**
 *
 */
class ResponseTest extends MessageBase {

    /**
     *
     */
    public function init(): Message {
        return new Response(Response::STATUS_OK);
    }

    /**
     *
     */
    public function test_basic(): void {
        $response = $this->init();
        $response->getStream()->write("Body");

        $this->assertEquals(
            "HTTP/1.1 200 OK\n\nContent-Type: text/html; charset=utf-8\n\nBody",
            (string) $response
        );
    }

    /**
     *  
     */
    public function test_output(): void {
        $response = $this->init();
        $response->getStream()->write("Body");

        ob_start();
        $response->print();
        $output = ob_get_contents();
        ob_end_clean();

        $this->assertEquals(
            "HTTP/1.1 200 OK\n\nContent-Type: text/html; charset=utf-8\n\nBody",
            $output
        );
    }
}
