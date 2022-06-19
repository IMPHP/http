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
 * An implementation of `im\http\msg\Uri`
 *
 * This abstraction is used to provide read-only access to a
 * uri builder in order to comply with the `Uri` interface.
 * 
 * @deprecated 
 *      This has been replaced by `im\http2\Uri`
 */
class HttpUri implements Uri {

    /** @internal */
    protected Uri $uri;

    /**
     * @param $uri
     *      A uri or uri builder
     */
    public function __construct(Uri $uri = NULL) {
        if ($uri == NULL) {
            $this->uri = new HttpUriBuilder();

        } else {
            $this->uri = $uri;
        }
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    function getFragment(): ?string {
        return $this->uri->getFragment();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Uri")]
    public function getQueryKey(string $name): ?string {
        return $this->uri->getQueryKey($name);
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Uri")]
    public function getQuery(): ?string {
        return $this->uri->getQuery();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Uri")]
    function getBaseUrl(): ?string {
        return $this->uri->getBaseUrl();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Uri")]
    public function getBasePath(): ?string {
        return $this->uri->getBasePath();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Uri")]
    public function getPath(): string {
        return $this->uri->getPath();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Uri")]
    public function getFullPath(): string {
        return $this->uri->getFullPath();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Uri")]
    public function getPort(): int {
        return $this->uri->getPort();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Uri")]
    public function getHost(): ?string {
        return $this->uri->getHost();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Uri")]
    public function isDefaultPort(): bool {
        return $this->uri->isDefaultPort();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Uri")]
    public function getAuthority(): ?string {
        return $this->uri->getAuthority();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Uri")]
    public function getUser(): ?string {
        return $this->uri->getUser();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Uri")]
    public function getPassword(): ?string {
        return $this->uri->getPassword();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Uri")]
    public function getScheme(): ?string {
        return $this->uri->getScheme();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\Uri")]
    public function getBuilder(): UriBuilder {
        return $this->uri->getBuilder();
    }

    /**
     * @inheritDoc
     */
    #[Override("im\http\msg\UriBuilder")]
    public function toString(): string {
        return $this->uri->toString();
    }

    /**
     * @php
     */
    public function __toString(): string {
        return $this->toString();
    }
}
