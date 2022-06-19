# [HTTP Base](http-base.md) / [HTTP Message v2](http2.md) / Message
 > im\http2\msg\Message
____

## Description
Defines a message object for the http message specification

## Synopsis
```php
interface Message implements im\features\Stringable, im\features\Cloneable, IteratorAggregate, Stringable, Traversable {

    // Methods
    getAttribute(string $name, mixed $default = NULL): mixed
    hasAttribute(string $name): bool
    setAttribute(string $name, mixed $value): void
    removeAttribute(string $name): void
    hasHeader(string $name): bool
    inHeader(string $name, string $search): bool
    getHeader(string $name): im\util\ImmutableListArray
    getHeaderLine(string $name): null|string
    addHeader(string $name, string ...$values): void
    setHeader(string $name, string ...$values): void
    removeHeader(string $name): void
    getProtocolVersion(): string
    setProtocolVersion(string $version): void
    getStream(): im\io\Stream
    setStream(Stream $body): void
    print(): void

    // Inherited Methods
    toString(): string
    __toString(): string
    clone(): static
    getIterator()
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__Message&nbsp;::&nbsp;getAttribute__](http2-Message-getAttribute.md) | Retrieve a single attribute |
| [__Message&nbsp;::&nbsp;hasAttribute__](http2-Message-hasAttribute.md) | Check to see if an attribute exists |
| [__Message&nbsp;::&nbsp;setAttribute__](http2-Message-setAttribute.md) | Add/Change an attribute value |
| [__Message&nbsp;::&nbsp;removeAttribute__](http2-Message-removeAttribute.md) | Remove an attribute value |
| [__Message&nbsp;::&nbsp;hasHeader__](http2-Message-hasHeader.md) | Check to see if there is a header with this name |
| [__Message&nbsp;::&nbsp;inHeader__](http2-Message-inHeader.md) | Perform a Case-insensitive value search on a header  Each header can have multiple values in the form of an indexed array or similar |
| [__Message&nbsp;::&nbsp;getHeader__](http2-Message-getHeader.md) | Returns the value indexed array for a specific header |
| [__Message&nbsp;::&nbsp;getHeaderLine__](http2-Message-getHeaderLine.md) | Returns the entire header line |
| [__Message&nbsp;::&nbsp;addHeader__](http2-Message-addHeader.md) | Add content to a header or create it  This method will append data to an existing one, or create it if it does not already exist |
| [__Message&nbsp;::&nbsp;setHeader__](http2-Message-setHeader.md) | Set/change a header |
| [__Message&nbsp;::&nbsp;removeHeader__](http2-Message-removeHeader.md) | Remove specified header |
| [__Message&nbsp;::&nbsp;getProtocolVersion__](http2-Message-getProtocolVersion.md) | Get the protocol version like `1 |
| [__Message&nbsp;::&nbsp;setProtocolVersion__](http2-Message-setProtocolVersion.md) | Set a different protocol version like `1 |
| [__Message&nbsp;::&nbsp;getStream__](http2-Message-getStream.md) | Get the current body stream |
| [__Message&nbsp;::&nbsp;setStream__](http2-Message-setStream.md) | Set a new body stream |
| [__Message&nbsp;::&nbsp;print__](http2-Message-print.md) | Print message to stdout  This is similar to `toString()` except that it will directly output this to the client |
| [__Message&nbsp;::&nbsp;toString__](http2-Message-toString.md) | Return a string representation of the object |
| [__Message&nbsp;::&nbsp;\_\_toString__](http2-Message-__toString.md) |  |
| [__Message&nbsp;::&nbsp;clone__](http2-Message-clone.md) | A proper OOP cloning method  Classes implementing this interface should also be able to deal with `clone $object` |
| [__Message&nbsp;::&nbsp;getIterator__](http2-Message-getIterator.md) |  |
