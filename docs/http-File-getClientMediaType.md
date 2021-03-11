# [HTTP Message](http.md) / [File](http-File.md) :: getClientMediaType
 > im\http\msg\File
____

## Description
Get the file media type provided by the request creator, if any

It's the job of the request creator to provide this information.
The implementation is allowed to do further steps to determine this,
but is not required to.

## Synopsis
```php
getClientMediaType(): null|string
```
