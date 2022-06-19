# [HTTP Base](http-base.md) / [PSR-7 Compatibility package](combat.md) / File
 > im\http2\combat\psr7\File
____

## Description
A wrapper allowing you to use `im\http2\msg\File` as `Psr\Http\Message\UploadedFileInterface`

## Synopsis
```php
class File implements Psr\Http\Message\UploadedFileInterface, im\features\Wrapper {

    // Methods
    public __construct(im\http2\msg\File $file)
    public unwrap(): null|im\http2\msg\File
    public getStream(): StreamInterface
    public moveTo(string $targetPath): void
    public getSize(): int|null
    public getError(): int
    public getClientFilename(): string|null
    public getClientMediaType(): string|null
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__File&nbsp;::&nbsp;\_\_construct__](combat-File-__construct.md) |  |
| [__File&nbsp;::&nbsp;unwrap__](combat-File-unwrap.md) | Return the original `im\io\Stream` |
| [__File&nbsp;::&nbsp;getStream__](combat-File-getStream.md) | Retrieve a stream representing the uploaded file |
| [__File&nbsp;::&nbsp;moveTo__](combat-File-moveTo.md) | Move the uploaded file to a new location |
| [__File&nbsp;::&nbsp;getSize__](combat-File-getSize.md) | Retrieve the file size |
| [__File&nbsp;::&nbsp;getError__](combat-File-getError.md) | Retrieve the error associated with the uploaded file |
| [__File&nbsp;::&nbsp;getClientFilename__](combat-File-getClientFilename.md) | Retrieve the filename sent by the client |
| [__File&nbsp;::&nbsp;getClientMediaType__](combat-File-getClientMediaType.md) | Retrieve the media type sent by the client |
