# [HTTP Message](http.md) / HttpResponseBuilder
 > im\http\msg\HttpResponseBuilder
____

## Description
An implementation of `im\http\msg\ResponseBuilder`

## Synopsis
```php
class HttpResponseBuilder extends im\http\msg\HttpMessageBuilder implements im\http\msg\MessageBuilder, Stringable, IteratorAggregate, Traversable, im\http\msg\Message, im\http\msg\ResponseBuilder, im\http\msg\Response {

    // Inherited Constants
    public int STATUS_CONTINUE = 100
    public int STATUS_SWITCHING_PROTOCOLS = 101
    public int STATUS_PROCESSING = 102
    public int STATUS_OK = 200
    public int STATUS_CREATED = 201
    public int STATUS_ACCEPTED = 202
    public int STATUS_NON_AUTHORITATIVE_INFORMATION = 203
    public int STATUS_NO_CONTENT = 204
    public int STATUS_RESET_CONTENT = 205
    public int STATUS_PARTIAL_CONTENT = 206
    public int STATUS_MULTI_STATUS = 207
    public int STATUS_ALREADY_REPORTED = 208
    public int STATUS_IM_USED = 226
    public int STATUS_MULTIPLE_CHOICES = 300
    public int STATUS_MOVED_PERMANENTLY = 301
    public int STATUS_FOUND = 302
    public int STATUS_SEE_OTHER = 303
    public int STATUS_NOT_MODIFIED = 304
    public int STATUS_USE_PROXY = 305
    public int STATUS_RESERVED = 306
    public int STATUS_TEMPORARY_REDIRECT = 307
    public int STATUS_PERMANENT_REDIRECT = 308
    public int STATUS_BAD_REQUEST = 400
    public int STATUS_UNAUTHORIZED = 401
    public int STATUS_PAYMENT_REQUIRED = 402
    public int STATUS_FORBIDDEN = 403
    public int STATUS_NOT_FOUND = 404
    public int STATUS_METHOD_NOT_ALLOWED = 405
    public int STATUS_NOT_ACCEPTABLE = 406
    public int STATUS_PROXY_AUTHENTICATION_REQUIRED = 407
    public int STATUS_REQUEST_TIMEOUT = 408
    public int STATUS_CONFLICT = 409
    public int STATUS_GONE = 410
    public int STATUS_LENGTH_REQUIRED = 411
    public int STATUS_PRECONDITION_FAILED = 412
    public int STATUS_PAYLOAD_TOO_LARGE = 413
    public int STATUS_URI_TOO_LONG = 414
    public int STATUS_UNSUPPORTED_MEDIA_TYPE = 415
    public int STATUS_RANGE_NOT_SATISFIABLE = 416
    public int STATUS_EXPECTATION_FAILED = 417
    public int STATUS_UNPROCESSABLE_ENTITY = 422
    public int STATUS_LOCKED = 423
    public int STATUS_FAILED_DEPENDENCY = 424
    public int STATUS_UPGRADE_REQUIRED = 426
    public int STATUS_PRECONDITION_REQUIRED = 428
    public int STATUS_TOO_MANY_REQUESTS = 429
    public int STATUS_REQUEST_HEADER_FIELDS_TOO_LARGE = 431
    public int STATUS_UNAVAILABLE_FOR_LEGAL_REASONS = 451
    public int STATUS_INTERNAL_SERVER_ERROR = 500
    public int STATUS_NOT_IMPLEMENTED = 501
    public int STATUS_BAD_GATEWAY = 502
    public int STATUS_SERVICE_UNAVAILABLE = 503
    public int STATUS_GATEWAY_TIMEOUT = 504
    public int STATUS_VERSION_NOT_SUPPORTED = 505
    public int STATUS_VARIANT_ALSO_NEGOTIATES = 506
    public int STATUS_INSUFFICIENT_STORAGE = 507
    public int STATUS_LOOP_DETECTED = 508
    public int STATUS_NOT_EXTENDED = 510
    public int STATUS_NETWORK_AUTHENTICATION_REQUIRED = 511
    public string REASON_100 = 'Continue'
    public string REASON_101 = 'Switching Protocols'
    public string REASON_102 = 'Processing'
    public string REASON_200 = 'OK'
    public string REASON_201 = 'Created'
    public string REASON_202 = 'Accepted'
    public string REASON_203 = 'Non-authoritative Information'
    public string REASON_204 = 'No Content'
    public string REASON_205 = 'Reset Content'
    public string REASON_206 = 'Partial Content'
    public string REASON_207 = 'Multi-Status'
    public string REASON_208 = 'Already Reported'
    public string REASON_226 = 'IM Used'
    public string REASON_300 = 'Multiple Choices'
    public string REASON_301 = 'Moved Permanently'
    public string REASON_302 = 'Found'
    public string REASON_303 = 'See Other'
    public string REASON_304 = 'Not Modified'
    public string REASON_305 = 'Use Proxy'
    public string REASON_306 = 'Reserved'
    public string REASON_307 = 'Temporary Redirect'
    public string REASON_308 = 'Permanent Redirect'
    public string REASON_400 = 'Bad Request'
    public string REASON_401 = 'Unauthorized'
    public string REASON_402 = 'Payment Required'
    public string REASON_403 = 'Forbidden'
    public string REASON_404 = 'Not Found'
    public string REASON_405 = 'Method Not Allowed'
    public string REASON_406 = 'Not Acceptable'
    public string REASON_407 = 'Proxy Authentication Required'
    public string REASON_408 = 'Request Timeout'
    public string REASON_409 = 'Conflict'
    public string REASON_410 = 'Gone'
    public string REASON_411 = 'Length Required'
    public string REASON_412 = 'Precondition Failed'
    public string REASON_413 = 'Payload Too Large'
    public string REASON_414 = 'Request-URI Too Long'
    public string REASON_415 = 'Unsupported Media Type'
    public string REASON_416 = 'Range Not Satisfiable'
    public string REASON_417 = 'Expectation Failed'
    public string REASON_422 = 'Unprocessable Entity'
    public string REASON_423 = 'Locked'
    public string REASON_424 = 'Failed Dependency'
    public string REASON_426 = 'Upgrade Required'
    public string REASON_428 = 'Precondition Required'
    public string REASON_429 = 'Too Many Requests'
    public string REASON_431 = 'Request Header Fields Too Large'
    public string REASON_451 = 'Unavailable For Legal Reasons'
    public string REASON_500 = 'Internal Server Error'
    public string REASON_501 = 'Not Implemented'
    public string REASON_502 = 'Bad Gateway'
    public string REASON_503 = 'Service Unavailable'
    public string REASON_504 = 'Gateway Timeout'
    public string REASON_505 = 'HTTP Version Not Supported'
    public string REASON_506 = 'Variant Also Negotiates'
    public string REASON_507 = 'Insufficient Storage'
    public string REASON_508 = 'Loop Detected'
    public string REASON_510 = 'Not Extended'
    public string REASON_511 = 'Network Authentication Required'

    // Methods
    public __construct(int $code = im\http\msg\Response::STATUS_OK)
    public getStatusCode(): int
    public getStatusReason(): string
    public setStatus(int $code, null|string $reasonPhrase = NULL): void
    public setBody(Stream $body): void
    public getBuilder(): im\http\msg\ResponseBuilder
    public getFinal(): im\http\msg\Response
    public toString(): string

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
    public getBody(): im\io\Stream
}
```

