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

use im\util\ImmutableListArray;

/**
 * Defines a Request object for the http message specification
 */
interface Request extends Message {

    /**
     * Add a parser for a given content type
     *
     * The parser being added is used to parse the stream data when calling
     * `getParsedData()`.
     *
     * @param $parser
     *      A parser to add
     *
     * @param $contentType
     *      The content type that this parser can deal with.
     *      A `NULL` value indicates any type.
     */
    function setParser(ContentParser $parser, string|null $contentType = null): void;

    /**
     * Get the parsed data from the request stream
     *
     * There is no proper way to enforce static types on this.
     * Data can be anything from form data to json encoding, XML and more.
     *
     * @note
     *      This requires a parser being added that matches the content type
     *      of the stream. See 'setParser()'.
     */
    function getParsedData(): mixed;

    /**
     * Set whether or not the `Host` header should be updated to match `Uri`
     */
    function setPreserveHost(bool $flag): void;

    /**
     * Get the request method
     *
     * The returned method is always and should always be
     * be in uppercase
     */
    function getMethod(): string;

    /**
     * Get a new instance with modified request method
     *
     * @param string $method
     *      The new method
     */
    function setMethod(string $method): void;

    /**
     * Get the Uri object accociated with this request
     */
    function getUri(): Uri;

    /**
     * Set a new Uri object
     *
     * @param Uri $uri
     *      The new Uri object
     */
    function setUri(Uri $uri): void;

    /**
     * Get the request target
     *
     * This is build from the Uri object in origin-form, unless it has been set manually.
     */
    function getRequestTarget(): string;

    /**
     * Set a new request target
     *
     * Note that this will stop the request target from being updated
     * when changing the Uri object
     *
     * @param string $requestTarget
     *      The new request target
     */
    function setRequestTarget(string|null $requestTarget): void;

    /**
     * Check whether or not a file exists within this request
     */
    function hasFile(string $name): bool;

    /**
     * Get a specific file based on it's name
     *
     * @note
     *      Multiple files with the same name may exist.
     *      This will return the first one it finds.
     *
     * @note
     *      In a normal server request, the name will be the name of the
     *      HTML form that uploaded the file.
     *
     * @param $name
     *      The name of the file
     *
     * @return
     *      This will return `NULL` if no such file exist
     */
    function getFile(string $name): ?File;

    /**
     * Get all the files in this request
     *
     * @param $name
     *      Limit the list to files with a specific name
     *
     * @return
     *      This will return a list with all of the requested files.
     *      If no files was found, an empty list is returned.
     */
    function getFiles(string|null $name = null): ImmutableListArray;

    /**
     * Add a file to this request
     *
     * @param $file
     *      The file to add
     */
    function addFile(File $file): void;

    /**
     * Remove all files or those based on a name
     *
     * @note
     *      In case of multiple files with the same name,
     *      this method will remove all of them.
     *
     * @param $name
     *      The name of the file to remove
     */
    function removeFiles(string|null $name = null): void;
}
