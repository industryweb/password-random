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


$random = new PasswordRandom();

// Set our min and max then generate.
$password = $random->length(16, 18)
    ->lower(2)
    ->upper(2)
    ->number(2)
    ->symbol(2)
    ->generate();

//  Display password.
echo $password . '<br><br>';

// Display character count.
echo 'Total Characters: '.strlen($password);

```

## License: 
(MIT) License. 

Please see [License File](LICENSE.md) for more information.
