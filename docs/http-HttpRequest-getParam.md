# [HTTP Message](http.md) / [HttpRequest](http-HttpRequest.md) :: getParam
 > im\http\msg\HttpRequest
____

## Description
Get the value from a param

## Synopsis
```php
public getParam(string $name, mixed $default = NULL, string $type = im\http\msg\Request::P_ATTR): mixed
```

## Parameters
| Name | Description |
| :--- | :---------- |
| name | The name of the param |
| default | Default value to return if no value was found |
| type | The param type e.g. `Request::P_ATTR`, `Request::P_QUERY` etc... |
