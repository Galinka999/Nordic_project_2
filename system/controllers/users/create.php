<?php

// var_dump($_POST);



include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/config.php');


//подготовили массивы полей и значений
$arr_fields = [];
$arr_values = [];

//разбираем все пришедшие данные
foreach ($_POST as $key => $value) {
    if ($key != 'password') {
        $arr_fields[] = $key;
        $arr_values[] = "'" . $value . "'";
    } 
}

$arr_fields[] = 'password';
$arr_values[] = "'" . password_hash($_POST['password'], PASSWORD_DEFAULT) . "'";

//преобразовали массив в строку, чтобы подставить в запрос
$str_fields = implode(',', $arr_fields);
$str_values = implode(',', $arr_values);


// подключение к БАЗЕ ДАННЫХ и записываем
$connect = new \Nordic\Core\Connect();
echo "INSERT INTO core_users($str_fields) VALUES ($str_values)";
$result = mysqli_query($connect->getConnection(), "INSERT INTO core_users($str_fields) VALUES ($str_values) ");

if ($result) {
    //echo "Новый пользователь создан.";
    header('Location: http://localhost/eshop/admin/?table=core_users');
} else {
    echo "Что-то пошло не так.";
}
