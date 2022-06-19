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
use im\http2\Uri;
use im\http2\Request;

/**
 *
 */
class RequestTest extends MessageBase {

    /**
     *
     */
    public function init(): Message {
        $uri = new Uri("http://www.domain.com");
        $request = new Request("GET", $uri);

        return $request;
    }

    /**
     *
     */
    public function test_preserveHost(): void {
        $msg = $this->init();
        $this->assertEquals(
            "www.domain.com",
            $msg->getHeaderLine("host")
        );

        $msg->setHeader("host", "localhost");
        $this->assertEquals(
            "localhost",
            $msg->getHeaderLine("host")
        );

        $msg->setPreserveHost(true);
        $this->assertEquals(
            "www.domain.com",
            $msg->getHeaderLine("host")
        );

        foreach ($msg as $name => $header) {
            if ($name == "Host") {
                $this->assertEquals(
                    "www.domain.com",
                    $header->join()
                );

                break;
            }
        }
    }
}
