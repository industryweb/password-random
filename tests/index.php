<?php

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


$password = new PasswordRandom( 10, 12, 3, 3, 3, 3 );

echo $password->generate();