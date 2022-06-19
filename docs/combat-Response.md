# [HTTP Base](http-base.md) / [PSR-7 Compatibility package](combat.md) / Response
 > im\http2\combat\psr7\Response
____

## Description
A wrapper allowing you to use `im\http2\msg\Response` as `Psr\Http\Message\ResponseInterface`

## Synopsis
```php
class Response extends im\http2\combat\psr7\BaseMessage implements Psr\Http\Message\MessageInterface, Psr\Http\Message\ResponseInterface, im\features\Wrapper {

    // Methods
    public __construct(im\http2\msg\Response $response)
    public unwrap(): null|im\http2\msg\Response
    public getStatusCode(): int
    public getReasonPhrase(): string
    public withStatus(int $code, string $reasonPhrase = ''): static

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
| [__Response&nbsp;::&nbsp;\_\_construct__](combat-Response-__construct.md) |  |
| [__Response&nbsp;::&nbsp;unwrap__](combat-Response-unwrap.md) | Return the original `im\http2\msg\Response` |
| [__Response&nbsp;::&nbsp;getStatusCode__](combat-Response-getStatusCode.md) | Gets the response status code |
| [__Response&nbsp;::&nbsp;getReasonPhrase__](combat-Response-getReasonPhrase.md) | Gets the response reason phrase associated with the status code |
| [__Response&nbsp;::&nbsp;withStatus__](combat-Response-withStatus.md) | Return an instance with the specified status code and, optionally, reason phrase |
| [__Response&nbsp;::&nbsp;withProtocolVersion__](combat-Response-withProtocolVersion.md) | Return an instance with the specified HTTP protocol version |
| [__Response&nbsp;::&nbsp;getProtocolVersion__](combat-Response-getProtocolVersion.md) | Retrieves the HTTP protocol version as a string |
| [__Response&nbsp;::&nbsp;getHeaders__](combat-Response-getHeaders.md) | Retrieves all message header values |
| [__Response&nbsp;::&nbsp;hasHeader__](combat-Response-hasHeader.md) | Checks if a header exists |
| [__Response&nbsp;::&nbsp;getHeader__](combat-Response-getHeader.md) | Retrieves a message header value |
| [__Response&nbsp;::&nbsp;getHeaderLine__](combat-Response-getHeaderLine.md) | Retrieves a comma-separated string of the values for a single header |
| [__Response&nbsp;::&nbsp;withHeader__](combat-Response-withHeader.md) | Return an instance with the provided value replacing the specified header |
| [__Response&nbsp;::&nbsp;withAddedHeader__](combat-Response-withAddedHeader.md) | Return an instance with the specified header appended with the given value |
| [__Response&nbsp;::&nbsp;withoutHeader__](combat-Response-withoutHeader.md) | Return an instance without the specified header |
| [__Response&nbsp;::&nbsp;getBody__](combat-Response-getBody.md) | Gets the body of the message |
| [__Response&nbsp;::&nbsp;withBody__](combat-Response-withBody.md) | Return an instance with the specified message body |
