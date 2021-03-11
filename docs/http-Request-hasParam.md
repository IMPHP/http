# [HTTP Message](http.md) / [Request](http-Request.md) :: hasParam
 > im\http\msg\Request
____

## Description
Check to see if a specific param exists

## Synopsis
```php
hasParam(string $name, string $type = im\http\msg\Request::P_ATTR): bool
```

## Parameters
| Name | Description |
| :--- | :---------- |
| name | The name of the param |
| type | The param type e.g. `Request::P_ATTR`, `Request::P_QUERY` etc... |
