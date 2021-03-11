# [HTTP Message](http.md) / [HttpFile](http-HttpFile.md) :: getStream
 > im\http\msg\HttpFile
____

## Description
Get a stream access to this file

The initial file (before it's saved) should have only
`r` read access.

Whenever it's not possible to create/re-create a stream
for some reason, a stream containing an empty temp resource
is returned.

## Synopsis
```php
public getStream(): im\io\Stream
```
