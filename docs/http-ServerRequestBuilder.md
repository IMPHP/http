# [HTTP Message](http.md) / ServerRequestBuilder
 > im\http\msg\ServerRequestBuilder
____

## Description
An implementation of `im\http\msg\RequestBuilder`

This builder will be initiated an populated with data from
PHP's superglobals. This includes URI, Host, Uploaded files and more.

## Synopsis
```php
class ServerRequestBuilder extends im\http\msg\HttpRequestBuilder implements im\http\msg\Request, im\http\msg\RequestBuilder, im\http\msg\Message, Traversable, IteratorAggregate, Stringable, im\http\msg\MessageBuilder {

    // Inherited Constants
    public string P_BODY = 'body'
    public string P_COOKIES = 'cookies'
    public string P_QUERY = 'query'
    public string P_ATTR = 'attributes'

    // Methods
    public __construct(null|im\http\msg\StreamParser $parser = NULL)

    // Inherited Methods
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
| [__ServerRequestBuilder&nbsp;::&nbsp;P\_BODY__](http-ServerRequestBuilder-prop_P_BODY.md) | Used with the param methods to work with the body params |
| [__ServerRequestBuilder&nbsp;::&nbsp;P\_COOKIES__](http-ServerRequestBuilder-prop_P_COOKIES.md) | Used with the param methods to work with the cookies params |
| [__ServerRequestBuilder&nbsp;::&nbsp;P\_QUERY__](http-ServerRequestBuilder-prop_P_QUERY.md) | Used with the param methods to work with the query params |
| [__ServerRequestBuilder&nbsp;::&nbsp;P\_ATTR__](http-ServerRequestBuilder-prop_P_ATTR.md) | A shared params location where custom data can be stored, like PSR7's attributes in ServerRequest |

## Methods
| Name | Description |
| :--- | :---------- |
| [__ServerRequestBuilder&nbsp;::&nbsp;\_\_construct__](http-ServerRequestBuilder-__construct.md) |  |
| [__ServerRequestBuilder&nbsp;::&nbsp;getMethod__](http-ServerRequestBuilder-getMethod.md) | Get the request method |
| [__ServerRequestBuilder&nbsp;::&nbsp;setMethod__](http-ServerRequestBuilder-setMethod.md) | Get a new instance with modified request method |
| [__ServerRequestBuilder&nbsp;::&nbsp;getUri__](http-ServerRequestBuilder-getUri.md) | Get the Uri object accociated with this request |
| [__ServerRequestBuilder&nbsp;::&nbsp;setUri__](http-ServerRequestBuilder-setUri.md) | Set a new Uri object  Unless $preserveHost is specified as `FASLE`, this will update the `Host` header within this request to match the host of the Uri object |
| [__ServerRequestBuilder&nbsp;::&nbsp;getRequestTarget__](http-ServerRequestBuilder-getRequestTarget.md) | Get the request target  This is build from the Uri object in origin-form, unless it has been set manually |
| [__ServerRequestBuilder&nbsp;::&nbsp;setRequestTarget__](http-ServerRequestBuilder-setRequestTarget.md) | Set a new request target |
| [__ServerRequestBuilder&nbsp;::&nbsp;addFile__](http-ServerRequestBuilder-addFile.md) | Add a file to this request |
| [__ServerRequestBuilder&nbsp;::&nbsp;getFile__](http-ServerRequestBuilder-getFile.md) | Get a specific file based on it's name |
| [__ServerRequestBuilder&nbsp;::&nbsp;removeFile__](http-ServerRequestBuilder-removeFile.md) | Remove a specific file based on it's name |
| [__ServerRequestBuilder&nbsp;::&nbsp;getFiles__](http-ServerRequestBuilder-getFiles.md) | Get all the files in this request |
| [__ServerRequestBuilder&nbsp;::&nbsp;getParam__](http-ServerRequestBuilder-getParam.md) | Get the value from a param |
| [__ServerRequestBuilder&nbsp;::&nbsp;hasParam__](http-ServerRequestBuilder-hasParam.md) | Check to see if a specific param exists |
| [__ServerRequestBuilder&nbsp;::&nbsp;setParam__](http-ServerRequestBuilder-setParam.md) | Set/Change the value of a param |
| [__ServerRequestBuilder&nbsp;::&nbsp;getParsedBody__](http-ServerRequestBuilder-getParsedBody.md) | Get the data from body in parsed form |
| [__ServerRequestBuilder&nbsp;::&nbsp;getBody__](http-ServerRequestBuilder-getBody.md) | Get the current body stream |
| [__ServerRequestBuilder&nbsp;::&nbsp;setBody__](http-ServerRequestBuilder-setBody.md) | Set a new body stream |
| [__ServerRequestBuilder&nbsp;::&nbsp;toString__](http-ServerRequestBuilder-toString.md) | Get a string of the request  This is a text representation of the message |
| [__ServerRequestBuilder&nbsp;::&nbsp;getBuilder__](http-ServerRequestBuilder-getBuilder.md) | Get a message builder for the current message |
| [__ServerRequestBuilder&nbsp;::&nbsp;getFinal__](http-ServerRequestBuilder-getFinal.md) | Get a read-only message object |
| [__ServerRequestBuilder&nbsp;::&nbsp;hasHeader__](http-ServerRequestBuilder-hasHeader.md) | Check to see if there is a header with this name |
| [__ServerRequestBuilder&nbsp;::&nbsp;inHeader__](http-ServerRequestBuilder-inHeader.md) | Perform a Case-insensitive value search on a header  Each header can have multiple values in the form of an indexed array or similar |
| [__ServerRequestBuilder&nbsp;::&nbsp;getHeader__](http-ServerRequestBuilder-getHeader.md) | Returns the value indexed array for a specific header |
| [__ServerRequestBuilder&nbsp;::&nbsp;getHeaderLine__](http-ServerRequestBuilder-getHeaderLine.md) | Returns the entire header line |
| [__ServerRequestBuilder&nbsp;::&nbsp;addHeader__](http-ServerRequestBuilder-addHeader.md) | Add content to a header or create it  This method will append data to an existing one, or create it if it does not already exist |
| [__ServerRequestBuilder&nbsp;::&nbsp;setHeader__](http-ServerRequestBuilder-setHeader.md) | Set/change a header |
| [__ServerRequestBuilder&nbsp;::&nbsp;removeHeader__](http-ServerRequestBuilder-removeHeader.md) | Remove specified header |
| [__ServerRequestBuilder&nbsp;::&nbsp;getProtocolVersion__](http-ServerRequestBuilder-getProtocolVersion.md) | Get the protocol version like `1 |
| [__ServerRequestBuilder&nbsp;::&nbsp;setProtocolVersion__](http-ServerRequestBuilder-setProtocolVersion.md) | Set a different protocol version like `1 |
