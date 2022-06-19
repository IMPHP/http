# [HTTP Base](http-base.md) / [HTTP Message](http.md) / HttpUri
 > im\http\msg\HttpUri
____

## Description
An implementation of `im\http\msg\Uri`

This abstraction is used to provide read-only access to a
uri builder in order to comply with the `Uri` interface.

> :warning: **Deprecated**  
> This has been replaced by `im\http2\Uri`  

## Synopsis
```php
class HttpUri implements im\http\msg\Uri, Stringable {

    // Methods
    public __construct(null|im\http\msg\Uri $uri = NULL)
    public getFragment(): null|string
    public getQueryKey(string $name): null|string
    public getQuery(): null|string
    public getBaseUrl(): null|string
    public getBasePath(): null|string
    public getPath(): string
    public getFullPath(): string
    public getPort(): int
    public getHost(): null|string
    public isDefaultPort(): bool
    public getAuthority(): null|string
    public getUser(): null|string
    public getPassword(): null|string
    public getScheme(): null|string
    public getBuilder(): im\http\msg\UriBuilder
    public toString(): string
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__HttpUri&nbsp;::&nbsp;\_\_construct__](http-HttpUri-__construct.md) |  |
| [__HttpUri&nbsp;::&nbsp;getFragment__](http-HttpUri-getFragment.md) | Get the fragment |
| [__HttpUri&nbsp;::&nbsp;getQueryKey__](http-HttpUri-getQueryKey.md) | Get a key part of the querystring |
| [__HttpUri&nbsp;::&nbsp;getQuery__](http-HttpUri-getQuery.md) | Get the querystring |
| [__HttpUri&nbsp;::&nbsp;getBaseUrl__](http-HttpUri-getBaseUrl.md) | Get the base url for the request  The base url is everything prepending the path, like scheme, domain, base path etc |
| [__HttpUri&nbsp;::&nbsp;getBasePath__](http-HttpUri-getBasePath.md) | Get the base path for the request  Base path is the part of the path that is not part of the actual request and should not be dealed with by a router and such |
| [__HttpUri&nbsp;::&nbsp;getPath__](http-HttpUri-getPath.md) | Get the request path |
| [__HttpUri&nbsp;::&nbsp;getFullPath__](http-HttpUri-getFullPath.md) | Get the full request path |
| [__HttpUri&nbsp;::&nbsp;getPort__](http-HttpUri-getPort.md) | Get the port number |
| [__HttpUri&nbsp;::&nbsp;getHost__](http-HttpUri-getHost.md) | Get the host |
| [__HttpUri&nbsp;::&nbsp;isDefaultPort__](http-HttpUri-isDefaultPort.md) | Check to see if the port being used is the default scheme port |
| [__HttpUri&nbsp;::&nbsp;getAuthority__](http-HttpUri-getAuthority.md) | Get the authority |
| [__HttpUri&nbsp;::&nbsp;getUser__](http-HttpUri-getUser.md) | Get the uri basic username |
| [__HttpUri&nbsp;::&nbsp;getPassword__](http-HttpUri-getPassword.md) | Get the uri basic password |
| [__HttpUri&nbsp;::&nbsp;getScheme__](http-HttpUri-getScheme.md) | Get the scheme |
| [__HttpUri&nbsp;::&nbsp;getBuilder__](http-HttpUri-getBuilder.md) | Get a builder for this instance |
| [__HttpUri&nbsp;::&nbsp;toString__](http-HttpUri-toString.md) | Compile the URI object to a URL string |
