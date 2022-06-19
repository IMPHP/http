# [HTTP Base](http-base.md) / [PSR-7 Compatibility package](combat.md) / BaseMessage
 > im\http2\combat\psr7\BaseMessage
____

## Description
A wrapper base allowing you to use `im\http2\msg\Message` as `Psr\Http\Message\MessageInterface`

## Synopsis
```php
abstract class BaseMessage implements Psr\Http\Message\MessageInterface {

    // Methods
    public __construct(im\http2\msg\Message $message)
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
| [__BaseMessage&nbsp;::&nbsp;\_\_construct__](combat-BaseMessage-__construct.md) |  |
| [__BaseMessage&nbsp;::&nbsp;withProtocolVersion__](combat-BaseMessage-withProtocolVersion.md) | Return an instance with the specified HTTP protocol version |
| [__BaseMessage&nbsp;::&nbsp;getProtocolVersion__](combat-BaseMessage-getProtocolVersion.md) | Retrieves the HTTP protocol version as a string |
| [__BaseMessage&nbsp;::&nbsp;getHeaders__](combat-BaseMessage-getHeaders.md) | Retrieves all message header values |
| [__BaseMessage&nbsp;::&nbsp;hasHeader__](combat-BaseMessage-hasHeader.md) | Checks if a header exists |
| [__BaseMessage&nbsp;::&nbsp;getHeader__](combat-BaseMessage-getHeader.md) | Retrieves a message header value |
| [__BaseMessage&nbsp;::&nbsp;getHeaderLine__](combat-BaseMessage-getHeaderLine.md) | Retrieves a comma-separated string of the values for a single header |
| [__BaseMessage&nbsp;::&nbsp;withHeader__](combat-BaseMessage-withHeader.md) | Return an instance with the provided value replacing the specified header |
| [__BaseMessage&nbsp;::&nbsp;withAddedHeader__](combat-BaseMessage-withAddedHeader.md) | Return an instance with the specified header appended with the given value |
| [__BaseMessage&nbsp;::&nbsp;withoutHeader__](combat-BaseMessage-withoutHeader.md) | Return an instance without the specified header |
| [__BaseMessage&nbsp;::&nbsp;getBody__](combat-BaseMessage-getBody.md) | Gets the body of the message |
| [__BaseMessage&nbsp;::&nbsp;withBody__](combat-BaseMessage-withBody.md) | Return an instance with the specified message body |
