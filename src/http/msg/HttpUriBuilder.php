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

use im\util\StringBuilder;
use Exception;

/**
 * An implementation of `im\http\msg\UriBuilder`
 */
class HttpUriBuilder implements UriBuilder {

    /** @internal */
    protected ?string $scheme = null;

    /** @internal */
    protected ?string $user = null;

    /** @internal */
    protected ?string $passwd = null;

    /** @internal */
    protected ?string $host = null;

    /** @internal */
    protected string $path = "/";

    /** @internal */
    protected ?string $basePath = null;

    /** @internal */
    protected ?string $fragment = null;

    /** @internal */
    protected array $query = [];

    /** @internal */
    protected int $port = 0;

    /**
     * @param $url
     *      Optional URI string
     *
     * @example
     *      ```php
     *      new HttpUriBuilder("https://user:passwd@domain.com/path");
     *      ```
     */
    public function __construct(string $url = null) {
        if ($url != null) {
            $url = parse_url($url);

            if (!is_array($url)) {
                throw new Exception("Invalid uri format");
            }

            $this->setScheme( $url["scheme"] ?? null );
            $this->setUserInfo( $url["user"] ?? null, $url["pass"] ?? null );
            $this->setHost( $url["host"] ?? null );
            $this->setPort( $url["port"] ?? 0 );
            $this->setPath( $url["path"] ?? "/" );
            $this->setQuery( $url["query"] ?? null );
            $this->setFragment( $url["fragment"] ?? null );
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    function getFragment(): ?string {
        return $this->fragment;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    function setFragment(?string $fragment): void {
        if ($fragment != null) {
            $fragment = parse_url("scheme://domain/#$fragment", \PHP_URL_FRAGMENT);

            if (!is_string($fragment)) {
                throw new Exception("Invalid fragment format");
            }
        }

        $this->fragment = $fragment;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function getQueryKey(string $name): ?string {
        return $this->query[$name] ?? null;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function setQueryKey(string $name, ?string $value): void {
        if ($value != null) {
            $this->query[$name] = $value;

        } else if (array_key_exists($name, $this->query)) {
            unset($this->query[$name]);
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function getQuery(): ?string {
        if (!empty($this->query)) {
            return http_build_query($this->query);
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function setQuery(?string $query): void {
        if ($query != null) {
            $query = parse_url("scheme://domain/?$query", \PHP_URL_QUERY);

            if (!is_string($query)) {
                throw new Exception("Invalid query format");
            }

            parse_str($query, $result);

            if (is_array($result)) {
                $this->query = $result;

            } else {
                throw new Exception("Invalid query format");
            }

        } else {
            $this->query = [];
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    function getBaseUrl(): ?string {
        $str = new StringBuilder();

        if (($scheme = $this->getScheme()) != null) {
            $str->append($scheme, "://");
        }

        if (($authority = $this->getAuthority()) != null) {
            $str->append($authority);
        }

        if (($basePath = $this->getBasePath()) != null) {
            $str->append( $authority != null ? $basePath : ltrim($basePath, "/") );
        }

        return $str->length() > 0 ? $str->toString() : null;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function getBasePath(): ?string {
        if ($this->basePath != null) {
            return "/" . trim($this->basePath, "/");
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function setBasePath(?string $basePath): void {
        if ($basePath != null) {
            $basePath = parse_url("scheme://domain/" . ltrim($basePath, "/"), \PHP_URL_PATH);

            if (!is_string($basePath)) {
                throw new Exception("Invalid path format");
            }

            $this->basePath = $this->parsePath($basePath);
        }

        $this->$basePath = $basePath;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function getPath(): string {
        return "/" . trim($this->path, "/");
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function setPath(string $path): void {
        $path = parse_url("scheme://domain/" . ltrim($path, "/"), \PHP_URL_PATH);

        if (!is_string($path)) {
            throw new Exception("Invalid path format");
        }

        $this->path = $this->parsePath($path);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function getFullPath(): string {
        $path = $this->getPath();
        $bpath = $this->getBasePath();

        if ($bpath != null) {
            $path = "/" . trim(str_replace("//", "/", "{$bpath}/{$path}"), "/");
        }

        return $path;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
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
    #[Override("im\http\msg\UriBuilder")]
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
    #[Override("im\http\msg\UriBuilder")]
    public function getHost(): ?string {
        return $this->host;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function setHost(?string $host): void {
        if ($host != null) {
            $host = parse_url("scheme://$host", \PHP_URL_HOST);

            if (!is_string($host)) {
                throw new Exception("Invalid host format");
            }
        }

        $this->host = strtolower($host);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
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
    #[Override("im\http\msg\UriBuilder")]
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
    #[Override("im\http\msg\UriBuilder")]
    public function setAuthority(?string $auth): void {
        $auth = parse_url("scheme://$auth");

        if (!is_array($auth)) {
             throw new Exception("Invalid authority format");
        }

        $this->setHost($auth["host"] ?? null);
        $this->setPort($auth["port"] ?? 0);
        $this->setUserInfo($auth["user"] ?? null, $auth["pass"] ?? null);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function getUser(): ?string {
        return $this->user;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function getPassword(): ?string {
        return $this->passwd;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function setUserInfo(?string $user, string $password = null): void {
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
    #[Override("im\http\msg\UriBuilder")]
    public function getScheme(): ?string {
        return $this->scheme;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function setScheme(?string $scheme): void {
        if ($scheme != null) {
            $scheme = parse_url("$scheme://domain", \PHP_URL_SCHEME);

            if (!is_string($scheme)) {
                throw new Exception("Invalid scheme format");
            }
        }

        $this->scheme = strtolower($scheme);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function getBuilder(): UriBuilder {
        return clone $this;
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function getFinal(): Uri {
        return new HttpUri($this);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function toString(): string {
        $path = $this->getFullPath();
        $str = new StringBuilder();

        if (($scheme = $this->getScheme()) != null) {
            $str->append($scheme, "://");
        }

        if (($authority = $this->getAuthority()) != null) {
            $str->append($authority);
        }

        $str->append( $authority != null ? $path : ltrim($path, "/") );

        if (($query = $this->getQuery()) != null) {
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
     * @internal
     */
    protected function parsePath(string $path): string {
        return str_replace(["\\", "//", "./"], "/", rawurldecode($path));
    }
}
