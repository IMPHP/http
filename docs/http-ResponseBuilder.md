# [HTTP Message](http.md) / ResponseBuilder
 > im\http\msg\ResponseBuilder
____

## Description
Defines a Request builder for the http message specification

## Synopsis
```php
interface ResponseBuilder implements im\http\msg\Response, im\http\msg\MessageBuilder, IteratorAggregate, Traversable, im\http\msg\Message {

    // Inherited Constants
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
    setStatus(int $code, null|string $reasonPhrase = NULL): void

    // Inherited Methods
    getStatusCode(): int
    getStatusReason(): string
    hasHeader(string $name): bool
    inHeader(string $name, string $search): bool
    getHeader(string $name): im\util\ListArray
    getHeaderLine(string $name): null|string
    getProtocolVersion(): string
    getBuilder(): im\http\msg\MessageBuilder
    getBody(): im\io\Stream
    toString(): string
    getIterator()
    addHeader(string $name, string ...$values): void
    setHeader(string $name, string ...$values): void
    removeHeader(string $name): void
    setProtocolVersion(string $version): void
    getFinal(): im\http\msg\Message
    setBody(Stream $body): void
}
```

## Constants
| Name | Description |
| :--- | :---------- |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_CONTINUE__](http-ResponseBuilder-prop_STATUS_CONTINUE.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_SWITCHING\_PROTOCOLS__](http-ResponseBuilder-prop_STATUS_SWITCHING_PROTOCOLS.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_PROCESSING__](http-ResponseBuilder-prop_STATUS_PROCESSING.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_OK__](http-ResponseBuilder-prop_STATUS_OK.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_CREATED__](http-ResponseBuilder-prop_STATUS_CREATED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_ACCEPTED__](http-ResponseBuilder-prop_STATUS_ACCEPTED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_NON\_AUTHORITATIVE\_INFORMATION__](http-ResponseBuilder-prop_STATUS_NON_AUTHORITATIVE_INFORMATION.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_NO\_CONTENT__](http-ResponseBuilder-prop_STATUS_NO_CONTENT.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_RESET\_CONTENT__](http-ResponseBuilder-prop_STATUS_RESET_CONTENT.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_PARTIAL\_CONTENT__](http-ResponseBuilder-prop_STATUS_PARTIAL_CONTENT.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_MULTI\_STATUS__](http-ResponseBuilder-prop_STATUS_MULTI_STATUS.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_ALREADY\_REPORTED__](http-ResponseBuilder-prop_STATUS_ALREADY_REPORTED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_IM\_USED__](http-ResponseBuilder-prop_STATUS_IM_USED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_MULTIPLE\_CHOICES__](http-ResponseBuilder-prop_STATUS_MULTIPLE_CHOICES.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_MOVED\_PERMANENTLY__](http-ResponseBuilder-prop_STATUS_MOVED_PERMANENTLY.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_FOUND__](http-ResponseBuilder-prop_STATUS_FOUND.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_SEE\_OTHER__](http-ResponseBuilder-prop_STATUS_SEE_OTHER.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_NOT\_MODIFIED__](http-ResponseBuilder-prop_STATUS_NOT_MODIFIED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_USE\_PROXY__](http-ResponseBuilder-prop_STATUS_USE_PROXY.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_RESERVED__](http-ResponseBuilder-prop_STATUS_RESERVED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_TEMPORARY\_REDIRECT__](http-ResponseBuilder-prop_STATUS_TEMPORARY_REDIRECT.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_PERMANENT\_REDIRECT__](http-ResponseBuilder-prop_STATUS_PERMANENT_REDIRECT.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_BAD\_REQUEST__](http-ResponseBuilder-prop_STATUS_BAD_REQUEST.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_UNAUTHORIZED__](http-ResponseBuilder-prop_STATUS_UNAUTHORIZED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_PAYMENT\_REQUIRED__](http-ResponseBuilder-prop_STATUS_PAYMENT_REQUIRED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_FORBIDDEN__](http-ResponseBuilder-prop_STATUS_FORBIDDEN.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_NOT\_FOUND__](http-ResponseBuilder-prop_STATUS_NOT_FOUND.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_METHOD\_NOT\_ALLOWED__](http-ResponseBuilder-prop_STATUS_METHOD_NOT_ALLOWED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_NOT\_ACCEPTABLE__](http-ResponseBuilder-prop_STATUS_NOT_ACCEPTABLE.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_PROXY\_AUTHENTICATION\_REQUIRED__](http-ResponseBuilder-prop_STATUS_PROXY_AUTHENTICATION_REQUIRED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_REQUEST\_TIMEOUT__](http-ResponseBuilder-prop_STATUS_REQUEST_TIMEOUT.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_CONFLICT__](http-ResponseBuilder-prop_STATUS_CONFLICT.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_GONE__](http-ResponseBuilder-prop_STATUS_GONE.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_LENGTH\_REQUIRED__](http-ResponseBuilder-prop_STATUS_LENGTH_REQUIRED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_PRECONDITION\_FAILED__](http-ResponseBuilder-prop_STATUS_PRECONDITION_FAILED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_PAYLOAD\_TOO\_LARGE__](http-ResponseBuilder-prop_STATUS_PAYLOAD_TOO_LARGE.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_URI\_TOO\_LONG__](http-ResponseBuilder-prop_STATUS_URI_TOO_LONG.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_UNSUPPORTED\_MEDIA\_TYPE__](http-ResponseBuilder-prop_STATUS_UNSUPPORTED_MEDIA_TYPE.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_RANGE\_NOT\_SATISFIABLE__](http-ResponseBuilder-prop_STATUS_RANGE_NOT_SATISFIABLE.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_EXPECTATION\_FAILED__](http-ResponseBuilder-prop_STATUS_EXPECTATION_FAILED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_UNPROCESSABLE\_ENTITY__](http-ResponseBuilder-prop_STATUS_UNPROCESSABLE_ENTITY.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_LOCKED__](http-ResponseBuilder-prop_STATUS_LOCKED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_FAILED\_DEPENDENCY__](http-ResponseBuilder-prop_STATUS_FAILED_DEPENDENCY.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_UPGRADE\_REQUIRED__](http-ResponseBuilder-prop_STATUS_UPGRADE_REQUIRED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_PRECONDITION\_REQUIRED__](http-ResponseBuilder-prop_STATUS_PRECONDITION_REQUIRED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_TOO\_MANY\_REQUESTS__](http-ResponseBuilder-prop_STATUS_TOO_MANY_REQUESTS.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_REQUEST\_HEADER\_FIELDS\_TOO\_LARGE__](http-ResponseBuilder-prop_STATUS_REQUEST_HEADER_FIELDS_TOO_LARGE.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_UNAVAILABLE\_FOR\_LEGAL\_REASONS__](http-ResponseBuilder-prop_STATUS_UNAVAILABLE_FOR_LEGAL_REASONS.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_INTERNAL\_SERVER\_ERROR__](http-ResponseBuilder-prop_STATUS_INTERNAL_SERVER_ERROR.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_NOT\_IMPLEMENTED__](http-ResponseBuilder-prop_STATUS_NOT_IMPLEMENTED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_BAD\_GATEWAY__](http-ResponseBuilder-prop_STATUS_BAD_GATEWAY.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_SERVICE\_UNAVAILABLE__](http-ResponseBuilder-prop_STATUS_SERVICE_UNAVAILABLE.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_GATEWAY\_TIMEOUT__](http-ResponseBuilder-prop_STATUS_GATEWAY_TIMEOUT.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_VERSION\_NOT\_SUPPORTED__](http-ResponseBuilder-prop_STATUS_VERSION_NOT_SUPPORTED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_VARIANT\_ALSO\_NEGOTIATES__](http-ResponseBuilder-prop_STATUS_VARIANT_ALSO_NEGOTIATES.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_INSUFFICIENT\_STORAGE__](http-ResponseBuilder-prop_STATUS_INSUFFICIENT_STORAGE.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_LOOP\_DETECTED__](http-ResponseBuilder-prop_STATUS_LOOP_DETECTED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_NOT\_EXTENDED__](http-ResponseBuilder-prop_STATUS_NOT_EXTENDED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;STATUS\_NETWORK\_AUTHENTICATION\_REQUIRED__](http-ResponseBuilder-prop_STATUS_NETWORK_AUTHENTICATION_REQUIRED.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_100__](http-ResponseBuilder-prop_REASON_100.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_101__](http-ResponseBuilder-prop_REASON_101.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_102__](http-ResponseBuilder-prop_REASON_102.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_200__](http-ResponseBuilder-prop_REASON_200.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_201__](http-ResponseBuilder-prop_REASON_201.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_202__](http-ResponseBuilder-prop_REASON_202.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_203__](http-ResponseBuilder-prop_REASON_203.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_204__](http-ResponseBuilder-prop_REASON_204.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_205__](http-ResponseBuilder-prop_REASON_205.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_206__](http-ResponseBuilder-prop_REASON_206.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_207__](http-ResponseBuilder-prop_REASON_207.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_208__](http-ResponseBuilder-prop_REASON_208.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_226__](http-ResponseBuilder-prop_REASON_226.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_300__](http-ResponseBuilder-prop_REASON_300.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_301__](http-ResponseBuilder-prop_REASON_301.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_302__](http-ResponseBuilder-prop_REASON_302.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_303__](http-ResponseBuilder-prop_REASON_303.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_304__](http-ResponseBuilder-prop_REASON_304.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_305__](http-ResponseBuilder-prop_REASON_305.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_306__](http-ResponseBuilder-prop_REASON_306.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_307__](http-ResponseBuilder-prop_REASON_307.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_308__](http-ResponseBuilder-prop_REASON_308.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_400__](http-ResponseBuilder-prop_REASON_400.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_401__](http-ResponseBuilder-prop_REASON_401.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_402__](http-ResponseBuilder-prop_REASON_402.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_403__](http-ResponseBuilder-prop_REASON_403.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_404__](http-ResponseBuilder-prop_REASON_404.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_405__](http-ResponseBuilder-prop_REASON_405.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_406__](http-ResponseBuilder-prop_REASON_406.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_407__](http-ResponseBuilder-prop_REASON_407.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_408__](http-ResponseBuilder-prop_REASON_408.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_409__](http-ResponseBuilder-prop_REASON_409.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_410__](http-ResponseBuilder-prop_REASON_410.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_411__](http-ResponseBuilder-prop_REASON_411.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_412__](http-ResponseBuilder-prop_REASON_412.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_413__](http-ResponseBuilder-prop_REASON_413.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_414__](http-ResponseBuilder-prop_REASON_414.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_415__](http-ResponseBuilder-prop_REASON_415.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_416__](http-ResponseBuilder-prop_REASON_416.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_417__](http-ResponseBuilder-prop_REASON_417.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_422__](http-ResponseBuilder-prop_REASON_422.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_423__](http-ResponseBuilder-prop_REASON_423.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_424__](http-ResponseBuilder-prop_REASON_424.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_426__](http-ResponseBuilder-prop_REASON_426.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_428__](http-ResponseBuilder-prop_REASON_428.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_429__](http-ResponseBuilder-prop_REASON_429.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_431__](http-ResponseBuilder-prop_REASON_431.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_451__](http-ResponseBuilder-prop_REASON_451.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_500__](http-ResponseBuilder-prop_REASON_500.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_501__](http-ResponseBuilder-prop_REASON_501.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_502__](http-ResponseBuilder-prop_REASON_502.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_503__](http-ResponseBuilder-prop_REASON_503.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_504__](http-ResponseBuilder-prop_REASON_504.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_505__](http-ResponseBuilder-prop_REASON_505.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_506__](http-ResponseBuilder-prop_REASON_506.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_507__](http-ResponseBuilder-prop_REASON_507.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_508__](http-ResponseBuilder-prop_REASON_508.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_510__](http-ResponseBuilder-prop_REASON_510.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;REASON\_511__](http-ResponseBuilder-prop_REASON_511.md) |  |

