# [HTTP Message](http.md) / File
 > im\http\msg\File
____

## Description
Defines a file that can be attached to a request.
These files are typically used for uploaded files.

## Synopsis
```php
interface File {

    // Methods
    getName(): string
    isReady(): bool
    getStream(): im\io\Stream
    isSaved(): bool
    getLength(): int
    getError(): int
    getClientFilename(): null|string
    getClientMediaType(): null|string
    save(im\io\Stream|string $target): bool
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__File&nbsp;::&nbsp;getName__](http-File-getName.md) | Get an identifiable name |
| [__File&nbsp;::&nbsp;isReady__](http-File-isReady.md) | Checks to see if there is an error code |
| [__File&nbsp;::&nbsp;getStream__](http-File-getStream.md) | Get a stream access to this file  The initial file (before it's saved) should have only `r` read access |
| [__File&nbsp;::&nbsp;isSaved__](http-File-isSaved.md) | Check whether or not this file has been saved  If this returns `TRUE` is not a indicator that the file cannot be saved again to another location |
| [__File&nbsp;::&nbsp;getLength__](http-File-getLength.md) | Get the byte length of the file or stream  In cases where the size could not be determined, this method returns `-1` |
| [__File&nbsp;::&nbsp;getError__](http-File-getError.md) | Get the error code |
| [__File&nbsp;::&nbsp;getClientFilename__](http-File-getClientFilename.md) | Get the file name provided by the request creator, if any |
| [__File&nbsp;::&nbsp;getClientMediaType__](http-File-getClientMediaType.md) | Get the file media type provided by the request creator, if any  It's the job of the request creator to provide this information |
| [__File&nbsp;::&nbsp;save__](http-File-save.md) | Save the content of this included file to a perminent location  This is the same as `moveTo()` on the PSR UploadedFile object |
