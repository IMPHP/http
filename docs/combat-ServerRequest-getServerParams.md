# [PSR-7 Compatibility package](combat.md) / [ServerRequest](combat-ServerRequest.md) :: getServerParams
 > im\http2\combat\psr7\ServerRequest
____

## Description
Retrieve server parameters

 > In this implementation, this will always return an empty array. The Super Globals does not belong here and as such is not implemented in the underlaying `im\http2\msg\Request`.  

## Synopsis
```php
public getServerParams(): array
```

## Return

