# IMPHP - Http Message
___

This library is based on the idea of PSR7, but differs a lot. While PSR7 has some great ideas, I personally did not like the actual implementation of that idea. Moving all of the PHP mess like request and response data into proper interfaced classes was a good idea. Besides being a lot nicer to look at and work with, it also completely sandboxes the entire request/response process, as nothing in your code needs to be hard wired to work with certain aspects of static PHP data. You can create an entire request wrapped in a single object.

But, there are some things that I did not like about the implementation though. The biggest one was the `Factory` design, which is great for some things, but there is no real reason to introduce this much overhead to such an implementation.

There are 3 main interfaces in this library as well as PSR7, `Request`, `Response` and `Uri`. None of these 3 have any dependencies on one another, except for a single `Host` header in the `Request`, which may or may not be based on and updated from the `Uri`. But there are simple ways around this, without keeping the objects themselves in a read-only state. If for some reason you have some code that requires you to ensure that no values are changed, a simple `clone` can manually be made and as such, the specification should simply enforce a safe-clone policy, to ensure that implementations take cloning into account.

__Type hinting__  
PSR7 is designed to work with older PHP versions. As such it does not utilize PHP's newer type declaration types. Statically typed code is much easier to work with and debug, and since PHP has finally made it to a more final stage in this regard, although the road was long _(All the way through the entire PHP 7.x tree)_, tools should start scrapping old support and make more use of it. 

### Full Documentation

You can view the [Full Documentation](docs/http.md) to lean more about what this offers.

### Installation

__Using .phar library__

```sh
wget https://github.com/IMPHP/http/releases/download/<version>/imphp-http.phar
```

```php
require "imphp-http.phar";

...
```

__Clone via git__

```sh
git clone https://github.com/IMPHP/http.git imphp/http/
```

__Composer _(Packagist)___

```sh
composer require imphp/http
```
