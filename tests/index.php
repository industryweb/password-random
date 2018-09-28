<?php

include_once '../src/password-random.php';

$password = new IndustryWeb\PasswordRandom( array(
	'min'     => '15',
	'max'     => '25',
	'lower'   => '3',
	'upper'   => '3',
	'number'  => '3',
	'special' => '3'
) );

echo $password->generate();