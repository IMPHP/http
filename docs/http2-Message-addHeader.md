# [HTTP Message v2](http2.md) / [Message](http2-Message.md) :: addHeader
 > im\http2\msg\Message
____

## Description
Add content to a header or create it

This method will append data to an existing one, or
create it if it does not already exist.

## Synopsis
```php
addHeader(string $name, string ...$values): void
```

## Parameters
| Name | Description |
| :--- | :---------- |
| name | Name of the header |
|  | One or more value strings |

## Example 1
```php
$msg->setHeader("Content-Type", "text/html");
$msg->addHeader("Content-Type", "utf-8");

echo $msg->getHeaderLine("Content-Type");
```

```
Output: text/html, utf-8
```
