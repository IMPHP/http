# [HTTP Message](http.md) / UriBuilder
 > im\http\msg\UriBuilder
____

## Description
Defines a Uri builder for the http message specification

## Synopsis
```php
interface UriBuilder implements im\http\msg\Uri {

    // Methods
    setFragment(null|string $fragment): void
    setQueryKey(string $name, null|string $value): void
    setQuery(null|string $query): void
    setBasePath(null|string $path): void
    setPath(string $path): void
    setPort(int $port): void
    setHost(null|string $host): void
    setAuthority(null|string $auth): void
    setScheme(null|string $scheme): void
    setUserInfo(null|string $user, null|string $password = NULL): void
    getFinal(): im\http\msg\Uri

    // Inherited Methods
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
| [__UriBuilder&nbsp;::&nbsp;setFragment__](http-UriBuilder-setFragment.md) | Set the fragment |
| [__UriBuilder&nbsp;::&nbsp;setQueryKey__](http-UriBuilder-setQueryKey.md) | Set a querystring key part |
| [__UriBuilder&nbsp;::&nbsp;setQuery__](http-UriBuilder-setQuery.md) | Set the querystring |
| [__UriBuilder&nbsp;::&nbsp;setBasePath__](http-UriBuilder-setBasePath.md) | Set the request base path |
| [__UriBuilder&nbsp;::&nbsp;setPath__](http-UriBuilder-setPath.md) | Set the request path |
| [__UriBuilder&nbsp;::&nbsp;setPort__](http-UriBuilder-setPort.md) | Set the port number |
| [__UriBuilder&nbsp;::&nbsp;setHost__](http-UriBuilder-setHost.md) | Set the host |
| [__UriBuilder&nbsp;::&nbsp;setAuthority__](http-UriBuilder-setAuthority.md) | Update all authority data |
| [__UriBuilder&nbsp;::&nbsp;setScheme__](http-UriBuilder-setScheme.md) | Set the scheme |
| [__UriBuilder&nbsp;::&nbsp;setUserInfo__](http-UriBuilder-setUserInfo.md) | Set the basic authentication |
| [__UriBuilder&nbsp;::&nbsp;getFinal__](http-UriBuilder-getFinal.md) | Get a read-only object of this URI Builder |
| [__UriBuilder&nbsp;::&nbsp;getFragment__](http-UriBuilder-getFragment.md) | Get the fragment |
| [__UriBuilder&nbsp;::&nbsp;getQueryKey__](http-UriBuilder-getQueryKey.md) | Get a key part of the querystring |
| [__UriBuilder&nbsp;::&nbsp;getQuery__](http-UriBuilder-getQuery.md) | Get the querystring |
| [__UriBuilder&nbsp;::&nbsp;getBasePath__](http-UriBuilder-getBasePath.md) | Get the base path for the request  Base path is the part of the path that is not part of the actual request and should not be dealed with by a router and such |
| [__UriBuilder&nbsp;::&nbsp;getPath__](http-UriBuilder-getPath.md) | Get the request path |
| [__UriBuilder&nbsp;::&nbsp;getFullPath__](http-UriBuilder-getFullPath.md) | Get the full request path |
| [__UriBuilder&nbsp;::&nbsp;getPort__](http-UriBuilder-getPort.md) | Get the port number |
| [__UriBuilder&nbsp;::&nbsp;getHost__](http-UriBuilder-getHost.md) | Get the host |
| [__UriBuilder&nbsp;::&nbsp;isDefaultPort__](http-UriBuilder-isDefaultPort.md) | Check to see if the port being used is the default scheme port |
| [__UriBuilder&nbsp;::&nbsp;getAuthority__](http-UriBuilder-getAuthority.md) | Get the authority |
| [__UriBuilder&nbsp;::&nbsp;getScheme__](http-UriBuilder-getScheme.md) | Get the scheme |
| [__UriBuilder&nbsp;::&nbsp;getUser__](http-UriBuilder-getUser.md) | Get the uri basic username |
| [__UriBuilder&nbsp;::&nbsp;getPassword__](http-UriBuilder-getPassword.md) | Get the uri basic password |
| [__UriBuilder&nbsp;::&nbsp;toString__](http-UriBuilder-toString.md) | Compile the URI object to a URL string |
| [__UriBuilder&nbsp;::&nbsp;getBuilder__](http-UriBuilder-getBuilder.md) | Get a builder for this instance |
