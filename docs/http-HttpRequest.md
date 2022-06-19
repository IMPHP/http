# [HTTP Base](http-base.md) / [HTTP Message](http.md) / HttpRequest
 > im\http\msg\HttpRequest
____

## Description
An implementation of `im\http\msg\Request`

This abstraction is used to provide read-only access to a
request builder in order to comply with the `Request` interface.

> :warning: **Deprecated**  
> This has been replaced by `im\http2\Request`  

## Synopsis
```php
class HttpRequest extends im\http\msg\HttpMessage implements im\http\msg\Message, Stringable, Traversable, IteratorAggregate, im\http\msg\Request {

    // Inherited Constants
    public string P_BODY = 'body'
    public string P_COOKIES = 'cookies'
    public string P_QUERY = 'query'
    public string P_ATTR = 'attributes'

    // Methods
    public __construct(null|im\http\msg\Request $request = NULL)
    public getMethod(): string
    public getUri(): im\http\msg\Uri
    public getRequestTarget(): string
    public getFile(string $name): null|im\http\msg\File
    public getFiles(null|string $name = NULL): im\util\IndexArray
    public getParam(string $name, mixed $default = NULL, string $type = im\http\msg\Request::P_ATTR): mixed
    public hasParam(string $name, string $type = im\http\msg\Request::P_ATTR): bool
    public getParsedBody(): mixed
    public getBody(): im\io\Stream
    public toString(): string
    public getBuilder(): im\http\msg\RequestBuilder

    // Inherited Methods
    public hasHeader(string $name): bool
    public inHeader(string $name, string $search): bool
    public getHeader(string $name): im\util\ListArray
    public getHeaderLine(string $name): null|string
    public getProtocolVersion(): string
}
```

## Constants
| Name | Description |
| :--- | :---------- |
| [__HttpRequest&nbsp;::&nbsp;P\_BODY__](http-HttpRequest-prop_P_BODY.md) | Used with the param methods to work with the body params |
| [__HttpRequest&nbsp;::&nbsp;P\_COOKIES__](http-HttpRequest-prop_P_COOKIES.md) | Used with the param methods to work with the cookies params |
| [__HttpRequest&nbsp;::&nbsp;P\_QUERY__](http-HttpRequest-prop_P_QUERY.md) | Used with the param methods to work with the query params |
| [__HttpRequest&nbsp;::&nbsp;P\_ATTR__](http-HttpRequest-prop_P_ATTR.md) | A shared params location where custom data can be stored, like PSR7's attributes in ServerRequest |

## Methods
| Name | Description |
| :--- | :---------- |
| [__HttpRequest&nbsp;::&nbsp;\_\_construct__](http-HttpRequest-__construct.md) |  |
| [__HttpRequest&nbsp;::&nbsp;getMethod__](http-HttpRequest-getMethod.md) | Get the request method |
| [__HttpRequest&nbsp;::&nbsp;getUri__](http-HttpRequest-getUri.md) | Get the Uri object accociated with this request |
| [__HttpRequest&nbsp;::&nbsp;getRequestTarget__](http-HttpRequest-getRequestTarget.md) | Get the request target  This is build from the Uri object in origin-form, unless it has been set manually |
| [__HttpRequest&nbsp;::&nbsp;getFile__](http-HttpRequest-getFile.md) | Get a specific file based on it's name |
| [__HttpRequest&nbsp;::&nbsp;getFiles__](http-HttpRequest-getFiles.md) | Get all the files in this request |
| [__HttpRequest&nbsp;::&nbsp;getParam__](http-HttpRequest-getParam.md) | Get the value from a param |
| [__HttpRequest&nbsp;::&nbsp;hasParam__](http-HttpRequest-hasParam.md) | Check to see if a specific param exists |
| [__HttpRequest&nbsp;::&nbsp;getParsedBody__](http-HttpRequest-getParsedBody.md) | Get the data from body in parsed form |
| [__HttpRequest&nbsp;::&nbsp;getBody__](http-HttpRequest-getBody.md) | Get the current body stream |
| [__HttpRequest&nbsp;::&nbsp;toString__](http-HttpRequest-toString.md) | Get a string of the request  This is a text representation of the message |
| [__HttpRequest&nbsp;::&nbsp;getBuilder__](http-HttpRequest-getBuilder.md) | Get a message builder for the current message |
| [__HttpRequest&nbsp;::&nbsp;hasHeader__](http-HttpRequest-hasHeader.md) | Check to see if there is a header with this name |
| [__HttpRequest&nbsp;::&nbsp;inHeader__](http-HttpRequest-inHeader.md) | Perform a Case-insensitive value search on a header  Each header can have multiple values in the form of an indexed array or similar |
| [__HttpRequest&nbsp;::&nbsp;getHeader__](http-HttpRequest-getHeader.md) | Returns the value indexed array for a specific header |
| [__HttpRequest&nbsp;::&nbsp;getHeaderLine__](http-HttpRequest-getHeaderLine.md) | Returns the entire header line |
| [__HttpRequest&nbsp;::&nbsp;getProtocolVersion__](http-HttpRequest-getProtocolVersion.md) | Get the protocol version like `1 |
