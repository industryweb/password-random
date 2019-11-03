<?php


use IndustryWeb\PasswordRandom;

// Include class.
include "../src/PasswordRandom.php";

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