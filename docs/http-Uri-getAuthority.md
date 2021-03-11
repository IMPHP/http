# [HTTP Message](http.md) / [Uri](http-Uri.md) :: getAuthority
 > im\http\msg\Uri
____

## Description
Get the authority

 > scheme://[user[:password]@]domain[:port]  

## Synopsis
```php
getAuthority(): null|string
```

## Return
This may return `NULL` if there is no data to assemble the authority
