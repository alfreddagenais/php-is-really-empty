# php-is-really-empty 🌌 🚀
A Small PHP library to tell if the passed value is _really_ empty.

## What "empty" means
##### Marriam-Webster definition of empty
> Lacking reality, substance, meaning, or value. Marked by the absence of human
life, activity, or comfort

A value proves to be "empty" when we can determine it contains nothing. An
object or array that has been instantiated (even with a length value being set)
if no fields have been populated, then it proves to be empty. WeakMaps and
WeakSets are never empty since there is no way to tell if they've ever been
filled. A function is empty when it accepts no parameters. False, null,
undefined, and NaN are all empty as they are the absence of value and often
defaults for some cases.

## Prerequisites
PHP install 😲. And have PHP 5.4 version minimum

## Usage
This is the list

```php
include_once("is-really-empty.php");

var_dump( isEmpty(undefined) ); // bool(true)
var_dump( isEmpty(1) ); // bool(false)
var_dump( isEmpty(NaN) ); // bool(true)
var_dump( isEmpty(null) ); // bool(true)
var_dump( isEmpty("") ); // bool(true)
var_dump( isEmpty(" ") ); // bool(true)
var_dump( isEmpty("1") ); // bool(false)
var_dump( isEmpty([]) ); // bool(true)
var_dump( isEmpty([1]) ); // bool(false)
var_dump( isEmpty(new RandomClass(2)) ); // bool(true)
var_dump( isEmpty( function(){} ) ); // bool(false)
```

## Inspiration
This project was inspired by [an other is-really-empty ](https://github.com/overlandandseas/is-really-empty) project.

## Changelog

### 1.0.0
* Initial release.

## License
MIT License