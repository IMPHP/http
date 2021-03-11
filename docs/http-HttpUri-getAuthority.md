# [HTTP Message](http.md) / [HttpUri](http-HttpUri.md) :: getAuthority
 > im\http\msg\HttpUri
____

## Description
Get the authority

 > scheme://[user[:password]@]domain[:port]  

## Synopsis
```php
public getAuthority(): null|string
```

## Return
This may return `NULL` if there is no data to assemble the authority
