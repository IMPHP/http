# [HTTP Message](http.md) / [File](http-File.md) :: getStream
 > im\http\msg\File
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
getStream(): im\io\Stream
```
