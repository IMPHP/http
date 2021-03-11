# [HTTP Message](http.md) / Uri
 > im\http\msg\Uri
____

## Description
Defines a Uri object for the http message specification

## Synopsis
```php
interface Uri {

    // Methods
    getFragment(): null|string
    getQueryKey(string $name): null|string
    getQuery(): null|string
    getBasePath(): null|string
    getPath(): string
    getFullPath(): string
    getPort(): int
    getHost(): null|string
    isDefaultPort(): bool
    getAuthority(): null|string
    getScheme(): null|string
    getUser(): null|string
    getPassword(): null|string
    toString(): string
    getBuilder(): im\http\msg\UriBuilder
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__Uri&nbsp;::&nbsp;getFragment__](http-Uri-getFragment.md) | Get the fragment |
| [__Uri&nbsp;::&nbsp;getQueryKey__](http-Uri-getQueryKey.md) | Get a key part of the querystring |
| [__Uri&nbsp;::&nbsp;getQuery__](http-Uri-getQuery.md) | Get the querystring |
| [__Uri&nbsp;::&nbsp;getBasePath__](http-Uri-getBasePath.md) | Get the base path for the request  Base path is the part of the path that is not part of the actual request and should not be dealed with by a router and such |
| [__Uri&nbsp;::&nbsp;getPath__](http-Uri-getPath.md) | Get the request path |
| [__Uri&nbsp;::&nbsp;getFullPath__](http-Uri-getFullPath.md) | Get the full request path |
| [__Uri&nbsp;::&nbsp;getPort__](http-Uri-getPort.md) | Get the port number |
| [__Uri&nbsp;::&nbsp;getHost__](http-Uri-getHost.md) | Get the host |
| [__Uri&nbsp;::&nbsp;isDefaultPort__](http-Uri-isDefaultPort.md) | Check to see if the port being used is the default scheme port |
| [__Uri&nbsp;::&nbsp;getAuthority__](http-Uri-getAuthority.md) | Get the authority |
| [__Uri&nbsp;::&nbsp;getScheme__](http-Uri-getScheme.md) | Get the scheme |
| [__Uri&nbsp;::&nbsp;getUser__](http-Uri-getUser.md) | Get the uri basic username |
| [__Uri&nbsp;::&nbsp;getPassword__](http-Uri-getPassword.md) | Get the uri basic password |
| [__Uri&nbsp;::&nbsp;toString__](http-Uri-toString.md) | Compile the URI object to a URL string |
| [__Uri&nbsp;::&nbsp;getBuilder__](http-Uri-getBuilder.md) | Get a builder for this instance |
