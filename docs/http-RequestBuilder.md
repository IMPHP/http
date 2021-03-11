# [HTTP Message](http.md) / RequestBuilder
 > im\http\msg\RequestBuilder
____

## Description
Defines a Request builder for the http message specification

## Synopsis
```php
interface RequestBuilder implements im\http\msg\Request, im\http\msg\MessageBuilder, IteratorAggregate, Traversable, im\http\msg\Message {

    // Inherited Constants
    string P_BODY = 'body'
    string P_COOKIES = 'cookies'
    string P_QUERY = 'query'
    string P_ATTR = 'attributes'

    // Methods
    setMethod(string $method): void
    setUri(Uri $uri, bool $preserveHost = FALSE): void
    setRequestTarget(string $requestTarget): void
    addFile(im\http\msg\File $file): void
    removeFile(string $name): void
    setParam(string $name, mixed $value, string $type = im\http\msg\Request::P_ATTR): void
    getFinal(): im\http\msg\Request

    // Inherited Methods
    getMethod(): string
    getUri(): im\http\msg\Uri
    getRequestTarget(): string
    getFile(string $name): null|im\http\msg\File
    getFiles(null|string $name = NULL): im\util\IndexArray
    getParam(string $name, mixed $default = NULL, string $type = im\http\msg\Request::P_ATTR): mixed
    hasParam(string $name, string $type = im\http\msg\Request::P_ATTR): bool
    getParsedBody(): mixed
    getBuilder(): im\http\msg\RequestBuilder
    hasHeader(string $name): bool
    inHeader(string $name, string $search): bool
    getHeader(string $name): im\util\ListArray
    getHeaderLine(string $name): null|string
    getProtocolVersion(): string
    getBody(): im\io\Stream
    toString(): string
    getIterator()
    addHeader(string $name, string ...$values): void
    setHeader(string $name, string ...$values): void
    removeHeader(string $name): void
    setProtocolVersion(string $version): void
    setBody(Stream $body): void
}
```

## Constants
| Name | Description |
| :--- | :---------- |
| [__RequestBuilder&nbsp;::&nbsp;P\_BODY__](http-RequestBuilder-prop_P_BODY.md) | Used with the param methods to work with the body params |
| [__RequestBuilder&nbsp;::&nbsp;P\_COOKIES__](http-RequestBuilder-prop_P_COOKIES.md) | Used with the param methods to work with the cookies params |
| [__RequestBuilder&nbsp;::&nbsp;P\_QUERY__](http-RequestBuilder-prop_P_QUERY.md) | Used with the param methods to work with the query params |
| [__RequestBuilder&nbsp;::&nbsp;P\_ATTR__](http-RequestBuilder-prop_P_ATTR.md) | A shared params location where custom data can be stored, like PSR7's attributes in ServerRequest |

## Methods
| Name | Description |
| :--- | :---------- |
| [__RequestBuilder&nbsp;::&nbsp;setMethod__](http-RequestBuilder-setMethod.md) | Get a new instance with modified request method |
| [__RequestBuilder&nbsp;::&nbsp;setUri__](http-RequestBuilder-setUri.md) | Set a new Uri object  Unless $preserveHost is specified as `FASLE`, this will update the `Host` header within this request to match the host of the Uri object |
| [__RequestBuilder&nbsp;::&nbsp;setRequestTarget__](http-RequestBuilder-setRequestTarget.md) | Set a new request target |
| [__RequestBuilder&nbsp;::&nbsp;addFile__](http-RequestBuilder-addFile.md) | Add a file to this request |
| [__RequestBuilder&nbsp;::&nbsp;removeFile__](http-RequestBuilder-removeFile.md) | Remove a specific file based on it's name |
| [__RequestBuilder&nbsp;::&nbsp;setParam__](http-RequestBuilder-setParam.md) | Set/Change the value of a param |
| [__RequestBuilder&nbsp;::&nbsp;getFinal__](http-RequestBuilder-getFinal.md) | Get a read-only message object |
| [__RequestBuilder&nbsp;::&nbsp;getMethod__](http-RequestBuilder-getMethod.md) | Get the request method |
| [__RequestBuilder&nbsp;::&nbsp;getUri__](http-RequestBuilder-getUri.md) | Get the Uri object accociated with this request |
| [__RequestBuilder&nbsp;::&nbsp;getRequestTarget__](http-RequestBuilder-getRequestTarget.md) | Get the request target  This is build from the Uri object in origin-form, unless it has been set manually |
| [__RequestBuilder&nbsp;::&nbsp;getFile__](http-RequestBuilder-getFile.md) | Get a specific file based on it's name |
| [__RequestBuilder&nbsp;::&nbsp;getFiles__](http-RequestBuilder-getFiles.md) | Get all the files in this request |
| [__RequestBuilder&nbsp;::&nbsp;getParam__](http-RequestBuilder-getParam.md) | Get the value from a param |
| [__RequestBuilder&nbsp;::&nbsp;hasParam__](http-RequestBuilder-hasParam.md) | Check to see if a specific param exists |
| [__RequestBuilder&nbsp;::&nbsp;getParsedBody__](http-RequestBuilder-getParsedBody.md) | Get the data from body in parsed form |
| [__RequestBuilder&nbsp;::&nbsp;getBuilder__](http-RequestBuilder-getBuilder.md) | Get a message builder for the current message |
| [__RequestBuilder&nbsp;::&nbsp;hasHeader__](http-RequestBuilder-hasHeader.md) | Check to see if there is a header with this name |
| [__RequestBuilder&nbsp;::&nbsp;inHeader__](http-RequestBuilder-inHeader.md) | Perform a Case-insensitive value search on a header  Each header can have multiple values in the form of an indexed array or similar |
| [__RequestBuilder&nbsp;::&nbsp;getHeader__](http-RequestBuilder-getHeader.md) | Returns the value indexed array for a specific header |
| [__RequestBuilder&nbsp;::&nbsp;getHeaderLine__](http-RequestBuilder-getHeaderLine.md) | Returns the entire header line |
| [__RequestBuilder&nbsp;::&nbsp;getProtocolVersion__](http-RequestBuilder-getProtocolVersion.md) | Get the protocol version like `1 |
| [__RequestBuilder&nbsp;::&nbsp;getBody__](http-RequestBuilder-getBody.md) | Get the current body stream |
| [__RequestBuilder&nbsp;::&nbsp;toString__](http-RequestBuilder-toString.md) | Get a string of the request  This is a text representation of the message |
| [__RequestBuilder&nbsp;::&nbsp;getIterator__](http-RequestBuilder-getIterator.md) |  |
| [__RequestBuilder&nbsp;::&nbsp;addHeader__](http-RequestBuilder-addHeader.md) | Add content to a header or create it  This method will append data to an existing one, or create it if it does not already exist |
| [__RequestBuilder&nbsp;::&nbsp;setHeader__](http-RequestBuilder-setHeader.md) | Set/change a header |
| [__RequestBuilder&nbsp;::&nbsp;removeHeader__](http-RequestBuilder-removeHeader.md) | Remove specified header |
| [__RequestBuilder&nbsp;::&nbsp;setProtocolVersion__](http-RequestBuilder-setProtocolVersion.md) | Set a different protocol version like `1 |
| [__RequestBuilder&nbsp;::&nbsp;setBody__](http-RequestBuilder-setBody.md) | Set a new body stream |
