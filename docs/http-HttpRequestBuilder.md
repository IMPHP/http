# [HTTP Base](http-base.md) / [HTTP Message](http.md) / HttpRequestBuilder
 > im\http\msg\HttpRequestBuilder
____

## Description
An implementation of `im\http\msg\RequestBuilder`

> :warning: **Deprecated**  
> This has been replaced by `im\http2\Request`  

## Synopsis
```php
class HttpRequestBuilder extends im\http\msg\HttpMessageBuilder implements im\http\msg\MessageBuilder, Stringable, IteratorAggregate, Traversable, im\http\msg\Message, im\http\msg\RequestBuilder, im\http\msg\Request {

    // Inherited Constants
    public string P_BODY = 'body'
    public string P_COOKIES = 'cookies'
    public string P_QUERY = 'query'
    public string P_ATTR = 'attributes'

    // Methods
    public __construct(string $method, im\http\msg\Uri $uri, null|im\http\msg\StreamParser $parser = NULL)
    public getMethod(): string
    public setMethod(string $method): void
    public getUri(): im\http\msg\Uri
    public setUri(Uri $uri, bool $preserveHost = FALSE): void
    public getRequestTarget(): string
    public setRequestTarget(string $requestTarget): void
    public addFile(im\http\msg\File $file): void
    public getFile(string $name): null|im\http\msg\File
    public removeFile(string $name): void
    public getFiles(null|string $name = NULL): im\util\IndexArray
    public getParam(string $name, mixed $default = NULL, string $type = im\http\msg\Request::P_ATTR): mixed
    public hasParam(string $name, string $type = im\http\msg\Request::P_ATTR): bool
    public setParam(string $name, mixed $value, string $type = im\http\msg\Request::P_ATTR): void
    public getParsedBody(): mixed
    public getBody(): im\io\Stream
    public setBody(Stream $body): void
    public toString(): string
    public getBuilder(): im\http\msg\RequestBuilder
    public getFinal(): im\http\msg\Request

    // Inherited Methods
    public hasHeader(string $name): bool
    public inHeader(string $name, string $search): bool
    public getHeader(string $name): im\util\ListArray
    public getHeaderLine(string $name): null|string
    public addHeader(string $name, string ...$values): void
    public setHeader(string $name, string ...$values): void
    public removeHeader(string $name): void
    public getProtocolVersion(): string
    public setProtocolVersion(string $version): void
}
```

## Constants
| Name | Description |
| :--- | :---------- |
| [__HttpRequestBuilder&nbsp;::&nbsp;P\_BODY__](http-HttpRequestBuilder-prop_P_BODY.md) | Used with the param methods to work with the body params |
| [__HttpRequestBuilder&nbsp;::&nbsp;P\_COOKIES__](http-HttpRequestBuilder-prop_P_COOKIES.md) | Used with the param methods to work with the cookies params |
| [__HttpRequestBuilder&nbsp;::&nbsp;P\_QUERY__](http-HttpRequestBuilder-prop_P_QUERY.md) | Used with the param methods to work with the query params |
| [__HttpRequestBuilder&nbsp;::&nbsp;P\_ATTR__](http-HttpRequestBuilder-prop_P_ATTR.md) | A shared params location where custom data can be stored, like PSR7's attributes in ServerRequest |

