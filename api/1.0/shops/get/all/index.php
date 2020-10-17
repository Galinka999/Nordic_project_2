
<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/config.php');


$connect = new \Nordic\Core\Connect();

$arr=[];

$result = mysqli_query($connect->getConnection(), "SELECT * FROM core_shops");
while ($info = mysqli_fetch_assoc($result)) {
    $arr_item=[];
    $arr_item['title']=$info['title'];
    $arr_item['description']=$info['description'];
    $arr_item['latitude']=$info['latitude'];
    $arr_item['longitude']=$info['longitude'];
    $arr_item['photo']=$info['photo'];
    $arr_item['address']=$info['address'];
    
    $arr[] = $arr_item;
}

echo json_encode($arr);