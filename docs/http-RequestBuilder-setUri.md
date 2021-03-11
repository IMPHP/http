# [HTTP Message](http.md) / [RequestBuilder](http-RequestBuilder.md) :: setUri
 > im\http\msg\RequestBuilder
____

## Description
Set a new Uri object

Unless $preserveHost is specified as `FASLE`, this will
update the `Host` header within this request to match the
host of the Uri object.

This will also clear/rebuild `P_QUERY` so that the
query params matches the query from the new Uri object.

## Synopsis
```php
setUri(Uri $uri, bool $preserveHost = FALSE): void
```

## Parameters
| Name | Description |
| :--- | :---------- |
| uri | The new Uri object |
| preserveHost | If `FALSE` the Host header will not be updated (Defaults to `FALSE`) |
