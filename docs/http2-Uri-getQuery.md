# [HTTP Message v2](http2.md) / [Uri](http2-Uri.md) :: getQuery
 > im\http2\msg\Uri
____

## Description
Get a key part of the querystring

## Synopsis
```php
getQuery(string $name): null|string
```

## Parameters
| Name | Description |
| :--- | :---------- |
| name | Name of the part to return |

## Return
This will return `NULL` if this key does not exist

## Example 1
```php
$uri = new <Uri Class>("http://domain.com/?mykey=some+value&otherkey=with+value");
echo $uri->getQuery("mykey");
```

```
Output: some value
```
