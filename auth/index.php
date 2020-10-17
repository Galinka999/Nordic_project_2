<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/header/index.php');
?>

<div class="wrapper">
    <form class="form-reg" action="../system/controllers/users/auth.php" method="get">
        <div class="is-bold">
            Войти в личный кабинет:
        </div>
        <div>
            <input required type="text" name="login" placeholder="Логин или E-mail" />
        </div>
        <div>
            <input required type="password" name="password" placeholder="Пароль" />
        </div>
        <? if( isset($_GET['wrong']) ) { ?>
            <div class="wrong">
                Неверный логин или пароль
            </div>
        <? } ?>
        <div>
            <button>Войти</button>
        </div>
        <div>
            или <a class="blue is-bold" href="reg/index.php"> Зарегистрироваться </a>
        </div>
    </form>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/footer/index.php');
    ?>
</div>