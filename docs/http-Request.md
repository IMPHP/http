# [HTTP Message](http.md) / Request
 > im\http\msg\Request
____

## Description
Defines a Request object for the http message specification

__PARAMS__

There is some data forms that does not really belong in these objects.
You got parsed body, query params, cookie params and more.
The query is really part of the Uri in the form of a string.
Cookie data is part of the header and body is a stream.
However it would be a drag having to extract some specific form data
from the stream each time, or parse the query string to get one of the
segments. PHP's solution is to parse all of this data into a few
superglobal variables like $_POST, $_GET ... and it is a great idea
because the structure of all of this data is the same. You got
a `string` key and some `mixed` data.

IM HTTP uses the exact same system, only here it is wrapped inside
a request object. Each type like cookies, files and so on
are contained in their own `Params` space.

At the same time we are able to store all of this data without actually
creating to much specific integrations for it, unlike PSR7. Like mentioned above,
this data has no real place in these objects but they are a great help.
The params space are a middle way. Also in IM HTTP all of this data
can be stored in a shared request object. For some reason in PSR it is
only available in ServerRequest.

In order for this information to be of any use, some rules must apply
when changes are made to other parts of the request. In IMHTTP tings like
cookies, query and body params mirror their original source. If you
update one of these sources, the params must follow. For example
if you switch the Uri object, the query params must be updated to mirror
the new query string in the Uri.

## Synopsis
```php
interface Request implements im\http\msg\Message, Traversable, IteratorAggregate {

    // Constants
    string P_BODY = 'body'
    string P_COOKIES = 'cookies'
    string P_QUERY = 'query'
    string P_ATTR = 'attributes'

    // Methods
    getMethod(): string
    getUri(): im\http\msg\Uri
    getRequestTarget(): string
    getFile(string $name): null|im\http\msg\File
    getFiles(null|string $name = NULL): im\util\IndexArray
    getParam(string $name, mixed $default = NULL, string $type = im\http\msg\Request::P_ATTR): mixed
    hasParam(string $name, string $type = im\http\msg\Request::P_ATTR): bool
    getParsedBody(): mixed
    getBuilder(): im\http\msg\RequestBuilder

    // Inherited Methods
    hasHeader(string $name): bool
    inHeader(string $name, string $search): bool
    getHeader(string $name): im\util\ListArray
    getHeaderLine(string $name): null|string
    getProtocolVersion(): string
    getBody(): im\io\Stream
    toString(): string
    getIterator()
}
```

## Constants
| Name | Description |
| :--- | :---------- |
| [__Request&nbsp;::&nbsp;P\_BODY__](http-Request-prop_P_BODY.md) | Used with the param methods to work with the body params |
| [__Request&nbsp;::&nbsp;P\_COOKIES__](http-Request-prop_P_COOKIES.md) | Used with the param methods to work with the cookies params |
| [__Request&nbsp;::&nbsp;P\_QUERY__](http-Request-prop_P_QUERY.md) | Used with the param methods to work with the query params |
| [__Request&nbsp;::&nbsp;P\_ATTR__](http-Request-prop_P_ATTR.md) | A shared params location where custom data can be stored, like PSR7's attributes in ServerRequest |

## Methods
| Name | Description |
| :--- | :---------- |
| [__Request&nbsp;::&nbsp;getMethod__](http-Request-getMethod.md) | Get the request method |
| [__Request&nbsp;::&nbsp;getUri__](http-Request-getUri.md) | Get the Uri object accociated with this request |
| [__Request&nbsp;::&nbsp;getRequestTarget__](http-Request-getRequestTarget.md) | Get the request target  This is build from the Uri object in origin-form, unless it has been set manually |
| [__Request&nbsp;::&nbsp;getFile__](http-Request-getFile.md) | Get a specific file based on it's name |
| [__Request&nbsp;::&nbsp;getFiles__](http-Request-getFiles.md) | Get all the files in this request |
| [__Request&nbsp;::&nbsp;getParam__](http-Request-getParam.md) | Get the value from a param |
| [__Request&nbsp;::&nbsp;hasParam__](http-Request-hasParam.md) | Check to see if a specific param exists |
| [__Request&nbsp;::&nbsp;getParsedBody__](http-Request-getParsedBody.md) | Get the data from body in parsed form |
| [__Request&nbsp;::&nbsp;getBuilder__](http-Request-getBuilder.md) | Get a message builder for the current message |
| [__Request&nbsp;::&nbsp;hasHeader__](http-Request-hasHeader.md) | Check to see if there is a header with this name |
| [__Request&nbsp;::&nbsp;inHeader__](http-Request-inHeader.md) | Perform a Case-insensitive value search on a header  Each header can have multiple values in the form of an indexed array or similar |
| [__Request&nbsp;::&nbsp;getHeader__](http-Request-getHeader.md) | Returns the value indexed array for a specific header |
| [__Request&nbsp;::&nbsp;getHeaderLine__](http-Request-getHeaderLine.md) | Returns the entire header line |
| [__Request&nbsp;::&nbsp;getProtocolVersion__](http-Request-getProtocolVersion.md) | Get the protocol version like `1 |
| [__Request&nbsp;::&nbsp;getBody__](http-Request-getBody.md) | Get the current body stream |
| [__Request&nbsp;::&nbsp;toString__](http-Request-toString.md) | Get a string of the request  This is a text representation of the message |
| [__Request&nbsp;::&nbsp;getIterator__](http-Request-getIterator.md) |  |
