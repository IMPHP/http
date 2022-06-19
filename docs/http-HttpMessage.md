# [HTTP Base](http-base.md) / [HTTP Message](http.md) / HttpMessage
 > im\http\msg\HttpMessage
____

## Description
This is an implementation of the `im\http\msg\Message` interface

> :warning: **Deprecated**  
> This has been replaced by `im\http2\msg\BaseMessage`  

## Synopsis
```php
abstract class HttpMessage implements im\http\msg\Message, Stringable, Traversable, IteratorAggregate {

    // Methods
    public __construct(im\http\msg\Message $message)
    public hasHeader(string $name): bool
    public inHeader(string $name, string $search): bool
    public getHeader(string $name): im\util\ListArray
    public getHeaderLine(string $name): null|string
    public getProtocolVersion(): string
    public getBody(): im\io\Stream
    public getBuilder(): im\http\msg\MessageBuilder

    // Inherited Methods
    abstract public toString(): string
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__HttpMessage&nbsp;::&nbsp;\_\_construct__](http-HttpMessage-__construct.md) |  |
| [__HttpMessage&nbsp;::&nbsp;hasHeader__](http-HttpMessage-hasHeader.md) | Check to see if there is a header with this name |
| [__HttpMessage&nbsp;::&nbsp;inHeader__](http-HttpMessage-inHeader.md) | Perform a Case-insensitive value search on a header  Each header can have multiple values in the form of an indexed array or similar |
| [__HttpMessage&nbsp;::&nbsp;getHeader__](http-HttpMessage-getHeader.md) | Returns the value indexed array for a specific header |
| [__HttpMessage&nbsp;::&nbsp;getHeaderLine__](http-HttpMessage-getHeaderLine.md) | Returns the entire header line |
| [__HttpMessage&nbsp;::&nbsp;getProtocolVersion__](http-HttpMessage-getProtocolVersion.md) | Get the protocol version like `1 |
| [__HttpMessage&nbsp;::&nbsp;getBody__](http-HttpMessage-getBody.md) | Get the current body stream |
| [__HttpMessage&nbsp;::&nbsp;getBuilder__](http-HttpMessage-getBuilder.md) | Get a message builder for the current message |
| [__HttpMessage&nbsp;::&nbsp;toString__](http-HttpMessage-toString.md) | Get a string of the request  This is a text representation of the message |
