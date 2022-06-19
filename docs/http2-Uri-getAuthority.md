# [HTTP Message v2](http2.md) / [Uri](http2-Uri.md) :: getAuthority
 > im\http2\msg\Uri
____

## Description
Get the authority

 > [user[:password]@]host[:port]  

## Synopsis
```php
getAuthority(): null|string
```

## Return
This may return `NULL` if there is no data to assemble the authority
