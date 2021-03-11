# [HTTP Message](http.md) / [HttpRequest](http-HttpRequest.md) :: getFiles
 > im\http\msg\HttpRequest
____

## Description
Get all the files in this request

## Synopsis
```php
public getFiles(null|string $name = NULL): im\util\IndexArray
```

## Parameters
| Name | Description |
| :--- | :---------- |
| name | Limit the list to files with a specific name |

## Return
This will return a list with all of the requested files.
If no files was found, an empty list is returned.