## Methods
| Name | Description |
| :--- | :---------- |
| [__ResponseBuilder&nbsp;::&nbsp;setStatus__](http-ResponseBuilder-setStatus.md) | Set a new status code and optional reason phrase |
| [__ResponseBuilder&nbsp;::&nbsp;getStatusCode__](http-ResponseBuilder-getStatusCode.md) | Return the current status code |
| [__ResponseBuilder&nbsp;::&nbsp;getStatusReason__](http-ResponseBuilder-getStatusReason.md) | Return the current status reason phrase |
| [__ResponseBuilder&nbsp;::&nbsp;hasHeader__](http-ResponseBuilder-hasHeader.md) | Check to see if there is a header with this name |
| [__ResponseBuilder&nbsp;::&nbsp;inHeader__](http-ResponseBuilder-inHeader.md) | Perform a Case-insensitive value search on a header  Each header can have multiple values in the form of an indexed array or similar |
| [__ResponseBuilder&nbsp;::&nbsp;getHeader__](http-ResponseBuilder-getHeader.md) | Returns the value indexed array for a specific header |
| [__ResponseBuilder&nbsp;::&nbsp;getHeaderLine__](http-ResponseBuilder-getHeaderLine.md) | Returns the entire header line |
| [__ResponseBuilder&nbsp;::&nbsp;getProtocolVersion__](http-ResponseBuilder-getProtocolVersion.md) | Get the protocol version like `1 |
| [__ResponseBuilder&nbsp;::&nbsp;getBuilder__](http-ResponseBuilder-getBuilder.md) | Get a message builder for the current message |
| [__ResponseBuilder&nbsp;::&nbsp;getBody__](http-ResponseBuilder-getBody.md) | Get the current body stream |
| [__ResponseBuilder&nbsp;::&nbsp;toString__](http-ResponseBuilder-toString.md) | Get a string of the request  This is a text representation of the message |
| [__ResponseBuilder&nbsp;::&nbsp;getIterator__](http-ResponseBuilder-getIterator.md) |  |
| [__ResponseBuilder&nbsp;::&nbsp;addHeader__](http-ResponseBuilder-addHeader.md) | Add content to a header or create it  This method will append data to an existing one, or create it if it does not already exist |
| [__ResponseBuilder&nbsp;::&nbsp;setHeader__](http-ResponseBuilder-setHeader.md) | Set/change a header |
| [__ResponseBuilder&nbsp;::&nbsp;removeHeader__](http-ResponseBuilder-removeHeader.md) | Remove specified header |
| [__ResponseBuilder&nbsp;::&nbsp;setProtocolVersion__](http-ResponseBuilder-setProtocolVersion.md) | Set a different protocol version like `1 |
| [__ResponseBuilder&nbsp;::&nbsp;getFinal__](http-ResponseBuilder-getFinal.md) | Get a read-only message object |
| [__ResponseBuilder&nbsp;::&nbsp;setBody__](http-ResponseBuilder-setBody.md) | Set a new body stream |
