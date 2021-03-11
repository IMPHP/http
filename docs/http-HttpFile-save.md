# [HTTP Message](http.md) / [HttpFile](http-HttpFile.md) :: save
 > im\http\msg\HttpFile
____

## Description
Save the content of this included file to a perminent location

This is the same as `moveTo()` on the PSR UploadedFile object.
This object however is not just intended for uploaded files.
It's simply a file or stream that has been included in a request,
how and by whom does not mater. And since this includes stream support,
the word `save` gives more meaning than `move` because you cannot
move a stream, but you can save it's content, just like you can save the
content from a file to a different location. What happens to the source
file or stream is a task for the request creator.

Stream access will shift to the target stream on success. This allows anyone with access
to the file object to have access to the target content.

## Synopsis
```php
public save(im\io\Stream|string $target): bool
```

## Parameters
| Name | Description |
| :--- | :---------- |
|  | Target, file or stream to save the content to |
