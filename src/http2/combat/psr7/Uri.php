<?php declare(strict_types=1);
/*
 * This file is part of the IMPHP Project: https://github.com/IMPHP
 *
 * Copyright (c) 2022 Daniel Bergløv, License: MIT
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

namespace im\http2\combat\psr7;

use Psr\Http\Message\UriInterface;
use im\http2\msg\Uri as IUri;
use im\features\Wrapper;

/**
 * A wrapper allowing you to use `im\http2\msg\Uri` as `Psr\Http\Message\UriInterface`
 */
class Uri implements UriInterface, Wrapper {

    /** @ignore */
    protected ?IUri $uri;

    /**
     * @param $uri
     *      A Uri to use
     */
    public function __construct(IUri $uri) {
        $this->uri = $uri->clone();
    }

    /**
     * @php
     */
    public function __clone() /*void*/ {
        $this->uri = $this->uri->clone();
    }

    /**
     * Return the original `im\http2\msg\Uri`
     */
    #[Override("im\features\Wrapper")]
    public function unwrap(): IUri|null {
        return $this->uri;
    }

    /**
     * Retrieve the scheme component of the URI
     *
     * @return string
     */
    #[Override("Psr\Http\Message\UriInterface")]
    public function getScheme() /*string*/ {
        return $this->uri->getScheme() ?? "";
    }

    /**
     * Retrieve the authority component of the URI
     *
     * @return string
     */
    #[Override("Psr\Http\Message\UriInterface")]
    public function getAuthority() /*string*/ {
        return $this->uri->getAuthority() ?? "";
    }

    /**
     * Retrieve the user information component of the URI
     *
     * @return string
     */
    #[Override("Psr\Http\Message\UriInterface")]
    public function getUserInfo() /*string*/ {
        $userinfo = $this->uri->getUser();

        if ($userinfo != null) {
            $passwd = $this->uri->getPassword();

            if ($passwd != null) {
                $userinfo .= ":{$passwd}";
            }

            return $userinfo;
        }

        return "";
    }

    /**
     * Retrieve the host component of the URI
     *
     * @return string
     */
    #[Override("Psr\Http\Message\UriInterface")]
    public function getHost() /*string*/ {
        return $this->uri->getHost() ?? "";
    }

    /**
     * Retrieve the port component of the URI
     *
     * @return int|null
     */
    #[Override("Psr\Http\Message\UriInterface")]
    public function getPort() /*int|null*/ {
        if (!$this->uri->isDefaultPort()) {
            return $this->uri->getPort();
        }

        return null;
    }

    /**
     * Retrieve the path component of the URI
     *
     * @return string
     */
    #[Override("Psr\Http\Message\UriInterface")]
    public function getPath() /*string*/ {
        return $this->uri->getPath() ?? "";
    }

    /**
     * Retrieve the query string of the URI
     *
     * @return string
     */
    #[Override("Psr\Http\Message\UriInterface")]
    public function getQuery() /*string*/ {
        return $this->uri->getQuerystring() ?? "";
    }

    /**
     * Retrieve the fragment component of the URI
     *
     * @return string
     */
    #[Override("Psr\Http\Message\UriInterface")]
    public function getFragment() /*string*/ {
        return $this->uri->getFragment() ?? "";
    }

    /**
     * Return an instance with the specified scheme
     *
     * @param string $scheme
     *      The scheme to use with the new instance or empty to remove
     *
     * @return static
     */
    #[Override("Psr\Http\Message\UriInterface")]
    public function withScheme(/*string*/ $scheme) /*static*/ {
        $self = clone $this;
        $self->uri->setScheme(empty($scheme) ? null : $scheme);

        return $self;
    }

    /**
     * Return an instance with the specified user information
     *
     * @param string $user
     *      The user name to use for authority
     *
     * @param string|null $password
     *      The password associated with $user
     *
     * @return static
     */
    #[Override("Psr\Http\Message\UriInterface")]
    public function withUserInfo(/*string*/ $user, /*string|null*/ $password = null) /*static*/ {
        $self = clone $this;
        $self->uri->setUserInfo(empty($user) ? null : $user, empty($password) ? null : $password);

        return $self;
    }

    /**
     * Return an instance with the specified host
     *
     * @param string $host
     *      The hostname to use with the new instance
     *
     * @return static
     */
    #[Override("Psr\Http\Message\UriInterface")]
    public function withHost(/*string*/ $host) /*static*/ {
        $self = clone $this;
        $self->uri->setHost(empty($host) ? null : $host);

        return $self;
    }

    /**
     * Return an instance with the specified port
     *
     * @param int|null $port
     *      The port to use with the new instance; a null value removes the port information
     *
     * @return static
     */
    #[Override("Psr\Http\Message\UriInterface")]
    public function withPort(/*int|null*/ $port) /*static*/ {
        $self = clone $this;
        $self->uri->setPort(empty($port) ? 0 : $port);

        return $self;
    }

    /**
     * Return an instance with the specified path
     *
     * @param string $path
     *      The path to use with the new instance
     *
     * @return static
     */
    #[Override("Psr\Http\Message\UriInterface")]
    public function withPath(/*string*/ $path) /*static*/ {
        $self = clone $this;
        $self->uri->setPath($path);

        return $self;
    }

    /**
     * Return an instance with the specified query string
     *
     * @param string $query
     *      The query string to use with the new instance
     *
     * @return static
     */
    #[Override("Psr\Http\Message\UriInterface")]
    public function withQuery(/*string*/ $query) /*static*/ {
        $self = clone $this;
        $self->uri->setQuerystring(empty($query) ? null : $query);

        return $self;
    }

    /**
     * Return an instance with the specified URI fragment
     *
     * @param string $fragment
     *      The fragment to use with the new instance
     *
     * @return static
     */
    #[Override("Psr\Http\Message\UriInterface")]
    public function withFragment(/*string*/ $fragment) /*static*/ {
        $self = clone $this;
        $self->uri->setFragment(empty($fragment) ? null : $fragment);

        return $self;
    }

    /**
     * @php
     */
    #[Override("Psr\Http\Message\UriInterface")]
    public function __toString() /*string*/ {
        return $this->uri->toString();
    }
}
