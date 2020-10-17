<?php

include($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');

$test = new \Nordic\Test\Test();
$test->drive();


$good_from_library = new \Library\Good();
$good_from_library->showInfo();

$good_from_core = new \Nordic\Core\Good(1);
echo $good_from_core->price();
