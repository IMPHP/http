# [HTTP Message v2](http2.md) / [ServerRequest](http2-ServerRequest.md) :: setRequestTarget
 > im\http2\ServerRequest
____

## Description
Set a new request target

Note that this will stop the request target from being updated
when changing the Uri object

## Synopsis
```php
public setRequestTarget(string $requestTarget): void
```

## Parameters
| Name | Description |
| :--- | :---------- |
| requestTarget | The new request target |
