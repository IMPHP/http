# [HTTP Message](http.md) / [HttpFile](http-HttpFile.md) :: getClientFilename
 > im\http\msg\HttpFile
____

## Description
Get the file name provided by the request creator, if any.

It's the job of the request creator to provide this information.
The implementation is allowed to do further steps to determine this,
but is not required to.

## Synopsis
```php
public getClientFilename(): null|string
```
