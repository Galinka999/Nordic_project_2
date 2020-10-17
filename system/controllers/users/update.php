<?php

// var_dump($_POST);

// var_dump($_FILES);

$id = (int)$_POST['id'];


include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/config.php');

        $connect = new \Nordic\Core\Connect();
        $result = mysqli_query($connect->getConnection(), "SELECT * FROM  core_users WHERE id=$id ");
        $user= mysqli_fetch_assoc($result);
        var_dump($user['password']);
        

//подготовили массивы полей и значений
$arr_fields = [];
$arr_values = [];


//разбираем все пришедшие данные
foreach ($_POST as $key => $value) {
    if ($key != 'id') {
        $arr_fields[] = $key;
        $arr_values[] = "'" . $value . "'";
    } 
    
    if( $key == 'password' &&  $value != $user['password']) {
        $arr_fields[] = $key;
        $arr_values[] = "'" . password_hash($_POST['password'], PASSWORD_DEFAULT) . "'";
    }
}



$str_update='';

for( $i=0; $i < count($arr_fields); $i++ ) {
    $str_update = $str_update . $arr_fields[$i] ."=" . $arr_values[$i]. ","; 
}

$str_update = trim($str_update, ','); // отрезать запятые с краев

// подключение к БАЗЕ ДАННЫХ и записываем
$connect = new \Nordic\Core\Connect();

// echo "UPDATE core_users SET $str_update WHERE id=$id ";
$result = mysqli_query($connect->getConnection(), "UPDATE core_users SET $str_update WHERE id=$id ");

if ($result) {
    //echo "Ваш товар создан.";
    header('Location: '.$_SERVER['HTTP_REFERER']);  //фдрес предыдущей странички
} else {
    echo "Что-то пошло не так.";
}