## Constants
| Name | Description |
| :--- | :---------- |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_CONTINUE__](http-HttpResponseBuilder-prop_STATUS_CONTINUE.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_SWITCHING\_PROTOCOLS__](http-HttpResponseBuilder-prop_STATUS_SWITCHING_PROTOCOLS.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_PROCESSING__](http-HttpResponseBuilder-prop_STATUS_PROCESSING.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_OK__](http-HttpResponseBuilder-prop_STATUS_OK.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_CREATED__](http-HttpResponseBuilder-prop_STATUS_CREATED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_ACCEPTED__](http-HttpResponseBuilder-prop_STATUS_ACCEPTED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_NON\_AUTHORITATIVE\_INFORMATION__](http-HttpResponseBuilder-prop_STATUS_NON_AUTHORITATIVE_INFORMATION.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_NO\_CONTENT__](http-HttpResponseBuilder-prop_STATUS_NO_CONTENT.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_RESET\_CONTENT__](http-HttpResponseBuilder-prop_STATUS_RESET_CONTENT.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_PARTIAL\_CONTENT__](http-HttpResponseBuilder-prop_STATUS_PARTIAL_CONTENT.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_MULTI\_STATUS__](http-HttpResponseBuilder-prop_STATUS_MULTI_STATUS.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_ALREADY\_REPORTED__](http-HttpResponseBuilder-prop_STATUS_ALREADY_REPORTED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_IM\_USED__](http-HttpResponseBuilder-prop_STATUS_IM_USED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_MULTIPLE\_CHOICES__](http-HttpResponseBuilder-prop_STATUS_MULTIPLE_CHOICES.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_MOVED\_PERMANENTLY__](http-HttpResponseBuilder-prop_STATUS_MOVED_PERMANENTLY.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_FOUND__](http-HttpResponseBuilder-prop_STATUS_FOUND.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_SEE\_OTHER__](http-HttpResponseBuilder-prop_STATUS_SEE_OTHER.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_NOT\_MODIFIED__](http-HttpResponseBuilder-prop_STATUS_NOT_MODIFIED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_USE\_PROXY__](http-HttpResponseBuilder-prop_STATUS_USE_PROXY.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_RESERVED__](http-HttpResponseBuilder-prop_STATUS_RESERVED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_TEMPORARY\_REDIRECT__](http-HttpResponseBuilder-prop_STATUS_TEMPORARY_REDIRECT.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_PERMANENT\_REDIRECT__](http-HttpResponseBuilder-prop_STATUS_PERMANENT_REDIRECT.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_BAD\_REQUEST__](http-HttpResponseBuilder-prop_STATUS_BAD_REQUEST.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_UNAUTHORIZED__](http-HttpResponseBuilder-prop_STATUS_UNAUTHORIZED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_PAYMENT\_REQUIRED__](http-HttpResponseBuilder-prop_STATUS_PAYMENT_REQUIRED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_FORBIDDEN__](http-HttpResponseBuilder-prop_STATUS_FORBIDDEN.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_NOT\_FOUND__](http-HttpResponseBuilder-prop_STATUS_NOT_FOUND.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_METHOD\_NOT\_ALLOWED__](http-HttpResponseBuilder-prop_STATUS_METHOD_NOT_ALLOWED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_NOT\_ACCEPTABLE__](http-HttpResponseBuilder-prop_STATUS_NOT_ACCEPTABLE.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_PROXY\_AUTHENTICATION\_REQUIRED__](http-HttpResponseBuilder-prop_STATUS_PROXY_AUTHENTICATION_REQUIRED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_REQUEST\_TIMEOUT__](http-HttpResponseBuilder-prop_STATUS_REQUEST_TIMEOUT.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_CONFLICT__](http-HttpResponseBuilder-prop_STATUS_CONFLICT.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_GONE__](http-HttpResponseBuilder-prop_STATUS_GONE.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_LENGTH\_REQUIRED__](http-HttpResponseBuilder-prop_STATUS_LENGTH_REQUIRED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_PRECONDITION\_FAILED__](http-HttpResponseBuilder-prop_STATUS_PRECONDITION_FAILED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_PAYLOAD\_TOO\_LARGE__](http-HttpResponseBuilder-prop_STATUS_PAYLOAD_TOO_LARGE.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_URI\_TOO\_LONG__](http-HttpResponseBuilder-prop_STATUS_URI_TOO_LONG.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_UNSUPPORTED\_MEDIA\_TYPE__](http-HttpResponseBuilder-prop_STATUS_UNSUPPORTED_MEDIA_TYPE.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_RANGE\_NOT\_SATISFIABLE__](http-HttpResponseBuilder-prop_STATUS_RANGE_NOT_SATISFIABLE.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_EXPECTATION\_FAILED__](http-HttpResponseBuilder-prop_STATUS_EXPECTATION_FAILED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_UNPROCESSABLE\_ENTITY__](http-HttpResponseBuilder-prop_STATUS_UNPROCESSABLE_ENTITY.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_LOCKED__](http-HttpResponseBuilder-prop_STATUS_LOCKED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_FAILED\_DEPENDENCY__](http-HttpResponseBuilder-prop_STATUS_FAILED_DEPENDENCY.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_UPGRADE\_REQUIRED__](http-HttpResponseBuilder-prop_STATUS_UPGRADE_REQUIRED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_PRECONDITION\_REQUIRED__](http-HttpResponseBuilder-prop_STATUS_PRECONDITION_REQUIRED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_TOO\_MANY\_REQUESTS__](http-HttpResponseBuilder-prop_STATUS_TOO_MANY_REQUESTS.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_REQUEST\_HEADER\_FIELDS\_TOO\_LARGE__](http-HttpResponseBuilder-prop_STATUS_REQUEST_HEADER_FIELDS_TOO_LARGE.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_UNAVAILABLE\_FOR\_LEGAL\_REASONS__](http-HttpResponseBuilder-prop_STATUS_UNAVAILABLE_FOR_LEGAL_REASONS.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_INTERNAL\_SERVER\_ERROR__](http-HttpResponseBuilder-prop_STATUS_INTERNAL_SERVER_ERROR.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_NOT\_IMPLEMENTED__](http-HttpResponseBuilder-prop_STATUS_NOT_IMPLEMENTED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_BAD\_GATEWAY__](http-HttpResponseBuilder-prop_STATUS_BAD_GATEWAY.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_SERVICE\_UNAVAILABLE__](http-HttpResponseBuilder-prop_STATUS_SERVICE_UNAVAILABLE.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_GATEWAY\_TIMEOUT__](http-HttpResponseBuilder-prop_STATUS_GATEWAY_TIMEOUT.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_VERSION\_NOT\_SUPPORTED__](http-HttpResponseBuilder-prop_STATUS_VERSION_NOT_SUPPORTED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_VARIANT\_ALSO\_NEGOTIATES__](http-HttpResponseBuilder-prop_STATUS_VARIANT_ALSO_NEGOTIATES.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_INSUFFICIENT\_STORAGE__](http-HttpResponseBuilder-prop_STATUS_INSUFFICIENT_STORAGE.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_LOOP\_DETECTED__](http-HttpResponseBuilder-prop_STATUS_LOOP_DETECTED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_NOT\_EXTENDED__](http-HttpResponseBuilder-prop_STATUS_NOT_EXTENDED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;STATUS\_NETWORK\_AUTHENTICATION\_REQUIRED__](http-HttpResponseBuilder-prop_STATUS_NETWORK_AUTHENTICATION_REQUIRED.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_100__](http-HttpResponseBuilder-prop_REASON_100.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_101__](http-HttpResponseBuilder-prop_REASON_101.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_102__](http-HttpResponseBuilder-prop_REASON_102.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_200__](http-HttpResponseBuilder-prop_REASON_200.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_201__](http-HttpResponseBuilder-prop_REASON_201.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_202__](http-HttpResponseBuilder-prop_REASON_202.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_203__](http-HttpResponseBuilder-prop_REASON_203.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_204__](http-HttpResponseBuilder-prop_REASON_204.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_205__](http-HttpResponseBuilder-prop_REASON_205.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_206__](http-HttpResponseBuilder-prop_REASON_206.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_207__](http-HttpResponseBuilder-prop_REASON_207.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_208__](http-HttpResponseBuilder-prop_REASON_208.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_226__](http-HttpResponseBuilder-prop_REASON_226.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_300__](http-HttpResponseBuilder-prop_REASON_300.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_301__](http-HttpResponseBuilder-prop_REASON_301.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_302__](http-HttpResponseBuilder-prop_REASON_302.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_303__](http-HttpResponseBuilder-prop_REASON_303.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_304__](http-HttpResponseBuilder-prop_REASON_304.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_305__](http-HttpResponseBuilder-prop_REASON_305.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_306__](http-HttpResponseBuilder-prop_REASON_306.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_307__](http-HttpResponseBuilder-prop_REASON_307.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_308__](http-HttpResponseBuilder-prop_REASON_308.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_400__](http-HttpResponseBuilder-prop_REASON_400.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_401__](http-HttpResponseBuilder-prop_REASON_401.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_402__](http-HttpResponseBuilder-prop_REASON_402.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_403__](http-HttpResponseBuilder-prop_REASON_403.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_404__](http-HttpResponseBuilder-prop_REASON_404.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_405__](http-HttpResponseBuilder-prop_REASON_405.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_406__](http-HttpResponseBuilder-prop_REASON_406.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_407__](http-HttpResponseBuilder-prop_REASON_407.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_408__](http-HttpResponseBuilder-prop_REASON_408.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_409__](http-HttpResponseBuilder-prop_REASON_409.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_410__](http-HttpResponseBuilder-prop_REASON_410.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_411__](http-HttpResponseBuilder-prop_REASON_411.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_412__](http-HttpResponseBuilder-prop_REASON_412.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_413__](http-HttpResponseBuilder-prop_REASON_413.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_414__](http-HttpResponseBuilder-prop_REASON_414.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_415__](http-HttpResponseBuilder-prop_REASON_415.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_416__](http-HttpResponseBuilder-prop_REASON_416.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_417__](http-HttpResponseBuilder-prop_REASON_417.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_422__](http-HttpResponseBuilder-prop_REASON_422.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_423__](http-HttpResponseBuilder-prop_REASON_423.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_424__](http-HttpResponseBuilder-prop_REASON_424.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_426__](http-HttpResponseBuilder-prop_REASON_426.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_428__](http-HttpResponseBuilder-prop_REASON_428.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_429__](http-HttpResponseBuilder-prop_REASON_429.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_431__](http-HttpResponseBuilder-prop_REASON_431.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_451__](http-HttpResponseBuilder-prop_REASON_451.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_500__](http-HttpResponseBuilder-prop_REASON_500.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_501__](http-HttpResponseBuilder-prop_REASON_501.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_502__](http-HttpResponseBuilder-prop_REASON_502.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_503__](http-HttpResponseBuilder-prop_REASON_503.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_504__](http-HttpResponseBuilder-prop_REASON_504.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_505__](http-HttpResponseBuilder-prop_REASON_505.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_506__](http-HttpResponseBuilder-prop_REASON_506.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_507__](http-HttpResponseBuilder-prop_REASON_507.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_508__](http-HttpResponseBuilder-prop_REASON_508.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_510__](http-HttpResponseBuilder-prop_REASON_510.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;REASON\_511__](http-HttpResponseBuilder-prop_REASON_511.md) |  |

