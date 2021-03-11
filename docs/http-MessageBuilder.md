# [HTTP Message](http.md) / MessageBuilder
 > im\http\msg\MessageBuilder
____

## Description
Defines a message builder for the http message specification

## Synopsis
```php
interface MessageBuilder implements im\http\msg\Message, Traversable, IteratorAggregate {

    // Methods
    addHeader(string $name, string ...$values): void
    setHeader(string $name, string ...$values): void
    removeHeader(string $name): void
    setProtocolVersion(string $version): void
    getFinal(): im\http\msg\Message
    setBody(Stream $body): void

    // Inherited Methods
    hasHeader(string $name): bool
    inHeader(string $name, string $search): bool
    getHeader(string $name): im\util\ListArray
    getHeaderLine(string $name): null|string
    getProtocolVersion(): string
    getBuilder(): im\http\msg\MessageBuilder
    getBody(): im\io\Stream
    toString(): string
    getIterator()
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__MessageBuilder&nbsp;::&nbsp;addHeader__](http-MessageBuilder-addHeader.md) | Add content to a header or create it  This method will append data to an existing one, or create it if it does not already exist |
| [__MessageBuilder&nbsp;::&nbsp;setHeader__](http-MessageBuilder-setHeader.md) | Set/change a header |
| [__MessageBuilder&nbsp;::&nbsp;removeHeader__](http-MessageBuilder-removeHeader.md) | Remove specified header |
| [__MessageBuilder&nbsp;::&nbsp;setProtocolVersion__](http-MessageBuilder-setProtocolVersion.md) | Set a different protocol version like `1 |
| [__MessageBuilder&nbsp;::&nbsp;getFinal__](http-MessageBuilder-getFinal.md) | Get a read-only message object |
| [__MessageBuilder&nbsp;::&nbsp;setBody__](http-MessageBuilder-setBody.md) | Set a new body stream |
| [__MessageBuilder&nbsp;::&nbsp;hasHeader__](http-MessageBuilder-hasHeader.md) | Check to see if there is a header with this name |
| [__MessageBuilder&nbsp;::&nbsp;inHeader__](http-MessageBuilder-inHeader.md) | Perform a Case-insensitive value search on a header  Each header can have multiple values in the form of an indexed array or similar |
| [__MessageBuilder&nbsp;::&nbsp;getHeader__](http-MessageBuilder-getHeader.md) | Returns the value indexed array for a specific header |
| [__MessageBuilder&nbsp;::&nbsp;getHeaderLine__](http-MessageBuilder-getHeaderLine.md) | Returns the entire header line |
| [__MessageBuilder&nbsp;::&nbsp;getProtocolVersion__](http-MessageBuilder-getProtocolVersion.md) | Get the protocol version like `1 |
| [__MessageBuilder&nbsp;::&nbsp;getBuilder__](http-MessageBuilder-getBuilder.md) | Get a message builder for the current message |
| [__MessageBuilder&nbsp;::&nbsp;getBody__](http-MessageBuilder-getBody.md) | Get the current body stream |
| [__MessageBuilder&nbsp;::&nbsp;toString__](http-MessageBuilder-toString.md) | Get a string of the request  This is a text representation of the message |
| [__MessageBuilder&nbsp;::&nbsp;getIterator__](http-MessageBuilder-getIterator.md) |  |
