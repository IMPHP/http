# [HTTP Message v2](http2.md) / [ServerRequest](http2-ServerRequest.md) :: inHeader
 > im\http2\ServerRequest
____

## Description
Perform a Case-insensitive value search on a header

Each header can have multiple values in the form of an indexed array or similar.
This method performs a value search on each value index, either the
whole value or a partial match ($partial) e.g. `strpos()`

## Synopsis
```php
public inHeader(string $name, string $search): bool
```

## Parameters
| Name | Description |
| :--- | :---------- |
| name | Name of the header |
| search | Value of partial value to search for |

## Return