## Methods
| Name | Description |
| :--- | :---------- |
| [__HttpResponseBuilder&nbsp;::&nbsp;\_\_construct__](http-HttpResponseBuilder-__construct.md) |  |
| [__HttpResponseBuilder&nbsp;::&nbsp;getStatusCode__](http-HttpResponseBuilder-getStatusCode.md) | Return the current status code |
| [__HttpResponseBuilder&nbsp;::&nbsp;getStatusReason__](http-HttpResponseBuilder-getStatusReason.md) | Return the current status reason phrase |
| [__HttpResponseBuilder&nbsp;::&nbsp;setStatus__](http-HttpResponseBuilder-setStatus.md) | Set a new status code and optional reason phrase |
| [__HttpResponseBuilder&nbsp;::&nbsp;setBody__](http-HttpResponseBuilder-setBody.md) | Set a new body stream |
| [__HttpResponseBuilder&nbsp;::&nbsp;getBuilder__](http-HttpResponseBuilder-getBuilder.md) | Get a message builder for the current message |
| [__HttpResponseBuilder&nbsp;::&nbsp;getFinal__](http-HttpResponseBuilder-getFinal.md) | Get a read-only message object |
| [__HttpResponseBuilder&nbsp;::&nbsp;toString__](http-HttpResponseBuilder-toString.md) | Get a string of the request  This is a text representation of the message |
| [__HttpResponseBuilder&nbsp;::&nbsp;hasHeader__](http-HttpResponseBuilder-hasHeader.md) | Check to see if there is a header with this name |
| [__HttpResponseBuilder&nbsp;::&nbsp;inHeader__](http-HttpResponseBuilder-inHeader.md) | Perform a Case-insensitive value search on a header  Each header can have multiple values in the form of an indexed array or similar |
| [__HttpResponseBuilder&nbsp;::&nbsp;getHeader__](http-HttpResponseBuilder-getHeader.md) | Returns the value indexed array for a specific header |
| [__HttpResponseBuilder&nbsp;::&nbsp;getHeaderLine__](http-HttpResponseBuilder-getHeaderLine.md) | Returns the entire header line |
| [__HttpResponseBuilder&nbsp;::&nbsp;addHeader__](http-HttpResponseBuilder-addHeader.md) | Add content to a header or create it  This method will append data to an existing one, or create it if it does not already exist |
| [__HttpResponseBuilder&nbsp;::&nbsp;setHeader__](http-HttpResponseBuilder-setHeader.md) | Set/change a header |
| [__HttpResponseBuilder&nbsp;::&nbsp;removeHeader__](http-HttpResponseBuilder-removeHeader.md) | Remove specified header |
| [__HttpResponseBuilder&nbsp;::&nbsp;getProtocolVersion__](http-HttpResponseBuilder-getProtocolVersion.md) | Get the protocol version like `1 |
| [__HttpResponseBuilder&nbsp;::&nbsp;setProtocolVersion__](http-HttpResponseBuilder-setProtocolVersion.md) | Set a different protocol version like `1 |
| [__HttpResponseBuilder&nbsp;::&nbsp;getBody__](http-HttpResponseBuilder-getBody.md) | Get the current body stream |
