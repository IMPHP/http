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

namespace im\http2;

use Exception;
use im\http2\msg\Uri as IUri;
use im\util\MutableMappedArray;
use im\util\Map;
use im\util\StringBuilder;

/**
 * An implementation of `im\http2\msg\Uri`
 */
class Uri implements IUri {

    /** @internal */
    protected ?string $scheme = null;

    /** @internal */
    protected ?string $user = null;

    /** @internal */
    protected ?string $passwd = null;

    /** @internal */
    protected ?string $host = null;

    /** @internal */
    protected ?string $path = null;

    /** @internal */
    protected ?string $fragment = null;

    /** @internal */
    protected MutableMappedArray $query;

    /** @internal */
    protected int $port = 0;

    /**
     * @param $url
     *      Optional URI string
     *
     * @example
     *      ```php
     *      new Uri("https://user:passwd@domain.com/path");
     *      ```
     */
    public function __construct(string $url = null) {
        $this->query = new Map();

        if ($url != null) {
            $url = parse_url($url);

            if (!is_array($url)) {
                throw new Exception("Invalid uri format");
            }

            $this->setScheme( $url["scheme"] ?? null );
            $this->setUserInfo( $url["user"] ?? null, $url["pass"] ?? null );
            $this->setHost( $url["host"] ?? null );
            $this->setPort( $url["port"] ?? 0 );
            $this->setPath( $url["path"] ?? null );
            $this->setQuerystring( $url["query"] ?? null );
            $this->setFragment( $url["fragment"] ?? null );
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    function getFragment(): ?string {
        if (!empty($this->fragment)) {
            return rawurlencode($this->fragment);
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    function setFragment(string|null $fragment): void {
        if ($fragment != null) {
            $fragment = parse_url("scheme://domain/#$fragment", \PHP_URL_FRAGMENT);

            if (!is_string($fragment)) {
                throw new Exception("Invalid fragment format");
            }

            $fragment = rawurldecode($fragment);
        }

        $this->fragment = $fragment;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function getQuery(string $name): ?string {
        return $this->query->get($name);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function setQuery(string $name, string|null $value): void {
        if ($value !== null) {
            $this->query->set($name, $value);

        } else {
            $this->query->unset($name);
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function getQuerystring(): ?string {
        if ($this->query->length() > 0) {
            return http_build_query($this->query->toArray());
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function setQuerystring(string|null $query): void {
        $this->query->clear();

        if ($query !== null) {
            $query = parse_url("scheme://domain/?$query", \PHP_URL_QUERY);

            if (!is_string($query)) {
                throw new Exception("Invalid query format");
            }

            parse_str($query, $result);

            if (is_array($result)) {
                $this->query->addIterable($result);

            } else {
                throw new Exception("Invalid query format");
            }
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function getPath(): ?string {
        return $this->path;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function setPath(string|null $path): void {
        if ($path === null) {
            $this->path = null;

        } else {
            $path = parse_url($path, \PHP_URL_PATH);

            if (!is_string($path)) {
                throw new Exception("Invalid path format");
            }

            $this->path = implode("/", array_map("rawurlencode", explode("/", rawurldecode($path))));
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function getPort(): int {
        if ($this->port == 0
                && ($scheme = $this->getScheme()) != null) {

            if ($scheme == "http") {
                return 80;

            } else if ($scheme == "https") {
                return 443;
            }
        }

        return $this->port;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function setPort(int $port): void {
        if ($port != 0) {
            $port = parse_url("scheme://domain:$port", \PHP_URL_PORT);

            if (!is_int($port)) {
                throw new Exception("Invalid port number");
            }
        }

        $this->port = $port;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function getHost(): ?string {
        return $this->host;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function setHost(string|null $host): void {
        if ($host != null) {
            $host = parse_url("scheme://$host", \PHP_URL_HOST);

            if (!is_string($host)) {
                throw new Exception("Invalid host format");
            }

            $host = strtolower($host);
        }

        $this->host = $host;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function isDefaultPort(): bool {
        $port = $this->getPort();
        $scheme = $this->getScheme();

        return ($port == 0 || $scheme == null
                || ($port == 80 && $scheme == "http")
                || ($port == 443 && $scheme == "https"));
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function getAuthority(): ?string {
        $str = new StringBuilder();

        if (($host = $this->getHost()) == null) {
            $host = "127.0.0.1";
        }

        if (($user = $this->getUser()) != null) {
            $str->append($user);

            if (($passwd = $this->getPassword()) != null) {
                $str->append(":", $passwd);
            }

            $str->append("@");
        }

        $str->append($host);

        if (($port = $this->getPort()) != 0
                && !$this->isDefaultPort()) {

            $str->append(":", strval($port));
        }

        return $str->toString();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function setAuthority(string|null $auth): void {
        if ($auth !== null) {
            $auth = parse_url("scheme://$auth");

            if (!is_array($auth)) {
                 throw new Exception("Invalid authority format");
            }

            $this->setHost($auth["host"] ?? null);
            $this->setPort($auth["port"] ?? 0);
            $this->setUserInfo($auth["user"] ?? null, $auth["pass"] ?? null);

        } else {
            $this->setHost(null);
            $this->setPort(0);
            $this->setUserInfo(null);
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function getUser(): ?string {
        return $this->user;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function getPassword(): ?string {
        return $this->passwd;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function setUserInfo(string|null $user, string|null $password = null): void {
        if ($user != null) {
            $user = parse_url("scheme://$user:psw@domain", \PHP_URL_USER);

            if (!is_string($user)) {
                throw new Exception("Invalid user info format");
            }

            if ($password != null) {
                $password = parse_url("scheme://user:$password@domain", \PHP_URL_PASS);

                if (!is_string($password)) {
                    throw new Exception("Invalid user info format");
                }
            }

        } else {
            $password = null;
        }

        $this->user = $user;
        $this->passwd = $password;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function getScheme(): ?string {
        return $this->scheme;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function setScheme(string|null $scheme): void {
        if ($scheme != null) {
            $scheme = parse_url("$scheme://domain", \PHP_URL_SCHEME);

            if (!is_string($scheme)) {
                throw new Exception("Invalid scheme format");
            }

            $scheme = strtolower($scheme);
        }

        $this->scheme = $scheme;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function toString(): string {
        $str = new StringBuilder();

        if (($scheme = $this->getScheme()) != null) {
            $str->append($scheme, ":");
        }

        if (($authority = $this->getAuthority()) != null) {
            $str->append("//", $authority);
        }

        if (($path = $this->getPath()) != null) {
            if ($path[0] != "/" && $authority != null) {
                $str->append("/", $path);

            } else if (substr($path, 0, 2) == "//" && $authority == null) {
                $str->append("/", ltrim($path, "/"));

            } else {
                $str->append($path);
            }
        }

        if (($query = $this->getQuerystring()) != null) {
            $str->append("?", $query);
        }

        if (($fragment = $this->getFragment()) != null) {
            $str->append("#", $fragment);
        }

        return $str->toString();
    }

    /**
     * @php
     */
    public function __toString(): string {
        return $this->toString();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http2\msg\Uri")]
    public function clone(): static {
        return clone $this;
    }

    /**
     * @php
     */
    public function __clone() {
        $this->query = $this->query->clone();
    }
}
