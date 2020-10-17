<?php

session_start();

include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/config.php');

// считываем содержимое корзины в буфер(переменную)
$value_arr = [];
if (isset($_SESSION['basket'])) {
    
    //считаем сумму
    foreach ($_SESSION['basket'] as $value) {
        $connect = new \Nordic\Core\Connect();
        $result = mysqli_query($connect->getConnection(), "SELECT * FROM  core_goods WHERE id=$value ");
        $good= mysqli_fetch_assoc($result);
        $summ = $good['price'];
        $value_arr []= $summ;
        
    }
    // выводим количество товара на экран
    echo array_sum($value_arr) . " руб.";
}   

    