## Methods
| Name | Description |
| :--- | :---------- |
| [__HttpRequestBuilder&nbsp;::&nbsp;\_\_construct__](http-HttpRequestBuilder-__construct.md) |  |
| [__HttpRequestBuilder&nbsp;::&nbsp;getMethod__](http-HttpRequestBuilder-getMethod.md) | Get the request method |
| [__HttpRequestBuilder&nbsp;::&nbsp;setMethod__](http-HttpRequestBuilder-setMethod.md) | Get a new instance with modified request method |
| [__HttpRequestBuilder&nbsp;::&nbsp;getUri__](http-HttpRequestBuilder-getUri.md) | Get the Uri object accociated with this request |
| [__HttpRequestBuilder&nbsp;::&nbsp;setUri__](http-HttpRequestBuilder-setUri.md) | Set a new Uri object  Unless $preserveHost is specified as `FASLE`, this will update the `Host` header within this request to match the host of the Uri object |
| [__HttpRequestBuilder&nbsp;::&nbsp;getRequestTarget__](http-HttpRequestBuilder-getRequestTarget.md) | Get the request target  This is build from the Uri object in origin-form, unless it has been set manually |
| [__HttpRequestBuilder&nbsp;::&nbsp;setRequestTarget__](http-HttpRequestBuilder-setRequestTarget.md) | Set a new request target |
| [__HttpRequestBuilder&nbsp;::&nbsp;addFile__](http-HttpRequestBuilder-addFile.md) | Add a file to this request |
| [__HttpRequestBuilder&nbsp;::&nbsp;getFile__](http-HttpRequestBuilder-getFile.md) | Get a specific file based on it's name |
| [__HttpRequestBuilder&nbsp;::&nbsp;removeFile__](http-HttpRequestBuilder-removeFile.md) | Remove a specific file based on it's name |
| [__HttpRequestBuilder&nbsp;::&nbsp;getFiles__](http-HttpRequestBuilder-getFiles.md) | Get all the files in this request |
| [__HttpRequestBuilder&nbsp;::&nbsp;getParam__](http-HttpRequestBuilder-getParam.md) | Get the value from a param |
| [__HttpRequestBuilder&nbsp;::&nbsp;hasParam__](http-HttpRequestBuilder-hasParam.md) | Check to see if a specific param exists |
| [__HttpRequestBuilder&nbsp;::&nbsp;setParam__](http-HttpRequestBuilder-setParam.md) | Set/Change the value of a param |
| [__HttpRequestBuilder&nbsp;::&nbsp;getParsedBody__](http-HttpRequestBuilder-getParsedBody.md) | Get the data from body in parsed form |
| [__HttpRequestBuilder&nbsp;::&nbsp;getBody__](http-HttpRequestBuilder-getBody.md) | Get the current body stream |
| [__HttpRequestBuilder&nbsp;::&nbsp;setBody__](http-HttpRequestBuilder-setBody.md) | Set a new body stream |
| [__HttpRequestBuilder&nbsp;::&nbsp;toString__](http-HttpRequestBuilder-toString.md) | Get a string of the request  This is a text representation of the message |
| [__HttpRequestBuilder&nbsp;::&nbsp;getBuilder__](http-HttpRequestBuilder-getBuilder.md) | Get a message builder for the current message |
| [__HttpRequestBuilder&nbsp;::&nbsp;getFinal__](http-HttpRequestBuilder-getFinal.md) | Get a read-only message object |
| [__HttpRequestBuilder&nbsp;::&nbsp;hasHeader__](http-HttpRequestBuilder-hasHeader.md) | Check to see if there is a header with this name |
| [__HttpRequestBuilder&nbsp;::&nbsp;inHeader__](http-HttpRequestBuilder-inHeader.md) | Perform a Case-insensitive value search on a header  Each header can have multiple values in the form of an indexed array or similar |
| [__HttpRequestBuilder&nbsp;::&nbsp;getHeader__](http-HttpRequestBuilder-getHeader.md) | Returns the value indexed array for a specific header |
| [__HttpRequestBuilder&nbsp;::&nbsp;getHeaderLine__](http-HttpRequestBuilder-getHeaderLine.md) | Returns the entire header line |
| [__HttpRequestBuilder&nbsp;::&nbsp;addHeader__](http-HttpRequestBuilder-addHeader.md) | Add content to a header or create it  This method will append data to an existing one, or create it if it does not already exist |
| [__HttpRequestBuilder&nbsp;::&nbsp;setHeader__](http-HttpRequestBuilder-setHeader.md) | Set/change a header |
| [__HttpRequestBuilder&nbsp;::&nbsp;removeHeader__](http-HttpRequestBuilder-removeHeader.md) | Remove specified header |
| [__HttpRequestBuilder&nbsp;::&nbsp;getProtocolVersion__](http-HttpRequestBuilder-getProtocolVersion.md) | Get the protocol version like `1 |
| [__HttpRequestBuilder&nbsp;::&nbsp;setProtocolVersion__](http-HttpRequestBuilder-setProtocolVersion.md) | Set a different protocol version like `1 |
