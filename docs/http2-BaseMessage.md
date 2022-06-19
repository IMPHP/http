# [HTTP Base](http-base.md) / [HTTP Message v2](http2.md) / BaseMessage
 > im\http2\msg\BaseMessage
____

## Description
This is an implementation of the `im\http2\msg\Message` interface

## Synopsis
```php
abstract class BaseMessage implements im\http2\msg\Message, Stringable, Traversable, IteratorAggregate, im\features\Cloneable, im\features\Stringable {

    // Methods
    public __construct()
    public getAttribute(string $name, mixed $default = NULL): mixed
    public hasAttribute(string $name): bool
    public setAttribute(string $name, mixed $value): void
    public removeAttribute(string $name): void
    public hasHeader(string $name): bool
    public inHeader(string $name, string $search): bool
    public getHeader(string $name): im\util\ImmutableListArray
    public getHeaderLine(string $name): null|string
    public addHeader(string $name, string ...$values): void
    public setHeader(string $name, string ...$values): void
    public removeHeader(string $name): void
    public getProtocolVersion(): string
    public setProtocolVersion(string $version): void
    public getStream(): im\io\Stream
    public setStream(Stream $body): void
    public toString(): string
    public clone(): static

    // Inherited Methods
    abstract public print(): void
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__BaseMessage&nbsp;::&nbsp;\_\_construct__](http2-BaseMessage-__construct.md) |  |
| [__BaseMessage&nbsp;::&nbsp;getAttribute__](http2-BaseMessage-getAttribute.md) | Retrieve a single attribute |
| [__BaseMessage&nbsp;::&nbsp;hasAttribute__](http2-BaseMessage-hasAttribute.md) | Check to see if an attribute exists |
| [__BaseMessage&nbsp;::&nbsp;setAttribute__](http2-BaseMessage-setAttribute.md) | Add/Change an attribute value |
| [__BaseMessage&nbsp;::&nbsp;removeAttribute__](http2-BaseMessage-removeAttribute.md) | Remove an attribute value |
| [__BaseMessage&nbsp;::&nbsp;hasHeader__](http2-BaseMessage-hasHeader.md) | Check to see if there is a header with this name |
| [__BaseMessage&nbsp;::&nbsp;inHeader__](http2-BaseMessage-inHeader.md) | Perform a Case-insensitive value search on a header  Each header can have multiple values in the form of an indexed array or similar |
| [__BaseMessage&nbsp;::&nbsp;getHeader__](http2-BaseMessage-getHeader.md) | Returns the value indexed array for a specific header |
| [__BaseMessage&nbsp;::&nbsp;getHeaderLine__](http2-BaseMessage-getHeaderLine.md) | Returns the entire header line |
| [__BaseMessage&nbsp;::&nbsp;addHeader__](http2-BaseMessage-addHeader.md) | Add content to a header or create it  This method will append data to an existing one, or create it if it does not already exist |
| [__BaseMessage&nbsp;::&nbsp;setHeader__](http2-BaseMessage-setHeader.md) | Set/change a header |
| [__BaseMessage&nbsp;::&nbsp;removeHeader__](http2-BaseMessage-removeHeader.md) | Remove specified header |
| [__BaseMessage&nbsp;::&nbsp;getProtocolVersion__](http2-BaseMessage-getProtocolVersion.md) | Get the protocol version like `1 |
| [__BaseMessage&nbsp;::&nbsp;setProtocolVersion__](http2-BaseMessage-setProtocolVersion.md) | Set a different protocol version like `1 |
| [__BaseMessage&nbsp;::&nbsp;getStream__](http2-BaseMessage-getStream.md) | Get the current body stream |
| [__BaseMessage&nbsp;::&nbsp;setStream__](http2-BaseMessage-setStream.md) | Set a new body stream |
| [__BaseMessage&nbsp;::&nbsp;toString__](http2-BaseMessage-toString.md) | Return a string representation of the object |
| [__BaseMessage&nbsp;::&nbsp;clone__](http2-BaseMessage-clone.md) | A proper OOP cloning method  Classes implementing this interface should also be able to deal with `clone $object` |
| [__BaseMessage&nbsp;::&nbsp;print__](http2-BaseMessage-print.md) | Print message to stdout  This is similar to `toString()` except that it will directly output this to the client |
