# [HTTP Base](http-base.md) / [HTTP Message](http.md) / Message
 > im\http\msg\Message
____

## Description
Defines a message object for the http message specification

> :warning: **Deprecated**  
> This has been replaced by `im\http2\msg\Message`  

 > This interface extends IteratorAggregate to allow iterating through all the available headers within this message.  

## Synopsis
```php
interface Message implements IteratorAggregate, Traversable {

    // Methods
    hasHeader(string $name): bool
    inHeader(string $name, string $search): bool
    getHeader(string $name): im\util\ListArray
    getHeaderLine(string $name): null|string
    getProtocolVersion(): string
    getBuilder(): im\http\msg\MessageBuilder
    getBody(): im\io\Stream
    toString(): string

    // Inherited Methods
    getIterator()
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__Message&nbsp;::&nbsp;hasHeader__](http-Message-hasHeader.md) | Check to see if there is a header with this name |
| [__Message&nbsp;::&nbsp;inHeader__](http-Message-inHeader.md) | Perform a Case-insensitive value search on a header  Each header can have multiple values in the form of an indexed array or similar |
| [__Message&nbsp;::&nbsp;getHeader__](http-Message-getHeader.md) | Returns the value indexed array for a specific header |
| [__Message&nbsp;::&nbsp;getHeaderLine__](http-Message-getHeaderLine.md) | Returns the entire header line |
| [__Message&nbsp;::&nbsp;getProtocolVersion__](http-Message-getProtocolVersion.md) | Get the protocol version like `1 |
| [__Message&nbsp;::&nbsp;getBuilder__](http-Message-getBuilder.md) | Get a message builder for the current message |
| [__Message&nbsp;::&nbsp;getBody__](http-Message-getBody.md) | Get the current body stream |
| [__Message&nbsp;::&nbsp;toString__](http-Message-toString.md) | Get a string of the request  This is a text representation of the message |
| [__Message&nbsp;::&nbsp;getIterator__](http-Message-getIterator.md) |  |
