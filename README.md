# env

[![Build Status](https://travis-ci.org/oscarotero/psr7-middlewares.svg)](https://travis-ci.org/oscarotero/psr7-middlewares)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/oscarotero/env/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/oscarotero/env/?branch=master)

Simple library to read environment variables and convert to simple types.

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

* Strings with "false" are converted to boolean `false`
* Strings with "true" are converted to boolean `true`
* Strings with "null" are converted to `null`
* Strings with only numbers are converted to integers

To configure the conversions, there's the following constants (all enabled by default):

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

## Global function

To avoid to handle with classes and namespaces, you can use the global function, like Laravel or other libraries:

```php
Env::init();

//now we can use the env() function

var_dump(env('FOO'));
```
