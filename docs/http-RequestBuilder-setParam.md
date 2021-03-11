# [HTTP Message](http.md) / [RequestBuilder](http-RequestBuilder.md) :: setParam
 > im\http\msg\RequestBuilder
____

## Description
Set/Change the value of a param

## Synopsis
```php
setParam(string $name, mixed $value, string $type = im\http\msg\Request::P_ATTR): void
```

## Parameters
| Name | Description |
| :--- | :---------- |
| name | The name of the param |
| value | The new value to set |
| type | The param type e.g. `Request::P_ATTR`, `Request::P_QUERY` etc... |
