# [HTTP Message](http.md) / [HttpUri](http-HttpUri.md) :: getQueryKey
 > im\http\msg\HttpUri
____

## Description
Get a key part of the querystring

## Synopsis
```php
public getQueryKey(string $name): null|string
```

## Parameters
| Name | Description |
| :--- | :---------- |
| name | Name of the part to return |

## Return
This will return `NULL` if this key does not exist

## Example 1
```php
$uri = new HttpUriBuilder("http://domain.com/?mykey=some+value&otherkey=with+value");
echo $uri->getQueryKey("mykey");
```

```
Output: some value
```
