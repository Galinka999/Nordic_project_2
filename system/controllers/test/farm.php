<?php
include($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');

$cat = new \Nordic\Test\Cat();
$cat->name();
$cat->eat();
$cat->jump();
$cat->run();
$cat->sleep();

echo '<br>';

$dog = new \Nordic\Test\Dog();
$dog->name();
$dog->eat();
$dog->jump();
$dog->run();
$dog->sleep();

echo '<br>';

$pig = new \Nordic\Test\Pig();
$pig->name();
$pig->eat();
$pig->jump();
$pig->run();
$pig->sleep();

