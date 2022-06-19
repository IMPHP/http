# [HTTP Message](http.md) / [HttpUriBuilder](http-HttpUriBuilder.md) :: getBaseUrl
 > im\http\msg\HttpUriBuilder
____

## Description
Get the base url for the request

The base url is everything prepending the path,
like scheme, domain, base path etc.

## Synopsis
```php
public getBaseUrl(): null|string
```

## Return
This will return `NULL` if there is noting to
build the base url with.
