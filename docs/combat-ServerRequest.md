# [HTTP Base](http-base.md) / [PSR-7 Compatibility package](combat.md) / ServerRequest
 > im\http2\combat\psr7\ServerRequest
____

## Description
A wrapper allowing you to use `im\http2\msg\Request` as `Psr\Http\Message\ServerRequestInterface`

## Synopsis
```php
class ServerRequest extends im\http2\combat\psr7\Request implements Psr\Http\Message\MessageInterface, Psr\Http\Message\RequestInterface, im\features\Wrapper, Psr\Http\Message\ServerRequestInterface {

    // Methods
    public getServerParams(): array
    public getCookieParams(): array
    public withCookieParams(array $cookies): static
    public getQueryParams(): array
    public withQueryParams(array $query): static
    public getUploadedFiles(): array
    public withUploadedFiles(array $uploadedFiles): static
    public getParsedBody(): mixed
    public withParsedBody(mixed $data): static
    public getAttributes(): array
    public getAttribute(string $name, mixed $default = NULL): mixed
    public withAttribute(string $name, mixed $value): static
    public withoutAttribute(string $name): static

    // Inherited Methods
    public __construct(im\http2\msg\Request $request)
    public unwrap(): null|im\http2\msg\Request
    public getRequestTarget(): string
    public withRequestTarget(string $requestTarget): static
    public getMethod(): string
    public withMethod(string $method): static
    public getUri(): UriInterface
    public withUri(Psr\Http\Message\UriInterface $uri, bool $preserveHost = FALSE): static
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
| [__ServerRequest&nbsp;::&nbsp;getServerParams__](combat-ServerRequest-getServerParams.md) | Retrieve server parameters |
| [__ServerRequest&nbsp;::&nbsp;getCookieParams__](combat-ServerRequest-getCookieParams.md) | Retrieve cookies |
| [__ServerRequest&nbsp;::&nbsp;withCookieParams__](combat-ServerRequest-withCookieParams.md) | Return an instance with the specified cookies |
| [__ServerRequest&nbsp;::&nbsp;getQueryParams__](combat-ServerRequest-getQueryParams.md) | Retrieve deserialized query string arguments |
| [__ServerRequest&nbsp;::&nbsp;withQueryParams__](combat-ServerRequest-withQueryParams.md) | Return an instance with the specified query string arguments |
| [__ServerRequest&nbsp;::&nbsp;getUploadedFiles__](combat-ServerRequest-getUploadedFiles.md) | Retrieve normalized file upload data |
| [__ServerRequest&nbsp;::&nbsp;withUploadedFiles__](combat-ServerRequest-withUploadedFiles.md) | Create a new instance with the specified uploaded files |
| [__ServerRequest&nbsp;::&nbsp;getParsedBody__](combat-ServerRequest-getParsedBody.md) | Retrieve any parameters provided in the request body |
| [__ServerRequest&nbsp;::&nbsp;withParsedBody__](combat-ServerRequest-withParsedBody.md) | Return an instance with the specified body parameters |
| [__ServerRequest&nbsp;::&nbsp;getAttributes__](combat-ServerRequest-getAttributes.md) | Retrieve attributes derived from the request |
| [__ServerRequest&nbsp;::&nbsp;getAttribute__](combat-ServerRequest-getAttribute.md) | Retrieve a single derived request attribute |
| [__ServerRequest&nbsp;::&nbsp;withAttribute__](combat-ServerRequest-withAttribute.md) | Return an instance with the specified derived request attribute |
| [__ServerRequest&nbsp;::&nbsp;withoutAttribute__](combat-ServerRequest-withoutAttribute.md) | Return an instance that removes the specified derived request attribute |
| [__ServerRequest&nbsp;::&nbsp;\_\_construct__](combat-ServerRequest-__construct.md) |  |
| [__ServerRequest&nbsp;::&nbsp;unwrap__](combat-ServerRequest-unwrap.md) | Return the original `im\http2\msg\IRequest` |
| [__ServerRequest&nbsp;::&nbsp;getRequestTarget__](combat-ServerRequest-getRequestTarget.md) | Retrieves the message's request target |
| [__ServerRequest&nbsp;::&nbsp;withRequestTarget__](combat-ServerRequest-withRequestTarget.md) | Return an instance with the specific request-target |
| [__ServerRequest&nbsp;::&nbsp;getMethod__](combat-ServerRequest-getMethod.md) | Retrieves the HTTP method of the request |
| [__ServerRequest&nbsp;::&nbsp;withMethod__](combat-ServerRequest-withMethod.md) | Return an instance with the provided HTTP method |
| [__ServerRequest&nbsp;::&nbsp;getUri__](combat-ServerRequest-getUri.md) | Retrieves the URI instance |
| [__ServerRequest&nbsp;::&nbsp;withUri__](combat-ServerRequest-withUri.md) | Returns an instance with the provided URI |
| [__ServerRequest&nbsp;::&nbsp;withProtocolVersion__](combat-ServerRequest-withProtocolVersion.md) | Return an instance with the specified HTTP protocol version |
| [__ServerRequest&nbsp;::&nbsp;getProtocolVersion__](combat-ServerRequest-getProtocolVersion.md) | Retrieves the HTTP protocol version as a string |
| [__ServerRequest&nbsp;::&nbsp;getHeaders__](combat-ServerRequest-getHeaders.md) | Retrieves all message header values |
| [__ServerRequest&nbsp;::&nbsp;hasHeader__](combat-ServerRequest-hasHeader.md) | Checks if a header exists |
| [__ServerRequest&nbsp;::&nbsp;getHeader__](combat-ServerRequest-getHeader.md) | Retrieves a message header value |
| [__ServerRequest&nbsp;::&nbsp;getHeaderLine__](combat-ServerRequest-getHeaderLine.md) | Retrieves a comma-separated string of the values for a single header |
| [__ServerRequest&nbsp;::&nbsp;withHeader__](combat-ServerRequest-withHeader.md) | Return an instance with the provided value replacing the specified header |
| [__ServerRequest&nbsp;::&nbsp;withAddedHeader__](combat-ServerRequest-withAddedHeader.md) | Return an instance with the specified header appended with the given value |
| [__ServerRequest&nbsp;::&nbsp;withoutHeader__](combat-ServerRequest-withoutHeader.md) | Return an instance without the specified header |
| [__ServerRequest&nbsp;::&nbsp;getBody__](combat-ServerRequest-getBody.md) | Gets the body of the message |
| [__ServerRequest&nbsp;::&nbsp;withBody__](combat-ServerRequest-withBody.md) | Return an instance with the specified message body |
