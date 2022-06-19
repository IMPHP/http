# [PSR-7 Compatibility package](combat.md) / [ServerRequest](combat-ServerRequest.md) :: getAttributes
 > im\http2\combat\psr7\ServerRequest
____

## Description
Retrieve attributes derived from the request

 > This will always return an empty array. The imphp/http implementation does not support returning all available atributes. They are application specific and as such, if an application uses them, it will know what to look for.<br /><br />Use `getAttribute()` to get specific attributes.  

## Synopsis
```php
public getAttributes(): array
```

## Return

