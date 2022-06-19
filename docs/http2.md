# [HTTP Base](http-base.md) / HTTP Message v2
____

## Description
A reworked OOP HTTP Message library

## Interfaces
| Name | Description |
| :--- | :---------- |
| [ContentParser](http2-ContentParser.md) | Defines a parser that is used to parse the request body |
| [File](http2-File.md) | Defines a file that can be attached to a request |
| [Message](http2-Message.md) | Defines a message object for the http message specification |
| [Request](http2-Request.md) | Defines a Request object for the http message specification |
| [Response](http2-Response.md) | Defines a Response object for the http message specification |
| [Uri](http2-Uri.md) | Defines a Uri object for the http message specification |

## Classes
| Name | Description |
| :--- | :---------- |
| [File](http2-File.md) | An implementation of `im\http2\msg\File` |
| [Request](http2-Request.md) | An implementation of `im\http2\msg\Request` |
| [Response](http2-Response.md) | An implementation of `im\http2\msg\Response` |
| [ServerRequest](http2-ServerRequest.md) | An implementation of `im\http2\msg\Request`  This implementation will be initiated an populated with data from PHP's superglobals |
| [Uri](http2-Uri.md) | An implementation of `im\http2\msg\Uri` |
| [BaseMessage](http2-BaseMessage.md) | This is an implementation of the `im\http2\msg\Message` interface |
