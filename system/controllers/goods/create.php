<?php

// var_dump($_POST);

//var_dump($_FILES);



include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/config.php');


//подготовили массивы полей и значений
$arr_fields = [];
$arr_values = [];

//разбираем все пришедшие данные
foreach ($_POST as $key => $value) {
    $arr_fields[] = $key;
    $arr_values[] = "'" . $value . "'";
}

//разделяем название файла фото на чистое название и расширение
$file_name_info = explode('.', $_FILES['photo']['name']);
//чистое название файла
$file_pure_name = $file_name_info[0];
//расширение
$file_ext = $file_name_info[1];
//уникальная сгенерированная строка
$hash = md5($file_pure_name . time());
//конкатинируем новое уникальное имя файла
$file_new_name = $file_pure_name . '_' . $hash . '.' . $file_ext;

//имя как будет сохраняться в БД
$file_full_path = 'img/catalog/'.$file_new_name;

//загрузка файла на сервер в папку
move_uploaded_file($_FILES['photo']['tmp_name'], '../../../'.$file_full_path);

$arr_fields[] = 'photo';
$arr_values[] = "'" . $file_full_path . "'";

//преобразовали массив в строку, чтобы подставить в запрос
$str_fields = implode(',', $arr_fields);
$str_values = implode(',', $arr_values);


// подключение к БАЗЕ ДАННЫХ и записываем
$connect = new \Nordic\Core\Connect();

$result = mysqli_query($connect->getConnection(), "INSERT INTO core_goods($str_fields) VALUES ($str_values) ");

if ($result) {
    //echo "Ваш товар создан.";
    header('Location: http://localhost/eshop/admin/?table=core_goods');
} else {
    echo "Что-то пошло не так.";
}
