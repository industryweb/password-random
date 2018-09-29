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

$password = new PasswordRandom();

$password
	->length( 30, 40 )
	->lower( 2, 40 )
	->upper( 2, 40 )
	->number( 2, 3 )
	->symbol( 2, 3 );
	
echo $password;

```

## License: 
Please see The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
