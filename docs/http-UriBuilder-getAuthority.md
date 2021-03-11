# [HTTP Message](http.md) / [UriBuilder](http-UriBuilder.md) :: getAuthority
 > im\http\msg\UriBuilder
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
