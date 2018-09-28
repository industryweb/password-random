# Password Random

[![PHP from Packagist](https://img.shields.io/packagist/php-v/industryweb/password-random.svg)]()
[![Total Downloads](https://img.shields.io/packagist/dt/industryweb/password-random.svg)](https://packagist.org/packages/industryweb/password-random)
[![License](https://img.shields.io/packagist/l/industryweb/password-random.svg)](https://packagist.org/packages/industryweb/password-random)

Generates a random password using lowercase, uppercase, numbers, and symbols.

## Requirements:  
php  5.4+


## Installation:
You can install the package via composer:

```bash
composer require industryweb/password-generate
```

## Usage:
Use the setters.

```php
use IndustryWeb\PasswordRandom;

$password = new PasswordRandom();

echo $password
	->min( 10 )
	->max( 12 )
	->lower( 3 )
	->upper( 3 )
	->number( 3 )
	->symbol( 3 )
	->generate();

```
Or use the constructor.
```php
use IndustryWeb\PasswordRandom;

$password = new PasswordRandom();

$password = new PasswordRandom( 10, 12, 3, 3, 3, 3 );

echo $password->generate();
```

## License: 
Please see The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
