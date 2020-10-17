<?php

session_start();

include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/config.php');

// var_dump($_GET);
// var_dump($_SESSION['basket']);

$arr_fields = [];
$arr_values = [];

foreach ($_GET as $key => $value) {
    $arr_fields[] = $key;
    $arr_values[] = "'" . $value . "'";
}
/*
$first_name = $_GET['first_name'];
$first_surname = $_GET['first_surname'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$address_index = $_GET['address_index'];
$city = $_GET['city'];
$doods = json_encode($_SESSION['basket']);
$publ_time = time();
*/

$arr_fields[] = 'goods';
$arr_values[] = "'" . json_encode($_SESSION['basket']) . "'";

$arr_fields[] = 'publ_time';
$arr_values[] = time();

$str_fields = implode(',', $arr_fields);
$str_values = implode(',', $arr_values);



// подключение к БАЗЕ ДАННЫХ и записываем
$connect = new \Nordic\Core\Connect();

$result = mysqli_query($connect->getConnection(), "INSERT INTO core_orders ($str_fields) VALUES ($str_values) ");

if ($result) {
    echo "Ваш заказ успешно оформлен.";?>
    <a href="http://localhost/eshop/basket.php">Вернуться в корзину</a>;
    <!-- header('Location: http://localhost/eshop/basket.php'); -->
<?} else {
    echo "Что-то пошло не так.";
}

//код, который отправит уведомление на телеграмм о новом заказе


//вместо функции, используем классы
$telegram = new \Nordic\Core\Telegram();
$telegram->sendMessage(387343026, 'Вам пришел заказ');
$telegram->sendPhoto(387343026, 'https://www.autocar.co.uk/sites/autocar.co.uk/files/styles/body-image/public/1-corvette-stingray-c8-2019-fd-hr-hero-front_0.jpg?itok=SEYe_vLy');
$telegram->sendLocation(387343026, 51.833507, 107.584125);



//посмотреть данные чат-бота(id и т.п.; скопировать url и вывести в адресной строке)
//https://api.telegram.org/bot1175328333:AAHnbvDUxKUgNpm1BSsXr-8MHVZVIfEBV94/getUpdates

//$chat_id = 387343026;


//выводит сообщение в телегу, когда был сделан заказ
// $text ='<pre>Вам пришел заказ </pre>';
// //<a href="http://localhost/eshop/admin/?table=core_orders">Посмотреть в Личном кабинете</a>
// $url = "https://api.telegram.org/bot1175328333:AAHnbvDUxKUgNpm1BSsXr-8MHVZVIfEBV94/sendMessage?chat_id=$chat_id&text=$text&parse_mode=html";
// file_get_contents($url);  //обращаемся к url

//используем функцию для вывода сообщений
// $text = 'Вам пришел заказ';
// sendMessage($chat_id, $text);
// $text = 'Всем привет';
// sendMessage($chat_id, $text);
// $text = 'Как дела?';
// sendMessage($chat_id, $text);
// function sendMessage($chat_id, $text) {
//     file_get_contents("https://api.telegram.org/bot1175328333:AAHnbvDUxKUgNpm1BSsXr-8MHVZVIfEBV94/sendMessage?chat_id=$chat_id&text=$text&parse_mode=html");
// }

//используем функцию для вывода фото
//$photo= 'https://www.autocar.co.uk/sites/autocar.co.uk/files/styles/body-image/public/1-corvette-stingray-c8-2019-fd-hr-hero-front_0.jpg?itok=SEYe_vLy';
//sendPhoto($chat_id, $photo);
// function sendPhoto($chat_id, $photo) {
//     $url_photo = "https://api.telegram.org/bot1175328333:AAHnbvDUxKUgNpm1BSsXr-8MHVZVIfEBV94/sendPhoto?chat_id=$chat_id&photo=$photo";
//     file_get_contents($url_photo);
// }










