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

/**
 * Defines a Request builder for the http message specification
 */
interface RequestBuilder extends Request, MessageBuilder {

    /**
     * Get a new instance with modified request method
     *
     * @param string $method
     *      The new method
     */
    function setMethod(string $method): void;

    /**
     * Set a new Uri object
     *
     * Unless $preserveHost is specified as `FASLE`, this will
     * update the `Host` header within this request to match the
     * host of the Uri object.
     *
     * This will also clear/rebuild `P_QUERY` so that the
     * query params matches the query from the new Uri object.
     *
     * @param Uri $uri
     *      The new Uri object
     *
     * @param bool $preserveHost
     *      If `FALSE` the Host header will not be updated (Defaults to `FALSE`)
     */
    function setUri(Uri $uri, bool $preserveHost = false): void;

    /**
     * Set a new request target
     *
     * Note that this will stop the request target from being updated
     * when changing the Uri object
     *
     * @param string $requestTarget
     *      The new request target
     */
    function setRequestTarget(string $requestTarget): void;

    /**
     * Add a file to this request
     *
     * @param $file
     *      The file to add
     */
    function addFile(File $file): void;

    /**
     * Remove a specific file based on it's name
     *
     * @note
     *      In case of multiple files with the same name,
     *      this method will remove all of them.
     *
     * @param $name
     *      The name of the file to remove
     */
    function removeFile(string $name): void;

    /**
     * Set/Change the value of a param
     *
     * @param $name
     *      The name of the param
     *
     * @param $value
     *      The new value to set
     *
     * @param $type
     *      The param type e.g. `Request::P_ATTR`, `Request::P_QUERY` etc...
     */
    function setParam(string $name, mixed $value, string $type = Request::P_ATTR): void;

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\MessageBuilder")]
    function getFinal(): Request;
}
