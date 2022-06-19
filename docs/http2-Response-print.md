# [HTTP Message v2](http2.md) / [Response](http2-Response.md) :: print
 > im\http2\msg\Response
____

## Description
Print message to stdout

This is similar to `toString()` except that it
will directly output this to the client. This is more effeicient
if you as an example is outputting file content for downloading, as
reading an entire file to memory may be slow, leed to memory issues and more.

## Synopsis
```php
print(): void
```
