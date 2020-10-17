<?php

include($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');
/*
include($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/Sprinting.php');
include($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/Jumping.php');
include($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/Throwing.php');

include($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/Sprinter.php');
include($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/Jumper.php');
include($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/Thrower.php');
include($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/Decathlete.php');
*/

$sprinter = new \Nordic\Test\Sprinter();
$sprinter->sprinting();

echo '<br>';

$jumper = new \Nordic\Test\Jumper();
$jumper->jump();

echo '<br>';

$thrower = new \Nordic\Test\Thrower();
$thrower->throw();

echo '<br>';

$decathlete = new \Nordic\Test\Decathlete();
$decathlete->sprinting();
echo '<br>';
$decathlete->jump();
echo '<br>';
$decathlete->throw();
