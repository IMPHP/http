# [HTTP Base](http-base.md) / [HTTP Message v2](http2.md) / Response
 > im\http2\msg\Response
____

## Description
Defines a Response object for the http message specification

## Synopsis
```php
interface Response implements im\http2\msg\Message, Traversable, Stringable, IteratorAggregate, im\features\Cloneable, im\features\Stringable {

    // Constants
    int STATUS_CONTINUE = 100
    int STATUS_SWITCHING_PROTOCOLS = 101
    int STATUS_PROCESSING = 102
    int STATUS_OK = 200
    int STATUS_CREATED = 201
    int STATUS_ACCEPTED = 202
    int STATUS_NON_AUTHORITATIVE_INFORMATION = 203
    int STATUS_NO_CONTENT = 204
    int STATUS_RESET_CONTENT = 205
    int STATUS_PARTIAL_CONTENT = 206
    int STATUS_MULTI_STATUS = 207
    int STATUS_ALREADY_REPORTED = 208
    int STATUS_IM_USED = 226
    int STATUS_MULTIPLE_CHOICES = 300
    int STATUS_MOVED_PERMANENTLY = 301
    int STATUS_FOUND = 302
    int STATUS_SEE_OTHER = 303
    int STATUS_NOT_MODIFIED = 304
    int STATUS_USE_PROXY = 305
    int STATUS_RESERVED = 306
    int STATUS_TEMPORARY_REDIRECT = 307
    int STATUS_PERMANENT_REDIRECT = 308
    int STATUS_BAD_REQUEST = 400
    int STATUS_UNAUTHORIZED = 401
    int STATUS_PAYMENT_REQUIRED = 402
    int STATUS_FORBIDDEN = 403
    int STATUS_NOT_FOUND = 404
    int STATUS_METHOD_NOT_ALLOWED = 405
    int STATUS_NOT_ACCEPTABLE = 406
    int STATUS_PROXY_AUTHENTICATION_REQUIRED = 407
    int STATUS_REQUEST_TIMEOUT = 408
    int STATUS_CONFLICT = 409
    int STATUS_GONE = 410
    int STATUS_LENGTH_REQUIRED = 411
    int STATUS_PRECONDITION_FAILED = 412
    int STATUS_PAYLOAD_TOO_LARGE = 413
    int STATUS_URI_TOO_LONG = 414
    int STATUS_UNSUPPORTED_MEDIA_TYPE = 415
    int STATUS_RANGE_NOT_SATISFIABLE = 416
    int STATUS_EXPECTATION_FAILED = 417
    int STATUS_UNPROCESSABLE_ENTITY = 422
    int STATUS_LOCKED = 423
    int STATUS_FAILED_DEPENDENCY = 424
    int STATUS_UPGRADE_REQUIRED = 426
    int STATUS_PRECONDITION_REQUIRED = 428
    int STATUS_TOO_MANY_REQUESTS = 429
    int STATUS_REQUEST_HEADER_FIELDS_TOO_LARGE = 431
    int STATUS_UNAVAILABLE_FOR_LEGAL_REASONS = 451
    int STATUS_INTERNAL_SERVER_ERROR = 500
    int STATUS_NOT_IMPLEMENTED = 501
    int STATUS_BAD_GATEWAY = 502
    int STATUS_SERVICE_UNAVAILABLE = 503
    int STATUS_GATEWAY_TIMEOUT = 504
    int STATUS_VERSION_NOT_SUPPORTED = 505
    int STATUS_VARIANT_ALSO_NEGOTIATES = 506
    int STATUS_INSUFFICIENT_STORAGE = 507
    int STATUS_LOOP_DETECTED = 508
    int STATUS_NOT_EXTENDED = 510
    int STATUS_NETWORK_AUTHENTICATION_REQUIRED = 511
    string REASON_100 = 'Continue'
    string REASON_101 = 'Switching Protocols'
    string REASON_102 = 'Processing'
    string REASON_200 = 'OK'
    string REASON_201 = 'Created'
    string REASON_202 = 'Accepted'
    string REASON_203 = 'Non-authoritative Information'
    string REASON_204 = 'No Content'
    string REASON_205 = 'Reset Content'
    string REASON_206 = 'Partial Content'
    string REASON_207 = 'Multi-Status'
    string REASON_208 = 'Already Reported'
    string REASON_226 = 'IM Used'
    string REASON_300 = 'Multiple Choices'
    string REASON_301 = 'Moved Permanently'
    string REASON_302 = 'Found'
    string REASON_303 = 'See Other'
    string REASON_304 = 'Not Modified'
    string REASON_305 = 'Use Proxy'
    string REASON_306 = 'Reserved'
    string REASON_307 = 'Temporary Redirect'
    string REASON_308 = 'Permanent Redirect'
    string REASON_400 = 'Bad Request'
    string REASON_401 = 'Unauthorized'
    string REASON_402 = 'Payment Required'
    string REASON_403 = 'Forbidden'
    string REASON_404 = 'Not Found'
    string REASON_405 = 'Method Not Allowed'
    string REASON_406 = 'Not Acceptable'
    string REASON_407 = 'Proxy Authentication Required'
    string REASON_408 = 'Request Timeout'
    string REASON_409 = 'Conflict'
    string REASON_410 = 'Gone'
    string REASON_411 = 'Length Required'
    string REASON_412 = 'Precondition Failed'
    string REASON_413 = 'Payload Too Large'
    string REASON_414 = 'Request-URI Too Long'
    string REASON_415 = 'Unsupported Media Type'
    string REASON_416 = 'Range Not Satisfiable'
    string REASON_417 = 'Expectation Failed'
    string REASON_422 = 'Unprocessable Entity'
    string REASON_423 = 'Locked'
    string REASON_424 = 'Failed Dependency'
    string REASON_426 = 'Upgrade Required'
    string REASON_428 = 'Precondition Required'
    string REASON_429 = 'Too Many Requests'
    string REASON_431 = 'Request Header Fields Too Large'
    string REASON_451 = 'Unavailable For Legal Reasons'
    string REASON_500 = 'Internal Server Error'
    string REASON_501 = 'Not Implemented'
    string REASON_502 = 'Bad Gateway'
    string REASON_503 = 'Service Unavailable'
    string REASON_504 = 'Gateway Timeout'
    string REASON_505 = 'HTTP Version Not Supported'
    string REASON_506 = 'Variant Also Negotiates'
    string REASON_507 = 'Insufficient Storage'
    string REASON_508 = 'Loop Detected'
    string REASON_510 = 'Not Extended'
    string REASON_511 = 'Network Authentication Required'

    // Methods
    getStatusCode(): int
    getStatusReason(): string
    setStatus(int $code, null|string $reasonPhrase = NULL): void

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

## Constants
| Name | Description |
| :--- | :---------- |
| [__Response&nbsp;::&nbsp;STATUS\_CONTINUE__](http2-Response-prop_STATUS_CONTINUE.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_SWITCHING\_PROTOCOLS__](http2-Response-prop_STATUS_SWITCHING_PROTOCOLS.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_PROCESSING__](http2-Response-prop_STATUS_PROCESSING.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_OK__](http2-Response-prop_STATUS_OK.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_CREATED__](http2-Response-prop_STATUS_CREATED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_ACCEPTED__](http2-Response-prop_STATUS_ACCEPTED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_NON\_AUTHORITATIVE\_INFORMATION__](http2-Response-prop_STATUS_NON_AUTHORITATIVE_INFORMATION.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_NO\_CONTENT__](http2-Response-prop_STATUS_NO_CONTENT.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_RESET\_CONTENT__](http2-Response-prop_STATUS_RESET_CONTENT.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_PARTIAL\_CONTENT__](http2-Response-prop_STATUS_PARTIAL_CONTENT.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_MULTI\_STATUS__](http2-Response-prop_STATUS_MULTI_STATUS.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_ALREADY\_REPORTED__](http2-Response-prop_STATUS_ALREADY_REPORTED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_IM\_USED__](http2-Response-prop_STATUS_IM_USED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_MULTIPLE\_CHOICES__](http2-Response-prop_STATUS_MULTIPLE_CHOICES.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_MOVED\_PERMANENTLY__](http2-Response-prop_STATUS_MOVED_PERMANENTLY.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_FOUND__](http2-Response-prop_STATUS_FOUND.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_SEE\_OTHER__](http2-Response-prop_STATUS_SEE_OTHER.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_NOT\_MODIFIED__](http2-Response-prop_STATUS_NOT_MODIFIED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_USE\_PROXY__](http2-Response-prop_STATUS_USE_PROXY.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_RESERVED__](http2-Response-prop_STATUS_RESERVED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_TEMPORARY\_REDIRECT__](http2-Response-prop_STATUS_TEMPORARY_REDIRECT.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_PERMANENT\_REDIRECT__](http2-Response-prop_STATUS_PERMANENT_REDIRECT.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_BAD\_REQUEST__](http2-Response-prop_STATUS_BAD_REQUEST.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_UNAUTHORIZED__](http2-Response-prop_STATUS_UNAUTHORIZED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_PAYMENT\_REQUIRED__](http2-Response-prop_STATUS_PAYMENT_REQUIRED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_FORBIDDEN__](http2-Response-prop_STATUS_FORBIDDEN.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_NOT\_FOUND__](http2-Response-prop_STATUS_NOT_FOUND.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_METHOD\_NOT\_ALLOWED__](http2-Response-prop_STATUS_METHOD_NOT_ALLOWED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_NOT\_ACCEPTABLE__](http2-Response-prop_STATUS_NOT_ACCEPTABLE.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_PROXY\_AUTHENTICATION\_REQUIRED__](http2-Response-prop_STATUS_PROXY_AUTHENTICATION_REQUIRED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_REQUEST\_TIMEOUT__](http2-Response-prop_STATUS_REQUEST_TIMEOUT.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_CONFLICT__](http2-Response-prop_STATUS_CONFLICT.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_GONE__](http2-Response-prop_STATUS_GONE.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_LENGTH\_REQUIRED__](http2-Response-prop_STATUS_LENGTH_REQUIRED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_PRECONDITION\_FAILED__](http2-Response-prop_STATUS_PRECONDITION_FAILED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_PAYLOAD\_TOO\_LARGE__](http2-Response-prop_STATUS_PAYLOAD_TOO_LARGE.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_URI\_TOO\_LONG__](http2-Response-prop_STATUS_URI_TOO_LONG.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_UNSUPPORTED\_MEDIA\_TYPE__](http2-Response-prop_STATUS_UNSUPPORTED_MEDIA_TYPE.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_RANGE\_NOT\_SATISFIABLE__](http2-Response-prop_STATUS_RANGE_NOT_SATISFIABLE.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_EXPECTATION\_FAILED__](http2-Response-prop_STATUS_EXPECTATION_FAILED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_UNPROCESSABLE\_ENTITY__](http2-Response-prop_STATUS_UNPROCESSABLE_ENTITY.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_LOCKED__](http2-Response-prop_STATUS_LOCKED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_FAILED\_DEPENDENCY__](http2-Response-prop_STATUS_FAILED_DEPENDENCY.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_UPGRADE\_REQUIRED__](http2-Response-prop_STATUS_UPGRADE_REQUIRED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_PRECONDITION\_REQUIRED__](http2-Response-prop_STATUS_PRECONDITION_REQUIRED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_TOO\_MANY\_REQUESTS__](http2-Response-prop_STATUS_TOO_MANY_REQUESTS.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_REQUEST\_HEADER\_FIELDS\_TOO\_LARGE__](http2-Response-prop_STATUS_REQUEST_HEADER_FIELDS_TOO_LARGE.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_UNAVAILABLE\_FOR\_LEGAL\_REASONS__](http2-Response-prop_STATUS_UNAVAILABLE_FOR_LEGAL_REASONS.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_INTERNAL\_SERVER\_ERROR__](http2-Response-prop_STATUS_INTERNAL_SERVER_ERROR.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_NOT\_IMPLEMENTED__](http2-Response-prop_STATUS_NOT_IMPLEMENTED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_BAD\_GATEWAY__](http2-Response-prop_STATUS_BAD_GATEWAY.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_SERVICE\_UNAVAILABLE__](http2-Response-prop_STATUS_SERVICE_UNAVAILABLE.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_GATEWAY\_TIMEOUT__](http2-Response-prop_STATUS_GATEWAY_TIMEOUT.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_VERSION\_NOT\_SUPPORTED__](http2-Response-prop_STATUS_VERSION_NOT_SUPPORTED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_VARIANT\_ALSO\_NEGOTIATES__](http2-Response-prop_STATUS_VARIANT_ALSO_NEGOTIATES.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_INSUFFICIENT\_STORAGE__](http2-Response-prop_STATUS_INSUFFICIENT_STORAGE.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_LOOP\_DETECTED__](http2-Response-prop_STATUS_LOOP_DETECTED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_NOT\_EXTENDED__](http2-Response-prop_STATUS_NOT_EXTENDED.md) |  |
| [__Response&nbsp;::&nbsp;STATUS\_NETWORK\_AUTHENTICATION\_REQUIRED__](http2-Response-prop_STATUS_NETWORK_AUTHENTICATION_REQUIRED.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_100__](http2-Response-prop_REASON_100.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_101__](http2-Response-prop_REASON_101.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_102__](http2-Response-prop_REASON_102.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_200__](http2-Response-prop_REASON_200.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_201__](http2-Response-prop_REASON_201.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_202__](http2-Response-prop_REASON_202.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_203__](http2-Response-prop_REASON_203.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_204__](http2-Response-prop_REASON_204.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_205__](http2-Response-prop_REASON_205.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_206__](http2-Response-prop_REASON_206.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_207__](http2-Response-prop_REASON_207.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_208__](http2-Response-prop_REASON_208.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_226__](http2-Response-prop_REASON_226.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_300__](http2-Response-prop_REASON_300.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_301__](http2-Response-prop_REASON_301.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_302__](http2-Response-prop_REASON_302.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_303__](http2-Response-prop_REASON_303.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_304__](http2-Response-prop_REASON_304.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_305__](http2-Response-prop_REASON_305.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_306__](http2-Response-prop_REASON_306.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_307__](http2-Response-prop_REASON_307.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_308__](http2-Response-prop_REASON_308.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_400__](http2-Response-prop_REASON_400.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_401__](http2-Response-prop_REASON_401.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_402__](http2-Response-prop_REASON_402.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_403__](http2-Response-prop_REASON_403.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_404__](http2-Response-prop_REASON_404.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_405__](http2-Response-prop_REASON_405.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_406__](http2-Response-prop_REASON_406.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_407__](http2-Response-prop_REASON_407.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_408__](http2-Response-prop_REASON_408.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_409__](http2-Response-prop_REASON_409.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_410__](http2-Response-prop_REASON_410.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_411__](http2-Response-prop_REASON_411.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_412__](http2-Response-prop_REASON_412.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_413__](http2-Response-prop_REASON_413.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_414__](http2-Response-prop_REASON_414.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_415__](http2-Response-prop_REASON_415.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_416__](http2-Response-prop_REASON_416.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_417__](http2-Response-prop_REASON_417.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_422__](http2-Response-prop_REASON_422.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_423__](http2-Response-prop_REASON_423.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_424__](http2-Response-prop_REASON_424.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_426__](http2-Response-prop_REASON_426.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_428__](http2-Response-prop_REASON_428.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_429__](http2-Response-prop_REASON_429.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_431__](http2-Response-prop_REASON_431.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_451__](http2-Response-prop_REASON_451.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_500__](http2-Response-prop_REASON_500.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_501__](http2-Response-prop_REASON_501.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_502__](http2-Response-prop_REASON_502.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_503__](http2-Response-prop_REASON_503.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_504__](http2-Response-prop_REASON_504.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_505__](http2-Response-prop_REASON_505.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_506__](http2-Response-prop_REASON_506.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_507__](http2-Response-prop_REASON_507.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_508__](http2-Response-prop_REASON_508.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_510__](http2-Response-prop_REASON_510.md) |  |
| [__Response&nbsp;::&nbsp;REASON\_511__](http2-Response-prop_REASON_511.md) |  |

## Methods
| Name | Description |
| :--- | :---------- |
| [__Response&nbsp;::&nbsp;getStatusCode__](http2-Response-getStatusCode.md) | Return the current status code |
| [__Response&nbsp;::&nbsp;getStatusReason__](http2-Response-getStatusReason.md) | Return the current status reason phrase |
| [__Response&nbsp;::&nbsp;setStatus__](http2-Response-setStatus.md) | Set a new status code and optional reason phrase |
| [__Response&nbsp;::&nbsp;getAttribute__](http2-Response-getAttribute.md) | Retrieve a single attribute |
| [__Response&nbsp;::&nbsp;hasAttribute__](http2-Response-hasAttribute.md) | Check to see if an attribute exists |
| [__Response&nbsp;::&nbsp;setAttribute__](http2-Response-setAttribute.md) | Add/Change an attribute value |
| [__Response&nbsp;::&nbsp;removeAttribute__](http2-Response-removeAttribute.md) | Remove an attribute value |
| [__Response&nbsp;::&nbsp;hasHeader__](http2-Response-hasHeader.md) | Check to see if there is a header with this name |
| [__Response&nbsp;::&nbsp;inHeader__](http2-Response-inHeader.md) | Perform a Case-insensitive value search on a header  Each header can have multiple values in the form of an indexed array or similar |
| [__Response&nbsp;::&nbsp;getHeader__](http2-Response-getHeader.md) | Returns the value indexed array for a specific header |
| [__Response&nbsp;::&nbsp;getHeaderLine__](http2-Response-getHeaderLine.md) | Returns the entire header line |
| [__Response&nbsp;::&nbsp;addHeader__](http2-Response-addHeader.md) | Add content to a header or create it  This method will append data to an existing one, or create it if it does not already exist |
| [__Response&nbsp;::&nbsp;setHeader__](http2-Response-setHeader.md) | Set/change a header |
| [__Response&nbsp;::&nbsp;removeHeader__](http2-Response-removeHeader.md) | Remove specified header |
| [__Response&nbsp;::&nbsp;getProtocolVersion__](http2-Response-getProtocolVersion.md) | Get the protocol version like `1 |
| [__Response&nbsp;::&nbsp;setProtocolVersion__](http2-Response-setProtocolVersion.md) | Set a different protocol version like `1 |
| [__Response&nbsp;::&nbsp;getStream__](http2-Response-getStream.md) | Get the current body stream |
| [__Response&nbsp;::&nbsp;setStream__](http2-Response-setStream.md) | Set a new body stream |
| [__Response&nbsp;::&nbsp;print__](http2-Response-print.md) | Print message to stdout  This is similar to `toString()` except that it will directly output this to the client |
| [__Response&nbsp;::&nbsp;toString__](http2-Response-toString.md) | Return a string representation of the object |
| [__Response&nbsp;::&nbsp;\_\_toString__](http2-Response-__toString.md) |  |
| [__Response&nbsp;::&nbsp;clone__](http2-Response-clone.md) | A proper OOP cloning method  Classes implementing this interface should also be able to deal with `clone $object` |
| [__Response&nbsp;::&nbsp;getIterator__](http2-Response-getIterator.md) |  |

## Example 1
Download a file from the server

```php
$response = ...;
$response->setHeader("Content-Type", "application/octet-stream; charset=" . mime_content_type($file));
$response->setHeader("Content-Disposition", "attachment; filename={$filename}");
$response->setHeader("Content-Length", $filesize);
$response->setStream(new FileStream($file));

// Send content to the client
$response->print();
```
