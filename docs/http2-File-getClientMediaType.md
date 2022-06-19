# [HTTP Message v2](http2.md) / [File](http2-File.md) :: getClientMediaType
 > im\http2\msg\File
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
