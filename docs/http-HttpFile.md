# [HTTP Base](http-base.md) / [HTTP Message](http.md) / HttpFile
 > im\http\msg\HttpFile
____

## Description
This class is used mostly for uploaded files.

It can however be used for any type of file or even `Stream` objects,
though it does not really make much sense outside the usage of the Http package.

> :warning: **Deprecated**  
> This has been replaced by `im\http2\File`  

## Synopsis
```php
class HttpFile implements im\http\msg\File {

    // Methods
    public __construct(string $name, im\io\Stream|string $file, int $length = -1, int $error = 0, null|string $clientName = NULL, null|string $clientType = NULL)
    public getName(): string
    public getStream(): im\io\Stream
    public isReady(): bool
    public getLength(): int
    public getError(): int
    public getClientFilename(): null|string
    public getClientMediaType(): null|string
    public isSaved(): bool
    public save(im\io\Stream|string $target): bool
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__HttpFile&nbsp;::&nbsp;\_\_construct__](http-HttpFile-__construct.md) |  |
| [__HttpFile&nbsp;::&nbsp;getName__](http-HttpFile-getName.md) | Get an identifiable name |
| [__HttpFile&nbsp;::&nbsp;getStream__](http-HttpFile-getStream.md) | Get a stream access to this file  The initial file (before it's saved) should have only `r` read access |
| [__HttpFile&nbsp;::&nbsp;isReady__](http-HttpFile-isReady.md) | Checks to see if there is an error code |
| [__HttpFile&nbsp;::&nbsp;getLength__](http-HttpFile-getLength.md) | Get the byte length of the file or stream  In cases where the size could not be determined, this method returns `-1` |
| [__HttpFile&nbsp;::&nbsp;getError__](http-HttpFile-getError.md) | Get the error code |
| [__HttpFile&nbsp;::&nbsp;getClientFilename__](http-HttpFile-getClientFilename.md) | Get the file name provided by the request creator, if any |
| [__HttpFile&nbsp;::&nbsp;getClientMediaType__](http-HttpFile-getClientMediaType.md) | Get the file media type provided by the request creator, if any  It's the job of the request creator to provide this information |
| [__HttpFile&nbsp;::&nbsp;isSaved__](http-HttpFile-isSaved.md) | Check whether or not this file has been saved  If this returns `TRUE` is not a indicator that the file cannot be saved again to another location |
| [__HttpFile&nbsp;::&nbsp;save__](http-HttpFile-save.md) | Save the content of this included file to a perminent location  This is the same as `moveTo()` on the PSR UploadedFile object |
