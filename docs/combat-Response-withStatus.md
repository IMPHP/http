# [PSR-7 Compatibility package](combat.md) / [Response](combat-Response.md) :: withStatus
 > im\http2\combat\psr7\Response
____

## Description
Return an instance with the specified status code and, optionally, reason phrase

## Synopsis
```php
public withStatus(int $code, string $reasonPhrase = ''): static
```

## Parameters
| Name | Description |
| :--- | :---------- |
| code | The 3-digit integer result code to set |
| reasonPhrase | Optional reason phrase to use with the provided status code |

## Return

