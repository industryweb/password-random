<?php

require_once('../src/password-random.php');


use IndustryWeb\PasswordRandom;

$password = new PasswordRandom();

$password
	->length( 30, 40 )
	->lower( 2, 40 )
//	->upper( 2 )
	->number( 2, 3 )
	->symbol( 2, 3 );

echo $password->generate();

echo '<br><br>';

echo strlen( $password->generate() );