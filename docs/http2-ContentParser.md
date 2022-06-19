# [HTTP Base](http-base.md) / [HTTP Message v2](http2.md) / ContentParser
 > im\http2\msg\ContentParser
____

## Description
Defines a parser that is used to parse the request body

## Synopsis
```php
interface ContentParser {

    // Methods
    parse(im\io\Stream $stream, string $contentType): mixed
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__ContentParser&nbsp;::&nbsp;parse__](http2-ContentParser-parse.md) | Parse data from the body stream |
