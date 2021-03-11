# [HTTP Message](http.md) / HttpUriBuilder
 > im\http\msg\HttpUriBuilder
____

## Description
An implementation of `im\http\msg\UriBuilder`

## Synopsis
```php
class HttpUriBuilder implements im\http\msg\UriBuilder, Stringable, im\http\msg\Uri {

    // Methods
    public __construct(null|string $url = NULL)
    public getFragment(): null|string
    public setFragment(null|string $fragment): void
    public getQueryKey(string $name): null|string
    public setQueryKey(string $name, null|string $value): void
    public getQuery(): null|string
    public setQuery(null|string $query): void
    public getBasePath(): null|string
    public setBasePath(null|string $basePath): void
    public getPath(): string
    public setPath(string $path): void
    public getFullPath(): string
    public getPort(): int
    public setPort(int $port): void
    public getHost(): null|string
    public setHost(null|string $host): void
    public isDefaultPort(): bool
    public getAuthority(): null|string
    public setAuthority(null|string $auth): void
    public getUser(): null|string
    public getPassword(): null|string
    public setUserInfo(null|string $user, null|string $password = NULL): void
    public getScheme(): null|string
    public setScheme(null|string $scheme): void
    public getBuilder(): im\http\msg\UriBuilder
    public getFinal(): im\http\msg\Uri
    public toString(): string
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__HttpUriBuilder&nbsp;::&nbsp;\_\_construct__](http-HttpUriBuilder-__construct.md) |  |
| [__HttpUriBuilder&nbsp;::&nbsp;getFragment__](http-HttpUriBuilder-getFragment.md) | Get the fragment |
| [__HttpUriBuilder&nbsp;::&nbsp;setFragment__](http-HttpUriBuilder-setFragment.md) | Set the fragment |
| [__HttpUriBuilder&nbsp;::&nbsp;getQueryKey__](http-HttpUriBuilder-getQueryKey.md) | Get a key part of the querystring |
| [__HttpUriBuilder&nbsp;::&nbsp;setQueryKey__](http-HttpUriBuilder-setQueryKey.md) | Set a querystring key part |
| [__HttpUriBuilder&nbsp;::&nbsp;getQuery__](http-HttpUriBuilder-getQuery.md) | Get the querystring |
| [__HttpUriBuilder&nbsp;::&nbsp;setQuery__](http-HttpUriBuilder-setQuery.md) | Set the querystring |
| [__HttpUriBuilder&nbsp;::&nbsp;getBasePath__](http-HttpUriBuilder-getBasePath.md) | Get the base path for the request  Base path is the part of the path that is not part of the actual request and should not be dealed with by a router and such |
| [__HttpUriBuilder&nbsp;::&nbsp;setBasePath__](http-HttpUriBuilder-setBasePath.md) | Set the request base path |
| [__HttpUriBuilder&nbsp;::&nbsp;getPath__](http-HttpUriBuilder-getPath.md) | Get the request path |
| [__HttpUriBuilder&nbsp;::&nbsp;setPath__](http-HttpUriBuilder-setPath.md) | Set the request path |
| [__HttpUriBuilder&nbsp;::&nbsp;getFullPath__](http-HttpUriBuilder-getFullPath.md) | Get the full request path |
| [__HttpUriBuilder&nbsp;::&nbsp;getPort__](http-HttpUriBuilder-getPort.md) | Get the port number |
| [__HttpUriBuilder&nbsp;::&nbsp;setPort__](http-HttpUriBuilder-setPort.md) | Set the port number |
| [__HttpUriBuilder&nbsp;::&nbsp;getHost__](http-HttpUriBuilder-getHost.md) | Get the host |
| [__HttpUriBuilder&nbsp;::&nbsp;setHost__](http-HttpUriBuilder-setHost.md) | Set the host |
| [__HttpUriBuilder&nbsp;::&nbsp;isDefaultPort__](http-HttpUriBuilder-isDefaultPort.md) | Check to see if the port being used is the default scheme port |
| [__HttpUriBuilder&nbsp;::&nbsp;getAuthority__](http-HttpUriBuilder-getAuthority.md) | Get the authority |
| [__HttpUriBuilder&nbsp;::&nbsp;setAuthority__](http-HttpUriBuilder-setAuthority.md) | Update all authority data |
| [__HttpUriBuilder&nbsp;::&nbsp;getUser__](http-HttpUriBuilder-getUser.md) | Get the uri basic username |
| [__HttpUriBuilder&nbsp;::&nbsp;getPassword__](http-HttpUriBuilder-getPassword.md) | Get the uri basic password |
| [__HttpUriBuilder&nbsp;::&nbsp;setUserInfo__](http-HttpUriBuilder-setUserInfo.md) | Set the basic authentication |
| [__HttpUriBuilder&nbsp;::&nbsp;getScheme__](http-HttpUriBuilder-getScheme.md) | Get the scheme |
| [__HttpUriBuilder&nbsp;::&nbsp;setScheme__](http-HttpUriBuilder-setScheme.md) | Set the scheme |
| [__HttpUriBuilder&nbsp;::&nbsp;getBuilder__](http-HttpUriBuilder-getBuilder.md) | Get a builder for this instance |
| [__HttpUriBuilder&nbsp;::&nbsp;getFinal__](http-HttpUriBuilder-getFinal.md) | Get a read-only object of this URI Builder |
| [__HttpUriBuilder&nbsp;::&nbsp;toString__](http-HttpUriBuilder-toString.md) | Compile the URI object to a URL string |
