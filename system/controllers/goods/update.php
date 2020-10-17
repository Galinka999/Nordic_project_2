<?php

// var_dump($_POST);

var_dump($_FILES);

$id = (int)$_POST['id'];


include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/config.php');


//подготовили массивы полей и значений
$arr_fields = [];
$arr_values = [];

//разбираем все пришедшие данные
foreach ($_POST as $key => $value) {
    if ($key != 'id') {
        $arr_fields[] = $key;
        $arr_values[] = "'" . $value . "'";
    }
    
}

if ($_FILES['photo']['name']) {
    //разделяем название файла на чистое название и расширение
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

    //загрузка файла на сервер
    move_uploaded_file($_FILES['photo']['tmp_name'], '../../../'.$file_full_path);

    $arr_fields[] = 'photo';
    $arr_values[] = "'" . $file_full_path . "'";
}



$str_update='';

for( $i=0; $i < count($arr_fields); $i++ ) {
    $str_update = $str_update . $arr_fields[$i] ."=" . $arr_values[$i]. ","; 
}

$str_update = trim($str_update, ','); // отрезать запятые с краев

// подключение к БАЗЕ ДАННЫХ и записываем
$connect = new \Nordic\Core\Connect();

echo "UPDATE core_goods SET $str_update WHERE id=$id ";
$result = mysqli_query($connect->getConnection(), "UPDATE core_goods SET $str_update WHERE id=$id ");

if ($result) {
    //echo "Ваш товар создан.";
    header('Location: '.$_SERVER['HTTP_REFERER']);  //фдрес предыдущей странички
} else {
    echo "Что-то пошло не так.";
}