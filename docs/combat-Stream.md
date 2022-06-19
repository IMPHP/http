# [HTTP Base](http-base.md) / [PSR-7 Compatibility package](combat.md) / Stream
 > im\http2\combat\psr7\Stream
____

## Description
A wrapper allowing you to use `im\io\Stream` as `Psr\Http\Message\StreamInterface`

## Synopsis
```php
class Stream implements Psr\Http\Message\StreamInterface, im\features\Wrapper, Stringable {

    // Methods
    public __construct(im\io\Stream $stream)
    public unwrap(): null|im\io\Stream
    public close(): void
    public detach(): resource|null
    public getSize(): int|null
    public tell(): int
    public eof(): bool
    public isSeekable(): bool
    public isWritable(): bool
    public isReadable(): bool
    public seek(int $offset, int $whence = im\http2\combat\psr7\SEEK_SET): void
    public rewind(): void
    public write(string $string): int
    public read(int $length): string
    public getContents(): string
    public getMetadata(string $key = NULL): array|mixed|null
}
```

## Methods
| Name | Description |
| :--- | :---------- |
| [__Stream&nbsp;::&nbsp;\_\_construct__](combat-Stream-__construct.md) |  |
| [__Stream&nbsp;::&nbsp;unwrap__](combat-Stream-unwrap.md) | Return the original `im\io\Stream` |
| [__Stream&nbsp;::&nbsp;close__](combat-Stream-close.md) | Close the underlaying stream |
| [__Stream&nbsp;::&nbsp;detach__](combat-Stream-detach.md) | Detach the underlaying stream, but do not close it |
| [__Stream&nbsp;::&nbsp;getSize__](combat-Stream-getSize.md) | Get the size of the stream data in bytes |
| [__Stream&nbsp;::&nbsp;tell__](combat-Stream-tell.md) | Get the current pointer position |
| [__Stream&nbsp;::&nbsp;eof__](combat-Stream-eof.md) | Check whether or not this stream has reached EOF |
| [__Stream&nbsp;::&nbsp;isSeekable__](combat-Stream-isSeekable.md) | Check to see if this stream is seekable |
| [__Stream&nbsp;::&nbsp;isWritable__](combat-Stream-isWritable.md) | Check to see if this stream is writable |
| [__Stream&nbsp;::&nbsp;isReadable__](combat-Stream-isReadable.md) | Check to see if this stream is readable |
| [__Stream&nbsp;::&nbsp;seek__](combat-Stream-seek.md) | Seek to a position in the stream |
| [__Stream&nbsp;::&nbsp;rewind__](combat-Stream-rewind.md) | Seek to the beginning of the stream |
| [__Stream&nbsp;::&nbsp;write__](combat-Stream-write.md) | Write data to the stream |
| [__Stream&nbsp;::&nbsp;read__](combat-Stream-read.md) | Read data from the stream |
| [__Stream&nbsp;::&nbsp;getContents__](combat-Stream-getContents.md) | Returns the remaining contents in the stream |
| [__Stream&nbsp;::&nbsp;getMetadata__](combat-Stream-getMetadata.md) | Get stream metadata as an associative array or retrieve a specific key |
