# HTTP Message
____

## Description
Package containing an OOP HTTP Message library

## Interfaces
| Name | Description |
| :--- | :---------- |
| [File](http-File.md) | Defines a file that can be attached to a request |
| [Message](http-Message.md) | Defines a message object for the http message specification |
| [MessageBuilder](http-MessageBuilder.md) | Defines a message builder for the http message specification |
| [Request](http-Request.md) | Defines a Request object for the http message specification  __PARAMS__  There is some data forms that does not really belong in these objects |
| [RequestBuilder](http-RequestBuilder.md) | Defines a Request builder for the http message specification |
| [Response](http-Response.md) | Defines a Response object for the http message specification |
| [ResponseBuilder](http-ResponseBuilder.md) | Defines a Request builder for the http message specification |
| [Uri](http-Uri.md) | Defines a Uri object for the http message specification |
| [UriBuilder](http-UriBuilder.md) | Defines a Uri builder for the http message specification |

## Classes
| Name | Description |
| :--- | :---------- |
| [HttpFile](http-HttpFile.md) | This class is used mostly for uploaded files |
| [HttpMessage](http-HttpMessage.md) | This is an implementation of the `im\http\msg\Message` interface |
| [HttpMessageBuilder](http-HttpMessageBuilder.md) | This is an implementation of the `im\http\msg\MessageBuilder` interface |
| [HttpRequest](http-HttpRequest.md) | An implementation of `im\http\msg\Request`  This abstraction is used to provide read-only access to a request builder in order to comply with the `Request` interface |
| [HttpRequestBuilder](http-HttpRequestBuilder.md) | An implementation of `im\http\msg\RequestBuilder` |
| [ServerRequestBuilder](http-ServerRequestBuilder.md) | An implementation of `im\http\msg\RequestBuilder`  This builder will be initiated an populated with data from PHP's superglobals |
| [HttpResponse](http-HttpResponse.md) | An implementation of `im\http\msg\Response`  This abstraction is used to provide read-only access to a response builder in order to comply with the `Response` interface |
| [HttpResponseBuilder](http-HttpResponseBuilder.md) | An implementation of `im\http\msg\ResponseBuilder` |
| [HttpUri](http-HttpUri.md) | An implementation of `im\http\msg\Uri`  This abstraction is used to provide read-only access to a uri builder in order to comply with the `Uri` interface |
| [HttpUriBuilder](http-HttpUriBuilder.md) | An implementation of `im\http\msg\UriBuilder` |
