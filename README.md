# Password Random
Generates a random password using lowercase, uppercase, numbers, and symbols.

## Requirements:  
php  5.4+


## Installation:
You can install the package via composer:

```bash
composer require industryweb/password-generate
```

## Usage:

```php
$password = new \IndustryWeb\PasswordRandom( array(
	'min'     => '15',
	'max'     => '25',
	'lower'   => '3',
	'upper'   => '3',
	'number'  => '3',
	'special' => '3'
) );

echo $password->generate_password();
```

## License: 
Please see The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
