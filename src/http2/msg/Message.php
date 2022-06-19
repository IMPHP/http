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

namespace im\http2\msg;

use IteratorAggregate;
use im\features\Stringable;
use im\features\Cloneable;
use im\util\ImmutableListArray;
use im\io\Stream;

/**
 * Defines a message object for the http message specification
 */
interface Message extends Stringable, Cloneable, IteratorAggregate {

    /**
     * Retrieve a single attribute
     *
     * @param $name
     *      Name of the attribute
     *
     * @param $default
     *      A default value for when the attribute does not exist
     */
    function getAttribute(string $name, mixed $default = null): mixed;

    /**
     * Check to see if an attribute exists
     *
     * @param $name
     *      Name of the attribute
     */
    function hasAttribute(string $name): bool;

    /**
     * Add/Change an attribute value
     *
     * @param $name
     *      Name of the attribute
     *
     * @param $value
     *      The value to set on the attribute
     */
    function setAttribute(string $name, mixed $value): void;

    /**
     * Remove an attribute value
     *
     * @param $name
     *      Name of the attribute
     */
    function removeAttribute(string $name): void;

    /**
     * Check to see if there is a header with this name
     *
     * Names are Case-insensitive
     *
     * @param string $name
     *      Name of the header
     *
     * @return bool
     */
    function hasHeader(string $name): bool;

    /**
     * Perform a Case-insensitive value search on a header
     *
     * Each header can have multiple values in the form of an indexed array or similar.
     * This method performs a value search on each value index, either the
     * whole value or a partial match ($partial) e.g. `strpos()`
     *
     * @param string $name
     *      Name of the header
     *
     * @param string $search
     *      Value of partial value to search for
     *
     * @return bool
     */
    function inHeader(string $name, string $search): bool;

    /**
     * Returns the value indexed array for a specific header
     *
     * Name is Case-insensitive
     *
     * @param string $name
     *      Name of the header
     */
    function getHeader(string $name): ImmutableListArray;

    /**
     * Returns the entire header line.
     *
     * Name is Case-insensitive
     *
     * @param string $name
     *      Name of the header
     */
    function getHeaderLine(string $name): ?string;

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
     *      Output: text/html, utf-8
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
     * Get the protocol version like `1.0`, `1.1` or `2.0`
     */
    function getProtocolVersion(): string;

    /**
     * Set a different protocol version like `1.0`, `1.1` or `2.0`
     *
     * @param string $version
     *      The new protocol version
     */
    function setProtocolVersion(string $version): void;

    /**
     * Get the current body stream
     */
    function getStream(): Stream;

    /**
     * Set a new body stream
     *
     * @param Stream $body
     *      The new stream to use
     */
    function setStream(Stream $body): void;

    /**
     * Print message to stdout
     *
     * This is similar to `toString()` except that it
     * will directly output this to the client. This is more effeicient
     * if you as an example is outputting file content for downloading, as
     * reading an entire file to memory may be slow, leed to memory issues and more.
     */
    function print(): void;
}
