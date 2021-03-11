# [HTTP Message](http.md) / HttpMessageBuilder
 > im\http\msg\HttpMessageBuilder
____

## Description
This is an implementation of the `im\http\msg\MessageBuilder` interface

## Synopsis
```php
abstract class HttpMessageBuilder implements im\http\msg\MessageBuilder, Stringable, IteratorAggregate, Traversable, im\http\msg\Message {

    // Methods
    public __construct()
    public hasHeader(string $name): bool
    public inHeader(string $name, string $search): bool
    public getHeader(string $name): im\util\ListArray
    public getHeaderLine(string $name): null|string
    public addHeader(string $name, string ...$values): void
    public setHeader(string $name, string ...$values): void
    public removeHeader(string $name): void
    public getProtocolVersion(): string
    public setProtocolVersion(string $version): void
    public getBody(): im\io\Stream
    public getBuilder(): im\http\msg\MessageBuilder

    // Inherited Methods
    abstract public getFinal(): im\http\msg\Message
    abstract public setBody(Stream $body): void
    abstract public toString(): string
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__HttpMessageBuilder&nbsp;::&nbsp;\_\_construct__](http-HttpMessageBuilder-__construct.md) |  |
| [__HttpMessageBuilder&nbsp;::&nbsp;hasHeader__](http-HttpMessageBuilder-hasHeader.md) | Check to see if there is a header with this name |
| [__HttpMessageBuilder&nbsp;::&nbsp;inHeader__](http-HttpMessageBuilder-inHeader.md) | Perform a Case-insensitive value search on a header  Each header can have multiple values in the form of an indexed array or similar |
| [__HttpMessageBuilder&nbsp;::&nbsp;getHeader__](http-HttpMessageBuilder-getHeader.md) | Returns the value indexed array for a specific header |
| [__HttpMessageBuilder&nbsp;::&nbsp;getHeaderLine__](http-HttpMessageBuilder-getHeaderLine.md) | Returns the entire header line |
| [__HttpMessageBuilder&nbsp;::&nbsp;addHeader__](http-HttpMessageBuilder-addHeader.md) | Add content to a header or create it  This method will append data to an existing one, or create it if it does not already exist |
| [__HttpMessageBuilder&nbsp;::&nbsp;setHeader__](http-HttpMessageBuilder-setHeader.md) | Set/change a header |
| [__HttpMessageBuilder&nbsp;::&nbsp;removeHeader__](http-HttpMessageBuilder-removeHeader.md) | Remove specified header |
| [__HttpMessageBuilder&nbsp;::&nbsp;getProtocolVersion__](http-HttpMessageBuilder-getProtocolVersion.md) | Get the protocol version like `1 |
| [__HttpMessageBuilder&nbsp;::&nbsp;setProtocolVersion__](http-HttpMessageBuilder-setProtocolVersion.md) | Set a different protocol version like `1 |
| [__HttpMessageBuilder&nbsp;::&nbsp;getBody__](http-HttpMessageBuilder-getBody.md) | Get the current body stream |
| [__HttpMessageBuilder&nbsp;::&nbsp;getBuilder__](http-HttpMessageBuilder-getBuilder.md) | Get a message builder for the current message |
| [__HttpMessageBuilder&nbsp;::&nbsp;getFinal__](http-HttpMessageBuilder-getFinal.md) | Get a read-only message object |
| [__HttpMessageBuilder&nbsp;::&nbsp;setBody__](http-HttpMessageBuilder-setBody.md) | Set a new body stream |
| [__HttpMessageBuilder&nbsp;::&nbsp;toString__](http-HttpMessageBuilder-toString.md) | Get a string of the request  This is a text representation of the message |
