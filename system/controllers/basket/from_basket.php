<?php

session_start();

// считываем содержимое корзины в буфер(переменную)

if (isset($_SESSION['basket'])) {
    $basket = $_SESSION['basket'];
} else {
    $basket = [];
    $value_arr = [];
}


// получаем id товара, если существует, то выполняем далее 
if ($id = $_GET['id']) {

    // нужно найти элемент с таким значением и удалить его из массива
    if (in_array($id, $basket)) {
        for ( $i = 0; $i < count($basket); $i++ ) {
            // если нашли, то удаляем и выходим 
            if ($basket[$i] == $id) {
                unset($basket[$i]);
                break;
            }
        }
        //сортируем массив
        sort($basket);
    }
   // перезаписываем сессию
   $_SESSION['basket'] = $basket;
  
   // выводим количество товара на экран
   echo count($_SESSION['basket']);   
}