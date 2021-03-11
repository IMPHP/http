# [HTTP Message](http.md) / [RequestBuilder](http-RequestBuilder.md) :: getFiles
 > im\http\msg\RequestBuilder
____

## Description
Get all the files in this request

## Synopsis
```php
getFiles(null|string $name = NULL): im\util\IndexArray
```

## Parameters
| Name | Description |
| :--- | :---------- |
| name | Limit the list to files with a specific name |

## Return
This will return a list with all of the requested files.
If no files was found, an empty list is returned.
