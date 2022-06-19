# [HTTP Base](http-base.md) / [HTTP Message v2](http2.md) / Request
 > im\http2\msg\Request
____

## Description
Defines a Request object for the http message specification

## Synopsis
```php
interface Request implements im\http2\msg\Message, Traversable, Stringable, IteratorAggregate, im\features\Cloneable, im\features\Stringable {

    // Methods
    setParser(im\http2\msg\ContentParser $parser, null|string $contentType = NULL): void
    getParsedData(): mixed
    setPreserveHost(bool $flag): void
    getMethod(): string
    setMethod(string $method): void
    getUri(): im\http2\msg\Uri
    setUri(Uri $uri): void
    getRequestTarget(): string
    setRequestTarget(string $requestTarget): void
    hasFile(string $name): bool
    getFile(string $name): null|im\http2\msg\File
    getFiles(null|string $name = NULL): im\util\ImmutableListArray
    addFile(im\http2\msg\File $file): void
    removeFiles(null|string $name = NULL): void

    // Inherited Methods
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
    toString(): string
    __toString(): string
    clone(): static
    getIterator()
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__Request&nbsp;::&nbsp;setParser__](http2-Request-setParser.md) | Add a parser for a given content type  The parser being added is used to parse the stream data when calling `getParsedData()` |
| [__Request&nbsp;::&nbsp;getParsedData__](http2-Request-getParsedData.md) | Get the parsed data from the request stream  There is no proper way to enforce static types on this |
| [__Request&nbsp;::&nbsp;setPreserveHost__](http2-Request-setPreserveHost.md) | Set whether or not the `Host` header should be updated to match `Uri` |
| [__Request&nbsp;::&nbsp;getMethod__](http2-Request-getMethod.md) | Get the request method |
| [__Request&nbsp;::&nbsp;setMethod__](http2-Request-setMethod.md) | Get a new instance with modified request method |
| [__Request&nbsp;::&nbsp;getUri__](http2-Request-getUri.md) | Get the Uri object accociated with this request |
| [__Request&nbsp;::&nbsp;setUri__](http2-Request-setUri.md) | Set a new Uri object |
| [__Request&nbsp;::&nbsp;getRequestTarget__](http2-Request-getRequestTarget.md) | Get the request target  This is build from the Uri object in origin-form, unless it has been set manually |
| [__Request&nbsp;::&nbsp;setRequestTarget__](http2-Request-setRequestTarget.md) | Set a new request target |
| [__Request&nbsp;::&nbsp;hasFile__](http2-Request-hasFile.md) | Check whether or not a file exists within this request |
| [__Request&nbsp;::&nbsp;getFile__](http2-Request-getFile.md) | Get a specific file based on it's name |
| [__Request&nbsp;::&nbsp;getFiles__](http2-Request-getFiles.md) | Get all the files in this request |
| [__Request&nbsp;::&nbsp;addFile__](http2-Request-addFile.md) | Add a file to this request |
| [__Request&nbsp;::&nbsp;removeFiles__](http2-Request-removeFiles.md) | Remove all files or those based on a name |
| [__Request&nbsp;::&nbsp;getAttribute__](http2-Request-getAttribute.md) | Retrieve a single attribute |
| [__Request&nbsp;::&nbsp;hasAttribute__](http2-Request-hasAttribute.md) | Check to see if an attribute exists |
| [__Request&nbsp;::&nbsp;setAttribute__](http2-Request-setAttribute.md) | Add/Change an attribute value |
| [__Request&nbsp;::&nbsp;removeAttribute__](http2-Request-removeAttribute.md) | Remove an attribute value |
| [__Request&nbsp;::&nbsp;hasHeader__](http2-Request-hasHeader.md) | Check to see if there is a header with this name |
| [__Request&nbsp;::&nbsp;inHeader__](http2-Request-inHeader.md) | Perform a Case-insensitive value search on a header  Each header can have multiple values in the form of an indexed array or similar |
| [__Request&nbsp;::&nbsp;getHeader__](http2-Request-getHeader.md) | Returns the value indexed array for a specific header |
| [__Request&nbsp;::&nbsp;getHeaderLine__](http2-Request-getHeaderLine.md) | Returns the entire header line |
| [__Request&nbsp;::&nbsp;addHeader__](http2-Request-addHeader.md) | Add content to a header or create it  This method will append data to an existing one, or create it if it does not already exist |
| [__Request&nbsp;::&nbsp;setHeader__](http2-Request-setHeader.md) | Set/change a header |
| [__Request&nbsp;::&nbsp;removeHeader__](http2-Request-removeHeader.md) | Remove specified header |
| [__Request&nbsp;::&nbsp;getProtocolVersion__](http2-Request-getProtocolVersion.md) | Get the protocol version like `1 |
| [__Request&nbsp;::&nbsp;setProtocolVersion__](http2-Request-setProtocolVersion.md) | Set a different protocol version like `1 |
| [__Request&nbsp;::&nbsp;getStream__](http2-Request-getStream.md) | Get the current body stream |
| [__Request&nbsp;::&nbsp;setStream__](http2-Request-setStream.md) | Set a new body stream |
| [__Request&nbsp;::&nbsp;print__](http2-Request-print.md) | Print message to stdout  This is similar to `toString()` except that it will directly output this to the client |
| [__Request&nbsp;::&nbsp;toString__](http2-Request-toString.md) | Return a string representation of the object |
| [__Request&nbsp;::&nbsp;\_\_toString__](http2-Request-__toString.md) |  |
| [__Request&nbsp;::&nbsp;clone__](http2-Request-clone.md) | A proper OOP cloning method  Classes implementing this interface should also be able to deal with `clone $object` |
| [__Request&nbsp;::&nbsp;getIterator__](http2-Request-getIterator.md) |  |
