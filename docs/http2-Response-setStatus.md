# [HTTP Message v2](http2.md) / [Response](http2-Response.md) :: setStatus
 > im\http2\msg\Response
____

## Description
Set a new status code and optional reason phrase

## Synopsis
```php
setStatus(int $code, null|string $reasonPhrase = NULL): void
```

## Parameters
| Name | Description |
| :--- | :---------- |
| code | A response code |
| reasonPhrase | An optional response phrase |
