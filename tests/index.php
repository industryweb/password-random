<?php

require_once('../src/password-random.php');


use IndustryWeb\PasswordRandom;

$password = new PasswordRandom();

$password
//	->min( 10 )
	->length( 30, 40 )
	->lower( 2, 40 )
//	->upper( 2 )
	->number( 2, 3 )
	->symbol( 2, 3 );

$pass =  $password->generate();

echo $pass ;

echo '<br><br>';

echo strlen($pass);

//$password = new PasswordRandom( 10, 12, 3, 3, 3, 3 );

//echo strlen($password->generate());