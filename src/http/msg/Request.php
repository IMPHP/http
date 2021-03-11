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

use im\util\IndexArray;

/**
 * Defines a Request object for the http message specification
 *
 * __PARAMS__
 *
 * There is some data forms that does not really belong in these objects.
 * You got parsed body, query params, cookie params and more.
 * The query is really part of the Uri in the form of a string.
 * Cookie data is part of the header and body is a stream.
 * However it would be a drag having to extract some specific form data
 * from the stream each time, or parse the query string to get one of the
 * segments. PHP's solution is to parse all of this data into a few
 * superglobal variables like $_POST, $_GET ... and it is a great idea
 * because the structure of all of this data is the same. You got
 * a `string` key and some `mixed` data.
 *
 * IM HTTP uses the exact same system, only here it is wrapped inside
 * a request object. Each type like cookies, files and so on
 * are contained in their own `Params` space.
 *
 * At the same time we are able to store all of this data without actually
 * creating to much specific integrations for it, unlike PSR7. Like mentioned above,
 * this data has no real place in these objects but they are a great help.
 * The params space are a middle way. Also in IM HTTP all of this data
 * can be stored in a shared request object. For some reason in PSR it is
 * only available in ServerRequest.
 *
 * In order for this information to be of any use, some rules must apply
 * when changes are made to other parts of the request. In IMHTTP tings like
 * cookies, query and body params mirror their original source. If you
 * update one of these sources, the params must follow. For example
 * if you switch the Uri object, the query params must be updated to mirror
 * the new query string in the Uri.
 */
interface Request extends Message {

    /**
     * Used with the param methods to work with the body params.
     * This is used for `POST` data.
     *
     * @var string
     */
    const P_BODY = "body";

    /**
     * Used with the param methods to work with the cookies params
     *
     * @var string
     */
    const P_COOKIES = "cookies";

    /**
     * Used with the param methods to work with the query params
     *
     * @var string
     */
    const P_QUERY = "query";

    /**
     * A shared params location where custom data can be stored, like PSR7's attributes in ServerRequest
     *
     * @var string
     */
    const P_ATTR = "attributes";

    /**
     * Get the request method
     *
     * The returned method is always and should always be
     * be in uppercase
     */
    function getMethod(): string;

    /**
     * Get the Uri object accociated with this request
     */
    function getUri(): Uri;

    /**
     * Get the request target
     *
     * This is build from the Uri object in origin-form, unless it has been set manually.
     */
    function getRequestTarget(): string;

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
    function getFiles(string $name = null): IndexArray;

    /**
     * Get the value from a param
     *
     * @param $name
     *      The name of the param
     *
     * @param $default
     *      Default value to return if no value was found
     *
     * @param $type
     *      The param type e.g. `Request::P_ATTR`, `Request::P_QUERY` etc...
     */
    function getParam(string $name, mixed $default = null, string $type = Request::P_ATTR): mixed;

    /**
     * Check to see if a specific param exists
     *
     * @param $name
     *      The name of the param
     *
     * @param $type
     *      The param type e.g. `Request::P_ATTR`, `Request::P_QUERY` etc...
     */
    function hasParam(string $name, string $type = Request::P_ATTR): bool;

    /**
     * Get the data from body in parsed form.
     *
     * This may return `NULL` if the data in body
     * has not been parsed.
     */
    function getParsedBody(): mixed;

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Message")]
    function getBuilder(): RequestBuilder;
}
