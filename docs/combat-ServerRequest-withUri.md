# [PSR-7 Compatibility package](combat.md) / [ServerRequest](combat-ServerRequest.md) :: withUri
 > im\http2\combat\psr7\ServerRequest
____

## Description
Returns an instance with the provided URI

## Synopsis
```php
public withUri(Psr\Http\Message\UriInterface $uri, bool $preserveHost = FALSE): static
```

## Parameters
| Name | Description |
| :--- | :---------- |
| uri | New request URI to use |
| preserveHost | Preserve the original state of the Host header |

## Return

