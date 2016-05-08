# env

[![Build Status](https://travis-ci.org/oscarotero/env.svg)](https://travis-ci.org/oscarotero/env)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/oscarotero/env/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/oscarotero/env/?branch=master)

Simple library to get environment variables converted to simple types.

## Installation

This package is installable and autoloadable via Composer as [oscarotero/env](https://packagist.org/packages/oscarotero/env).

```
$ composer require oscarotero/env
```

## Example

```php
// Using getenv function:
var_dump(getenv('FOO')); //string(5) "false"

// Using Env:
var_dump(Env::get('FOO')); //bool(false)
```

## Available conversions:

* "false" is converted to boolean `false`
* "true" is converted to boolean `true`
* "null" is converted to `null`
* If the string contains only numbers is converted to an integer
* If the string has quotes, remove them

To configure the conversion, you can use the following constants (all enabled by default):

* `Env::CONVERT_BOOL` To convert boolean values
* `Env::CONVERT_NULL` To convert null values
* `Env::CONVERT_INT` To convert integer values
* `Env::STRIP_QUOTES` To remove the quotes of the strings

```php
//Convert booleans and null, but not integers or strip quotes
Env::$options = Env::CONVERT_BOOL | Env::CONVERT_NULL;
```

## Default value

By default, if the value does not exits, returns `null`, but you can change for any other value:

```php
Env::$default = false;
```

## The env() function

If you don't want to complicate with classes and namespaces, you can use the `env()` function, like in Laravel or other libraries:

```php
Env::init(); //expose the function to globals

//now you can use it

var_dump(env('FOO'));
```
