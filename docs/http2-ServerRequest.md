# [HTTP Base](http-base.md) / [HTTP Message v2](http2.md) / ServerRequest
 > im\http2\ServerRequest
____

## Description
An implementation of `im\http2\msg\Request`

This implementation will be initiated an populated with data from
PHP's superglobals. This includes URI, Host, Uploaded files and more.

## Synopsis
```php
class ServerRequest extends im\http2\Request implements im\http2\msg\Request, im\features\Stringable, im\features\Cloneable, IteratorAggregate, Traversable, Stringable, im\http2\msg\Message {

    // Methods
    public __construct()

    // Inherited Methods
    public setParser(im\http2\msg\ContentParser $parser, null|string $contentType = NULL): void
    public hasHeader(string $name): bool
    public inHeader(string $name, string $search): bool
    public getHeader(string $name): im\util\ImmutableListArray
    public getHeaderLine(string $name): null|string
    public setPreserveHost(bool $flag): void
    public getMethod(): string
    public setMethod(string $method): void
    public getUri(): im\http2\msg\Uri
    public setUri(Uri $uri): void
    public getRequestTarget(): string
    public setRequestTarget(string $requestTarget): void
    public hasFile(string $name): bool
    public addFile(im\http2\msg\File $file): void
    public getFile(string $name): null|im\http2\msg\File
    public removeFiles(null|string $name = NULL): void
    public getFiles(null|string $name = NULL): im\util\ImmutableListArray
    public getParsedData(): mixed
    public getStream(): im\io\Stream
    public setStream(Stream $body): void
    public toString(): string
    public print(): void
    public getAttribute(string $name, mixed $default = NULL): mixed
    public hasAttribute(string $name): bool
    public setAttribute(string $name, mixed $value): void
    public removeAttribute(string $name): void
    public addHeader(string $name, string ...$values): void
    public setHeader(string $name, string ...$values): void
    public removeHeader(string $name): void
    public getProtocolVersion(): string
    public setProtocolVersion(string $version): void
    public clone(): static
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__ServerRequest&nbsp;::&nbsp;\_\_construct__](http2-ServerRequest-__construct.md) |  |
| [__ServerRequest&nbsp;::&nbsp;setParser__](http2-ServerRequest-setParser.md) | Add a parser for a given content type  The parser being added is used to parse the stream data when calling `getParsedData()` |
| [__ServerRequest&nbsp;::&nbsp;hasHeader__](http2-ServerRequest-hasHeader.md) | Check to see if there is a header with this name |
| [__ServerRequest&nbsp;::&nbsp;inHeader__](http2-ServerRequest-inHeader.md) | Perform a Case-insensitive value search on a header  Each header can have multiple values in the form of an indexed array or similar |
| [__ServerRequest&nbsp;::&nbsp;getHeader__](http2-ServerRequest-getHeader.md) | Returns the value indexed array for a specific header |
| [__ServerRequest&nbsp;::&nbsp;getHeaderLine__](http2-ServerRequest-getHeaderLine.md) | Returns the entire header line |
| [__ServerRequest&nbsp;::&nbsp;setPreserveHost__](http2-ServerRequest-setPreserveHost.md) |  |
| [__ServerRequest&nbsp;::&nbsp;getMethod__](http2-ServerRequest-getMethod.md) | Get the request method |
| [__ServerRequest&nbsp;::&nbsp;setMethod__](http2-ServerRequest-setMethod.md) | Get a new instance with modified request method |
| [__ServerRequest&nbsp;::&nbsp;getUri__](http2-ServerRequest-getUri.md) | Get the Uri object accociated with this request |
| [__ServerRequest&nbsp;::&nbsp;setUri__](http2-ServerRequest-setUri.md) | Set a new Uri object |
| [__ServerRequest&nbsp;::&nbsp;getRequestTarget__](http2-ServerRequest-getRequestTarget.md) | Get the request target  This is build from the Uri object in origin-form, unless it has been set manually |
| [__ServerRequest&nbsp;::&nbsp;setRequestTarget__](http2-ServerRequest-setRequestTarget.md) | Set a new request target |
| [__ServerRequest&nbsp;::&nbsp;hasFile__](http2-ServerRequest-hasFile.md) | Check whether or not a file exists within this request |
| [__ServerRequest&nbsp;::&nbsp;addFile__](http2-ServerRequest-addFile.md) | Add a file to this request |
| [__ServerRequest&nbsp;::&nbsp;getFile__](http2-ServerRequest-getFile.md) | Get a specific file based on it's name |
| [__ServerRequest&nbsp;::&nbsp;removeFiles__](http2-ServerRequest-removeFiles.md) | Remove all files or those based on a name |
| [__ServerRequest&nbsp;::&nbsp;getFiles__](http2-ServerRequest-getFiles.md) | Get all the files in this request |
| [__ServerRequest&nbsp;::&nbsp;getParsedData__](http2-ServerRequest-getParsedData.md) | Get the parsed data from the request stream  There is no proper way to enforce static types on this |
| [__ServerRequest&nbsp;::&nbsp;getStream__](http2-ServerRequest-getStream.md) | Get the current body stream |
| [__ServerRequest&nbsp;::&nbsp;setStream__](http2-ServerRequest-setStream.md) | Set a new body stream |
| [__ServerRequest&nbsp;::&nbsp;toString__](http2-ServerRequest-toString.md) | Return a string representation of the object |
| [__ServerRequest&nbsp;::&nbsp;print__](http2-ServerRequest-print.md) | Print message to stdout  This is similar to `toString()` except that it will directly output this to the client |
| [__ServerRequest&nbsp;::&nbsp;getAttribute__](http2-ServerRequest-getAttribute.md) | Retrieve a single attribute |
| [__ServerRequest&nbsp;::&nbsp;hasAttribute__](http2-ServerRequest-hasAttribute.md) | Check to see if an attribute exists |
| [__ServerRequest&nbsp;::&nbsp;setAttribute__](http2-ServerRequest-setAttribute.md) | Add/Change an attribute value |
| [__ServerRequest&nbsp;::&nbsp;removeAttribute__](http2-ServerRequest-removeAttribute.md) | Remove an attribute value |
| [__ServerRequest&nbsp;::&nbsp;addHeader__](http2-ServerRequest-addHeader.md) | Add content to a header or create it  This method will append data to an existing one, or create it if it does not already exist |
| [__ServerRequest&nbsp;::&nbsp;setHeader__](http2-ServerRequest-setHeader.md) | Set/change a header |
| [__ServerRequest&nbsp;::&nbsp;removeHeader__](http2-ServerRequest-removeHeader.md) | Remove specified header |
| [__ServerRequest&nbsp;::&nbsp;getProtocolVersion__](http2-ServerRequest-getProtocolVersion.md) | Get the protocol version like `1 |
| [__ServerRequest&nbsp;::&nbsp;setProtocolVersion__](http2-ServerRequest-setProtocolVersion.md) | Set a different protocol version like `1 |
| [__ServerRequest&nbsp;::&nbsp;clone__](http2-ServerRequest-clone.md) | A proper OOP cloning method  Classes implementing this interface should also be able to deal with `clone $object` |
