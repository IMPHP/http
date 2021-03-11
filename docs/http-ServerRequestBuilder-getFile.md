# [HTTP Message](http.md) / [ServerRequestBuilder](http-ServerRequestBuilder.md) :: getFile
 > im\http\msg\ServerRequestBuilder
____

## Description
Get a specific file based on it's name

 > Multiple files with the same name may exist. This will return the first one it finds.  

 > In a normal server request, the name will be the name of the HTML form that uploaded the file.  

## Synopsis
```php
public getFile(string $name): null|im\http\msg\File
```

## Parameters
| Name | Description |
| :--- | :---------- |
| name | The name of the file |

## Return
This will return `NULL` if no such file exist
