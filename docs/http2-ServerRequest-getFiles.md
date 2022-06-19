# [HTTP Message v2](http2.md) / [ServerRequest](http2-ServerRequest.md) :: getFiles
 > im\http2\ServerRequest
____

## Description
Get all the files in this request

## Synopsis
```php
public getFiles(null|string $name = NULL): im\util\ImmutableListArray
```

## Parameters
| Name | Description |
| :--- | :---------- |
| name | Limit the list to files with a specific name |

## Return
This will return a list with all of the requested files.
If no files was found, an empty list is returned.
