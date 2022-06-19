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
 * Defines a Uri builder for the http message specification
 * 
 * @deprecated 
 *      This has been replaced by `im\http2\msg\Uri`
 */
interface UriBuilder extends Uri {

    /**
     * Set the fragment
     *
     * @param $fragment
     *      The fragment to set.
     *      You can set this to `NULL` to remove it.
     */
    function setFragment(?string $fragment): void;

    /**
     * Set a querystring key part
     *
     * @param $name
     *      The key to set
     *
     * @param $value
     *      The value to set.
     *      You can set this to `NULL` to remove it.
     */
    function setQueryKey(string $name, ?string $value): void;

    /**
     * Set the querystring
     *
     * @param $query
     *      The querystring to set.
     *      You can set this to `NULL` to remove it.
     */
    function setQuery(?string $query): void;

    /**
     * Set the request base path
     *
     * @param $path
     *      The base path to set.
     *      You can set this to `NULL` to remove it.
     */
    function setBasePath(?string $path): void;

    /**
     * Set the request path
     *
     * @param $path
     *      The path to set
     */
    function setPath(string $path): void;

    /**
     * Set the port number
     *
     * @param $port
     *      The port number or `0` as undefined/default port
     */
    function setPort(int $port): void;

    /**
     * Set the host
     *
     * @param $host
     *      The host or `NULL` to remove it
     */
    function setHost(?string $host): void;

    /**
     * Update all authority data
     *
     * @note
     *      scheme://[user[:password]@]domain[:port]
     *
     * @note
     *      Any authority part not included, will be removed from this URI
     *
     * @param $auth
     *      The authority string or `NULL` to remove all of these parts
     */
    function setAuthority(?string $auth): void;

    /**
     * Set the scheme
     *
     * @param $scheme
     *      The scheme or `NULL` to remove it completly
     */
    function setScheme(?string $scheme): void;

    /**
     * Set the basic authentication
     *
     * @param $user
     *      The username or `NULL` to remove it
     *
     * @param $password
     *      The password or `NULL` to remove it
     */
    function setUserInfo(?string $user, string $password = null): void;

    /**
     * Get a read-only object of this URI Builder
     */
    function getFinal(): Uri;
}
