# [HTTP Message v2](http2.md) / [BaseMessage](http2-BaseMessage.md) :: clone
 > im\http2\msg\BaseMessage
____

## Description
A proper OOP cloning method

Classes implementing this interface should also
be able to deal with `clone $object`.

## Synopsis
```php
public clone(): static
```

## Return
A cloned version of this instance
