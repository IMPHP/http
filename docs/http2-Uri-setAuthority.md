# [HTTP Message v2](http2.md) / [Uri](http2-Uri.md) :: setAuthority
 > im\http2\msg\Uri
____

## Description
Update all authority data

 > [user[:password]@]host[:port]  

 > Any authority part not included, will be removed from this URI  

## Synopsis
```php
setAuthority(null|string $auth): void
```

## Parameters
| Name | Description |
| :--- | :---------- |
| auth | The authority string or `NULL` to remove all of these parts |
