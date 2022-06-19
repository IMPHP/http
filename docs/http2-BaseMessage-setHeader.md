# [HTTP Message v2](http2.md) / [BaseMessage](http2-BaseMessage.md) :: setHeader
 > im\http2\msg\BaseMessage
____

## Description
Set/change a header

 > This method replaces the existing header if any.  

## Synopsis
```php
public setHeader(string $name, string ...$values): void
```

## Parameters
| Name | Description |
| :--- | :---------- |
| name | Name of the header |
|  | One or more value strings |
