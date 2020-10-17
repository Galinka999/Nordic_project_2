<?php


function classLoader($class) {
    require_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/'.$class.'.php');
}

spl_autoload_register('classLoader');