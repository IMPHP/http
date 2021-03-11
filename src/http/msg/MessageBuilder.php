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

/**
 * Defines a message builder for the http message specification
 */
interface MessageBuilder extends Message {

    /**
     * Add content to a header or create it
     *
     * This method will append data to an existing one, or
     * create it if it does not already exist.
     *
     * @param string $name
     *      Name of the header
     *
     * @param string ...$values
     *      One or more value strings
     *
     * @example
     *      ```php
     *      $msg->setHeader("Content-Type", "text/html");
     *      $msg->addHeader("Content-Type", "utf-8");
     *
     *      echo $msg->getHeaderLine("Content-Type");
     *      ```
     *
     *      ```
     *      Output: text/html; utf-8
     *      ```
     */
    function addHeader(string $name, string ...$values): void;

    /**
     * Set/change a header
     *
     * @note
     *      This method replaces the existing header if any.
     *
     * @param string $name
     *      Name of the header
     *
     * @param string ...$values
     *      One or more value strings
     */
    function setHeader(string $name, string ...$values): void;

    /**
     * Remove specified header
     *
     * @param string $name
     *      Name of the header
     */
    function removeHeader(string $name): void;

    /**
     * Set a different protocol version like `1.0`, `1.1` or `2.0`
     *
     * @param string $version
     *      The new protocol version
     */
    function setProtocolVersion(string $version): void;

    /**
     * Get a read-only message object
     */
    function getFinal(): Message;

    /**
     * Set a new body stream
     *
     * @param Stream $body
     *      The new stream to use
     */
    function setBody(Stream $body): void;
}
