<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/header/index.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/config.php');

// получение данных

$email = $_GET['email'];


// подключение к БАЗЕ ДАННЫХ и записываем
$connect = new \Nordic\Core\Connect();
$result = mysqli_query($connect->getConnection(), "INSERT INTO mailing_users (email) VALUES ('$email')");

if( $result ) {
    // header('Location:'. $_SERVER['HTTP_REFERER'].'?user=mailing_users');

    ?>
    <div class="wrapper">
        <div class="margin">
            <h2>
                <? echo "Вы успешно подписались на рассылку сообщений. Перейти на "?> <br>
                <a class="orange" href="http://localhost/eshop/catalog.php">ГЛАВНУЮ СТРАНИЦУ</a>
            </h2>
        </div>
    </div>
<?} else {
    echo 'что-то пошло не так';
} ?>
<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/footer/index.php');
?>