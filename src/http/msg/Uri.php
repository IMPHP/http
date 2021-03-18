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
 * Defines a Uri object for the http message specification
 */
interface Uri {

    /**
     * Get the fragment
     *
     * @return
     *      This will return `NULL` if there is no fragment defined
     */
    function getFragment(): ?string;

    /**
     * Get a key part of the querystring
     *
     * @example
     *      ```php
     *      $uri = new HttpUriBuilder("http://domain.com/?mykey=some+value&otherkey=with+value");
     *      echo $uri->getQueryKey("mykey");
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
    function getQueryKey(string $name): ?string;

    /**
     * Get the querystring
     *
     * @return
     *      This will return `NULL` if there is no querystring defined
     */
    function getQuery(): ?string;

    /**
     * Get the base url for the request
     *
     * The base url is everything prepending the path,
     * like scheme, domain, base path etc.
     *
     * @return
     *      This will return `NULL` if there is noting to
     *      build the base url with. 
     */
    function getBaseUrl(): ?string;

    /**
     * Get the base path for the request
     *
     * Base path is the part of the path that is not part of
     * the actual request and should not be dealed with by a router and such.
     *
     * @return
     *      This will return `NULL` if no base path has been defined
     */
    function getBasePath(): ?string;

    /**
     * Get the request path
     *
     * @return
     *      This will return `/` when no path has been defined
     */
    function getPath(): string;

    /**
     * Get the full request path.
     * This includes the basepath.
     */
    function getFullPath(): string;

    /**
     * Get the port number
     *
     * @return
     *      This will return `0` when port is not defined, declaring it the default port for the scheme
     */
    function getPort(): int;

    /**
     * Get the host
     *
     * @return
     *      This may return `NULL` if host has not been defined
     */
    function getHost(): ?string;

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
     *      scheme://[user[:password]@]domain[:port]
     *
     * @return
     *      This may return `NULL` if there is no data to assemble the authority
     */
    function getAuthority(): ?string;

    /**
     * Get the scheme
     *
     * @return
     *      This may return `NULL` if scheme has not been defined
     */
    function getScheme(): ?string;

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
     * Compile the URI object to a URL string
     */
    function toString(): string;

    /**
     * Get a builder for this instance
     */
    function getBuilder(): UriBuilder;
}
