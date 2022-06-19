# [PSR-7 Compatibility package](combat.md) / [Request](combat-Request.md) :: withUri
 > im\http2\combat\psr7\Request
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

