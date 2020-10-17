<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/header/index.php');

// получение данных

$login = $_GET['login'];
$email = $_GET['email'];
$password = password_hash($_GET['password'], PASSWORD_DEFAULT); //на уроке использовали crypt($_GET['password']);
$name = $_GET['name'];


// подключение к БАЗЕ ДАННЫХ и записываем
$connect = new \Nordic\Core\Connect();

// проверяем нового пользователя на существование такого логина и ли email
$result = mysqli_query($connect->getConnection(), "SELECT COUNT(id) as num FROM core_users WHERE login='$login' OR email='$email' ");
$info = mysqli_fetch_assoc($result);
$amount = $info['num'];

if( $amount > 0 ) {
    header('Location:'. $_SERVER['HTTP_REFERER'].'?wrong=1');
} else {
    //создаем новую строчку в таблице
    mysqli_query($connect->getConnection(), "INSERT INTO core_users (login,email,password,name) VALUES ('$login','$email','$password', '$name') ");
    
    $result = mysqli_query($connect->getConnection(), "SELECT * FROM core_users WHERE login='$login' OR email='$login' ");
    $user = mysqli_fetch_assoc($result);
    if ($user['id']) {
        setcookie('user_id', $user['id'], time() + 3600, '/');
        // header('Location: http://localhost/eshop/catalog.php'); вернуться на главную страницу
    }
    ?>
    <div class="wrapper">
        <div class="margin">
            <h2>
                <? echo "$name, вы успешно зарегистрировались. Перейти на "?> <br>
                <a class="orange" href="http://localhost/eshop/catalog.php">ГЛАВНУЮ СТРАНИЦУ</a>
            </h2>
        </div>
        <?php
            require_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/footer/index.php');
        ?>
    </div>
    
<? } ?>





