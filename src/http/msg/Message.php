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
use IteratorAggregate;

/**
 * Defines a message object for the http message specification
 *
 * @note
 *      This interface extends IteratorAggregate to allow iterating through all
 *      the available headers within this message.
 * 
 * @deprecated 
 *      This has been replaced by `im\http2\msg\Message`
 */
interface Message extends IteratorAggregate {

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
    function getHeader(string $name): ListArray;

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
     * Get the protocol version like `1.0`, `1.1` or `2.0`
     */
    function getProtocolVersion(): string;

    /**
     * Get a message builder for the current message
     */
    function getBuilder(): MessageBuilder;

    /**
     * Get the current body stream
     */
    function getBody(): Stream;

    /**
     * Get a string of the request
     *
     * This is a text representation of the message.
     * It should print out headers and body in the same
     * form as if this was sent to the client
     */
    function toString(): string;
}
