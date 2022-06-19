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

use im\features\Cloneable;
use im\features\Stringable;

/**
 * Defines a Uri object for the http message specification
 */
interface Uri extends Cloneable, Stringable {

    /**
     * Get the fragment
     *
     * @note
     *      This is going to be RFC 7230 encoded
     *
     * @return
     *      This will return `NULL` if there is no fragment defined
     */
    function getFragment(): ?string;

    /**
     * Set the fragment
     *
     * @param $fragment
     *      The fragment to set.
     *      You can set this to `NULL` to remove it.
     */
    function setFragment(string|null $fragment): void;

    /**
     * Get a key part of the querystring
     *
     * @example
     *      ```php
     *      $uri = new <Uri Class>("http://domain.com/?mykey=some+value&otherkey=with+value");
     *      echo $uri->getQuery("mykey");
     *      ```
     *
     *      ```
     *      Output: some value
     *      ```
     *
     * @param $name
     *      Name of the part to return
     *
     * @return
     *      This will return `NULL` if this key does not exist
     */
    function getQuery(string $name): ?string;

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
    function setQuery(string $name, string|null $value): void;

    /**
     * Get the querystring
     *
     * @note
     *      This is going to be RFC 7230 encoded
     *
     * @return
     *      This will return `NULL` if there is no querystring defined
     */
    function getQuerystring(): ?string;

    /**
     * Set the querystring
     *
     * @param $query
     *      The querystring to set.
     *      You can set this to `NULL` to remove it.
     */
    function setQuerystring(string|null $query): void;

    /**
     * Get the request path
     *
     * @note
     *      This is going to be RFC 7230 encoded
     */
    function getPath(): ?string;

    /**
     * Set the request path
     *
     * @param $path
     *      The path to set
     */
    function setPath(string|null $path): void;

    /**
     * Get the port number
     *
     * @return
     *      This will return `0` when port is not defined, declaring it the default port for the scheme
     */
    function getPort(): int;

    /**
     * Set the port number
     *
     * @param $port
     *      The port number or `0` as undefined/default port
     */
    function setPort(int $port): void;

    /**
     * Get the host
     *
     * @return
     *      This may return `NULL` if host has not been defined
     */
    function getHost(): ?string;

    /**
     * Set the host
     *
     * @param $host
     *      The host or `NULL` to remove it
     */
    function setHost(string|null $host): void;

    /**
     * Check to see if the port being used is the default scheme port
     *
     * @note
     *      This will assume default port when no port is defined
     */
    function isDefaultPort(): bool;

    /**
     * Get the authority
     *
     * @note
     *      [user[:password]@]host[:port]
     *
     * @return
     *      This may return `NULL` if there is no data to assemble the authority
     */
    function getAuthority(): ?string;

    /**
     * Update all authority data
     *
     * @note
     *      [user[:password]@]host[:port]
     *
     * @note
     *      Any authority part not included, will be removed from this URI
     *
     * @param $auth
     *      The authority string or `NULL` to remove all of these parts
     */
    function setAuthority(string|null $auth): void;

    /**
     * Get the scheme
     *
     * @return
     *      This may return `NULL` if scheme has not been defined
     */
    function getScheme(): ?string;

    /**
     * Set the scheme
     *
     * @param $scheme
     *      The scheme or `NULL` to remove it completly
     */
    function setScheme(string|null $scheme): void;

    /**
     * Get the uri basic username
     *
     * @return
     *      This may return `NULL` if username has not been defined
     */
    function getUser(): ?string;

    /**
     * Get the uri basic password
     *
     * @return
     *      This may return `NULL` if password has not been defined
     */
    function getPassword(): ?string;

    /**
     * Set the basic authentication
     *
     * @param $user
     *      The username or `NULL` to remove it
     *
     * @param $password
     *      The password or `NULL` to remove it
     */
    function setUserInfo(string|null $user, string|null $password = null): void;

    /**
     * Return the string representation as a URI reference
     *
     * This method adheres to the PSR7 rules:
     *
     * - If a scheme is present, it MUST be suffixed by ":".
     * - If an authority is present, it MUST be prefixed by "//".
     * - The path can be concatenated without delimiters. But there are two
     *   cases where the path has to be adjusted to make the URI reference
     *   valid as PHP does not allow to throw an exception in __toString():
     *     - If the path is rootless and an authority is present, the path MUST
     *       be prefixed by "/".
     *     - If the path is starting with more than one "/" and no authority is
     *       present, the starting slashes MUST be reduced to one.
     * - If a query is present, it MUST be prefixed by "?".
     * - If a fragment is present, it MUST be prefixed by "#".
     */
    #[Override("im\features\Stringable")]
    function toString(): string;
}
