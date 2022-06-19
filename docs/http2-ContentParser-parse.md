# [HTTP Message v2](http2.md) / [ContentParser](http2-ContentParser.md) :: parse
 > im\http2\msg\ContentParser
____

## Description
Parse data from the body stream

## Synopsis
```php
parse(im\io\Stream $stream, string $contentType): mixed
```

## Parameters
| Name | Description |
| :--- | :---------- |
| stream | The stream to parse |
| contentType | The mime type of the stream content |

## Return
The parser should return `NULL` if it does not
support parsing the current content of the body.
