# [HTTP Base](http-base.md) / [HTTP Message v2](http2.md) / Uri
 > im\http2\msg\Uri
____

## Description
Defines a Uri object for the http message specification

## Synopsis
```php
interface Uri implements im\features\Cloneable, im\features\Stringable, Stringable {

    // Methods
    getFragment(): null|string
    setFragment(null|string $fragment): void
    getQuery(string $name): null|string
    setQuery(string $name, null|string $value): void
    getQuerystring(): null|string
    setQuerystring(null|string $query): void
    getPath(): null|string
    setPath(null|string $path): void
    getPort(): int
    setPort(int $port): void
    getHost(): null|string
    setHost(null|string $host): void
    isDefaultPort(): bool
    getAuthority(): null|string
    setAuthority(null|string $auth): void
    getScheme(): null|string
    setScheme(null|string $scheme): void
    getUser(): null|string
    getPassword(): null|string
    setUserInfo(null|string $user, null|string $password = NULL): void
    toString(): string

    // Inherited Methods
    clone(): static
    __toString(): string
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__Uri&nbsp;::&nbsp;getFragment__](http2-Uri-getFragment.md) | Get the fragment |
| [__Uri&nbsp;::&nbsp;setFragment__](http2-Uri-setFragment.md) | Set the fragment |
| [__Uri&nbsp;::&nbsp;getQuery__](http2-Uri-getQuery.md) | Get a key part of the querystring |
| [__Uri&nbsp;::&nbsp;setQuery__](http2-Uri-setQuery.md) | Set a querystring key part |
| [__Uri&nbsp;::&nbsp;getQuerystring__](http2-Uri-getQuerystring.md) | Get the querystring |
| [__Uri&nbsp;::&nbsp;setQuerystring__](http2-Uri-setQuerystring.md) | Set the querystring |
| [__Uri&nbsp;::&nbsp;getPath__](http2-Uri-getPath.md) | Get the request path |
| [__Uri&nbsp;::&nbsp;setPath__](http2-Uri-setPath.md) | Set the request path |
| [__Uri&nbsp;::&nbsp;getPort__](http2-Uri-getPort.md) | Get the port number |
| [__Uri&nbsp;::&nbsp;setPort__](http2-Uri-setPort.md) | Set the port number |
| [__Uri&nbsp;::&nbsp;getHost__](http2-Uri-getHost.md) | Get the host |
| [__Uri&nbsp;::&nbsp;setHost__](http2-Uri-setHost.md) | Set the host |
| [__Uri&nbsp;::&nbsp;isDefaultPort__](http2-Uri-isDefaultPort.md) | Check to see if the port being used is the default scheme port |
| [__Uri&nbsp;::&nbsp;getAuthority__](http2-Uri-getAuthority.md) | Get the authority |
| [__Uri&nbsp;::&nbsp;setAuthority__](http2-Uri-setAuthority.md) | Update all authority data |
| [__Uri&nbsp;::&nbsp;getScheme__](http2-Uri-getScheme.md) | Get the scheme |
| [__Uri&nbsp;::&nbsp;setScheme__](http2-Uri-setScheme.md) | Set the scheme |
| [__Uri&nbsp;::&nbsp;getUser__](http2-Uri-getUser.md) | Get the uri basic username |
| [__Uri&nbsp;::&nbsp;getPassword__](http2-Uri-getPassword.md) | Get the uri basic password |
| [__Uri&nbsp;::&nbsp;setUserInfo__](http2-Uri-setUserInfo.md) | Set the basic authentication |
| [__Uri&nbsp;::&nbsp;toString__](http2-Uri-toString.md) | Return the string representation as a URI reference  This method adheres to the PSR7 rules:  - If a scheme is present, it MUST be suffixed by ":" |
| [__Uri&nbsp;::&nbsp;clone__](http2-Uri-clone.md) | A proper OOP cloning method  Classes implementing this interface should also be able to deal with `clone $object` |
| [__Uri&nbsp;::&nbsp;\_\_toString__](http2-Uri-__toString.md) |  |
