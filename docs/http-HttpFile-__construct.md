# [HTTP Message](http.md) / [HttpFile](http-HttpFile.md) :: __construct
 > im\http\msg\HttpFile
____

## Synopsis
```php
public __construct(string $name, im\io\Stream|string $file, int $length = -1, int $error = 0, null|string $clientName = NULL, null|string $clientType = NULL)
```

## Parameters
| Name | Description |
| :--- | :---------- |
| name | An identifying name |
| file | File accociated with this class.<br />This can be a file path or a `Stream` |
| length | Optional, specify the length of the file |
| error | Specify an error code accociated with the file.<br />This is used when using this class for uploaded files |
| clientName | The name of the original file that was uploaded.<br />When used for uploaded files |
| clientType | The media type reported by the client.<br />When used for uploaded files |
