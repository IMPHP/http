# [HTTP Message v2](http2.md) / [ServerRequest](http2-ServerRequest.md) :: getParsedData
 > im\http2\ServerRequest
____

## Description
Get the parsed data from the request stream

There is no proper way to enforce static types on this.
Data can be anything from form data to json encoding, XML and more.

 > This requires a parser being added that matches the content type of the stream. See 'setParser()'.  

## Synopsis
```php
public getParsedData(): mixed
```
