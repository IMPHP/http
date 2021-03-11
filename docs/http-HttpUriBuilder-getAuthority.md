# [HTTP Message](http.md) / [HttpUriBuilder](http-HttpUriBuilder.md) :: getAuthority
 > im\http\msg\HttpUriBuilder
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
