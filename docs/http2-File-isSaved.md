# [HTTP Message v2](http2.md) / [File](http2-File.md) :: isSaved
 > im\http2\msg\File
____

## Description
Check whether or not this file has been saved

If this returns `TRUE` is not a indicator that the
file cannot be saved again to another location.
It simply means that this is no longer a temp file,
since it has been dealed with at least ones.
However, if the caller parsed a stream as target,
that stream may only have write access.

Also note that this method could return `FALSE`
even if the file has been saved. Someone could have
done so manually using `getStream()`. So the only thing that
can be concluded from this value, is whether or not the file
stream points at the original temp file or not.

## Synopsis
```php
isSaved(): bool
```

## Return
Returns `TRUE` if `save()` has been called successfully
