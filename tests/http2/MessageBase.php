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

use Exception;
use PHPUnit\Framework\TestCase;
use im\http2\msg\Message;

/**
 *
 */
abstract class MessageBase extends TestCase {

    /**
     *
     */
    abstract function init(): Message;

    /**
     *
     */
    public function test_headers(): void {
        $msg = $this->init();

        $msg->setHeader("content-type", "text/plain");
        $this->assertTrue(
            $msg->hasHeader("Content-Type")
        );

        $this->assertEquals(
            "text/plain",
            $msg->getHeaderLine("content-type")
        );

        foreach ($msg->getHeader("content-type") as $headerLine) {
            $this->assertEquals(
                "text/plain",
                $headerLine
            );
        }

        $i=0;
        foreach ($msg as $name => $header) {
            if ($name == "Content-Type") {
                foreach ($header as $name => $headerLine) {
                    $this->assertEquals(
                        "text/plain",
                        $headerLine
                    );

                    $i++;
                    break 2;
                }
            }
        }

        $this->assertEquals(
            1,
            $i
        );

        $msg->removeHeader("content-type");
        $this->assertFalse(
            $msg->hasHeader("Content-Type")
        );
    }

    /**
     *
     */
    public function test_protocolVersion(): void {
        $msg = $this->init();
        $this->assertEquals(
            "1.1",
            $msg->getProtocolVersion()
        );

        $msg->setProtocolVersion("2");
        $this->assertEquals(
            "2.0",
            $msg->getProtocolVersion()
        );

        $this->expectException(Exception::class);
        $msg->setProtocolVersion("1.2");
    }
}
