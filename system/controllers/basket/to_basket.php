<?php

session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/config.php');
// считываем содержимое корзины в буфер(переменную)

if (isset($_SESSION['basket'])) {
    $basket = $_SESSION['basket'];
    
} else {
    $basket = [];
    $value_arr = [];
}



// получаем id товара, если существует, то выполняем далее 
if ($id = $_GET['id']) {
    
    
    
    // $summ_arr = [];
    // проверяем есть ли этот товар в массиве basket, если нет то добавляем в корзину
    if (!in_array($id, $basket)) {
        $basket[] = $id;
        
       }

    

    // перезаписываем сессию
    $_SESSION['basket'] = $basket;
    foreach ($_SESSION['basket'] as $value) {
        $connect = new \Nordic\Core\Connect();
        $result = mysqli_query($connect->getConnection(), "SELECT * FROM  core_goods WHERE id=$value ");
        $good= mysqli_fetch_assoc($result);
        $summ = $good['price'];
        $value_arr []= $summ;
        // array_sum($value_arr);
    }
    

  
    // выводим количество товара на экран
    echo count($_SESSION['basket']); 
    // var_dump($_SESSION['basket']);
    // var_dump(array_sum($value_arr));
    // echo json_encode($summ_arr);

}









