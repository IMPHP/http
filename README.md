# IMPHP - Http Message
___

This library is based on PSR7, but differs a lot. While PSR7 has some great ideas, I personally did not like the actual implementation of that idea. Moving all of the PHP mess like request and response data into proper interfaced classes was a good idea. Besides being a lot nicer to look at and work with, it also completely sandboxes the entire request/response process, as nothing in your code needs to be hard wired to work with certain aspects of static PHP data. You can create an entire request that is wrapped in a loose instance that can be passed around and generate an entire response, that like the request, is wrapped in a similar instance. It does not even have to be a real request as all of this can be simulated easily. This creates a whole new way to test things.

But, there are some things that I did not like about the implementation though. The biggest one was the `Factory` design, which is great for small things, but not the best choice for something this large. A better choice, at least in my opinion, is the `Builder` design, which lets you split the two different tasks completely. You got your normal interface which is used to work with the data and then a separate interface for manipulating the data.

__Type hinting__  
Another reason for creating something new, is PHP's type hint feature. PSR7 is designed to work with older PHP versions. I get that, but coming from statically typed languages, I really love that PHP has finally added this option, and want tools that utilizes that. It really does make things a lot easier to work with and debug. PSR is simply outdated.

### Full Documentation

You can view the [Full Documentation](docs/http.md) to lean more about what this offers.

### Installation

__Clone via git__

```sh
git clone https://github.com/IMPHP/http.git imphp/http/
```

__Composer _(Packagist)___

```sh
composer require imphp/http
```
