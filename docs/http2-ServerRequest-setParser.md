# [HTTP Message v2](http2.md) / [ServerRequest](http2-ServerRequest.md) :: setParser
 > im\http2\ServerRequest
____

## Description
Add a parser for a given content type

The parser being added is used to parse the stream data when calling
`getParsedData()`.

## Synopsis
```php
public setParser(im\http2\msg\ContentParser $parser, null|string $contentType = NULL): void
```

## Parameters
| Name | Description |
| :--- | :---------- |
| parser | A parser to add |
| contentType | The content type that this parser can deal with.<br />A `NULL` value indicates any type. |
