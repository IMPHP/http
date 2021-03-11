# [HTTP Message](http.md) / [UriBuilder](http-UriBuilder.md) :: setAuthority
 > im\http\msg\UriBuilder
____

## Description
Update all authority data

 > scheme://[user[:password]@]domain[:port]  

 > Any authority part not included, will be removed from this URI  

## Synopsis
```php
setAuthority(null|string $auth): void
```

## Parameters
| Name | Description |
| :--- | :---------- |
| auth | The authority string or `NULL` to remove all of these parts |
