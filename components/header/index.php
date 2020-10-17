<?php
    include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/config.php');

    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/eshop/css/style.css">
    <!-- <title>Document</title> -->
</head>
<body>
    <div class="wrapper">
        <header class="flex-box flex-between">
                <div class="menu flex-box flex-between">
                    <div class="logo">
                        <img src="/eshop/img/icons/logo.jpg" alt="Логотип">
                    </div>
                    <div class="top-menu flex-box flex-between flex-align-items">
                        <div>
                            <a class = "<?if(isset($_GET['category_id']) && $_GET['category_id'] == 1) {?> is-bold <?}?>" href="/eshop/catalog.php?category_id=1">Женщинам</a>
                        </div>
                        <div>
                            <a class = "<?if(isset($_GET['category_id']) && $_GET['category_id'] == 2) {?> is-bold <?}?>" href="/eshop/catalog.php?category_id=2">Мужчинам</a>
                        </div>
                        <div>
                            <a class = "<?if(isset($_GET['category_id']) && $_GET['category_id'] == 3) {?> is-bold <?}?>" href="/eshop/catalog.php?category_id=3">Детям</a>
                        </div>
                        <div>
                            <a class = "<?if(isset($_GET['is_new']) && $_GET['is_new'] == 1) {?> is-bold <?}?>" href="/eshop/catalog.php?is_new=1">Новинки</a>
                        </div>
                        <div>
                            <a href="index.php">О нас</a>
                        </div>                                            
                    </div>
                </div>
                <div class="nav-user flex-box flex-between flex-align-items">
                    <div class="user flex-box flex-align-items">
                        <div class="user-logo">
                            <img src="/eshop/img/icons/account.png" alt="Логотип">
                        </div>
                        <? if(isset($_COOKIE['user_id'])) { ?>
                            Привет, <?= (new \Nordic\Core\User($_COOKIE['user_id']))->getField('name') ?> (<a class="orange" href="system/controllers/users/logout.php">выйти</a>)
                        <? } else {?>
                            <a href="auth/index.php">
                                Вoйти
                            </a>
                        <? } ?>
                    </div>
                    <div class="basket flex-box flex-align-items">
                        <div class="user-logo">
                            <img src="/eshop/img/icons/basket.png" alt="Корзина">
                        </div>
                        <a href="basket.php">
                            Корзина (<span id="basket-count">
                            <?php if(isset($_SESSION['basket'])) {
                                        echo count($_SESSION['basket']);
                                    } else {
                                        echo 0;
                                    }
                            ?></span>)
                        </a>
                    </div>
                </div>
        </header>
        <div class="hr"></div>
    </div>
</body>
</html>