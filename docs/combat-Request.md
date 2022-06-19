# [HTTP Base](http-base.md) / [PSR-7 Compatibility package](combat.md) / Request
 > im\http2\combat\psr7\Request
____

## Description
A wrapper allowing you to use `im\http2\msg\Request` as `Psr\Http\Message\RequestInterface`

## Synopsis
```php
class Request extends im\http2\combat\psr7\BaseMessage implements Psr\Http\Message\MessageInterface, Psr\Http\Message\RequestInterface, im\features\Wrapper {

    // Methods
    public __construct(im\http2\msg\Request $request)
    public unwrap(): null|im\http2\msg\Request
    public getRequestTarget(): string
    public withRequestTarget(string $requestTarget): static
    public getMethod(): string
    public withMethod(string $method): static
    public getUri(): UriInterface
    public withUri(Psr\Http\Message\UriInterface $uri, bool $preserveHost = FALSE): static

    // Inherited Methods
    public withProtocolVersion($version): static
    public getProtocolVersion(): string
    public getHeaders(): string[][]
    public hasHeader(string $name): bool
    public getHeader(string $name): string[]
    public getHeaderLine(string $name): string
    public withHeader(string $name, $value): static
    public withAddedHeader(string $name, $value): static
    public withoutHeader(string $name): static
    public getBody(): StreamInterface
    public withBody(Psr\Http\Message\StreamInterface $body): static
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__Request&nbsp;::&nbsp;\_\_construct__](combat-Request-__construct.md) |  |
| [__Request&nbsp;::&nbsp;unwrap__](combat-Request-unwrap.md) | Return the original `im\http2\msg\IRequest` |
| [__Request&nbsp;::&nbsp;getRequestTarget__](combat-Request-getRequestTarget.md) | Retrieves the message's request target |
| [__Request&nbsp;::&nbsp;withRequestTarget__](combat-Request-withRequestTarget.md) | Return an instance with the specific request-target |
| [__Request&nbsp;::&nbsp;getMethod__](combat-Request-getMethod.md) | Retrieves the HTTP method of the request |
| [__Request&nbsp;::&nbsp;withMethod__](combat-Request-withMethod.md) | Return an instance with the provided HTTP method |
| [__Request&nbsp;::&nbsp;getUri__](combat-Request-getUri.md) | Retrieves the URI instance |
| [__Request&nbsp;::&nbsp;withUri__](combat-Request-withUri.md) | Returns an instance with the provided URI |
| [__Request&nbsp;::&nbsp;withProtocolVersion__](combat-Request-withProtocolVersion.md) | Return an instance with the specified HTTP protocol version |
| [__Request&nbsp;::&nbsp;getProtocolVersion__](combat-Request-getProtocolVersion.md) | Retrieves the HTTP protocol version as a string |
| [__Request&nbsp;::&nbsp;getHeaders__](combat-Request-getHeaders.md) | Retrieves all message header values |
| [__Request&nbsp;::&nbsp;hasHeader__](combat-Request-hasHeader.md) | Checks if a header exists |
| [__Request&nbsp;::&nbsp;getHeader__](combat-Request-getHeader.md) | Retrieves a message header value |
| [__Request&nbsp;::&nbsp;getHeaderLine__](combat-Request-getHeaderLine.md) | Retrieves a comma-separated string of the values for a single header |
| [__Request&nbsp;::&nbsp;withHeader__](combat-Request-withHeader.md) | Return an instance with the provided value replacing the specified header |
| [__Request&nbsp;::&nbsp;withAddedHeader__](combat-Request-withAddedHeader.md) | Return an instance with the specified header appended with the given value |
| [__Request&nbsp;::&nbsp;withoutHeader__](combat-Request-withoutHeader.md) | Return an instance without the specified header |
| [__Request&nbsp;::&nbsp;getBody__](combat-Request-getBody.md) | Gets the body of the message |
| [__Request&nbsp;::&nbsp;withBody__](combat-Request-withBody.md) | Return an instance with the specified message body |
