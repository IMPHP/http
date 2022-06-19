# [HTTP Base](http-base.md) / [PSR-7 Compatibility package](combat.md) / Uri
 > im\http2\combat\psr7\Uri
____

## Description
A wrapper allowing you to use `im\http2\msg\Uri` as `Psr\Http\Message\UriInterface`

## Synopsis
```php
class Uri implements Psr\Http\Message\UriInterface, im\features\Wrapper, Stringable {

    // Methods
    public __construct(im\http2\msg\Uri $uri)
    public unwrap(): null|im\http2\msg\Uri
    public getScheme(): string
    public getAuthority(): string
    public getUserInfo(): string
    public getHost(): string
    public getPort(): int|null
    public getPath(): string
    public getQuery(): string
    public getFragment(): string
    public withScheme(string $scheme): static
    public withUserInfo(string $user, string|null $password = NULL): static
    public withHost(string $host): static
    public withPort(int|null $port): static
    public withPath(string $path): static
    public withQuery(string $query): static
    public withFragment(string $fragment): static
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__Uri&nbsp;::&nbsp;\_\_construct__](combat-Uri-__construct.md) |  |
| [__Uri&nbsp;::&nbsp;unwrap__](combat-Uri-unwrap.md) | Return the original `im\http2\msg\Uri` |
| [__Uri&nbsp;::&nbsp;getScheme__](combat-Uri-getScheme.md) | Retrieve the scheme component of the URI |
| [__Uri&nbsp;::&nbsp;getAuthority__](combat-Uri-getAuthority.md) | Retrieve the authority component of the URI |
| [__Uri&nbsp;::&nbsp;getUserInfo__](combat-Uri-getUserInfo.md) | Retrieve the user information component of the URI |
| [__Uri&nbsp;::&nbsp;getHost__](combat-Uri-getHost.md) | Retrieve the host component of the URI |
| [__Uri&nbsp;::&nbsp;getPort__](combat-Uri-getPort.md) | Retrieve the port component of the URI |
| [__Uri&nbsp;::&nbsp;getPath__](combat-Uri-getPath.md) | Retrieve the path component of the URI |
| [__Uri&nbsp;::&nbsp;getQuery__](combat-Uri-getQuery.md) | Retrieve the query string of the URI |
| [__Uri&nbsp;::&nbsp;getFragment__](combat-Uri-getFragment.md) | Retrieve the fragment component of the URI |
| [__Uri&nbsp;::&nbsp;withScheme__](combat-Uri-withScheme.md) | Return an instance with the specified scheme |
| [__Uri&nbsp;::&nbsp;withUserInfo__](combat-Uri-withUserInfo.md) | Return an instance with the specified user information |
| [__Uri&nbsp;::&nbsp;withHost__](combat-Uri-withHost.md) | Return an instance with the specified host |
| [__Uri&nbsp;::&nbsp;withPort__](combat-Uri-withPort.md) | Return an instance with the specified port |
| [__Uri&nbsp;::&nbsp;withPath__](combat-Uri-withPath.md) | Return an instance with the specified path |
| [__Uri&nbsp;::&nbsp;withQuery__](combat-Uri-withQuery.md) | Return an instance with the specified query string |
| [__Uri&nbsp;::&nbsp;withFragment__](combat-Uri-withFragment.md) | Return an instance with the specified URI fragment |
