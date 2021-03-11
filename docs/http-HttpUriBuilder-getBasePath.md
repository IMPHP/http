# [HTTP Message](http.md) / [HttpUriBuilder](http-HttpUriBuilder.md) :: getBasePath
 > im\http\msg\HttpUriBuilder
____

## Description
Get the base path for the request

Base path is the part of the path that is not part of
the actual request and should not be dealed with by a router and such.

## Synopsis
```php
public getBasePath(): null|string
```

## Return
This will return `NULL` if no base path has been defined
