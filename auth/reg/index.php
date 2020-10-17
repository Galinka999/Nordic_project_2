<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/header/index.php');
?>
<div class="wrapper">
    <form class="form-reg" action="../../system/controllers/users/reg.php" method="get">
        <div class="is-bold">
            Заполните пожалуйста форму регистрации:
        </div>
        <div>
            <input required type="text" name="name" placeholder="Ваше имя" />
        </div>
        <div>
            <input required type="text" name="login" placeholder="Логин" />
        </div>
        <div>
            <input required type="text" name="email" placeholder="E-mail" />
        </div>
        <div>
            <input required type="password" name="password" placeholder="Пароль" />
        </div>
        <? if( isset($_GET['wrong']) ) { ?>
            <div class="wrong">
                Пользователь с таким логином или E-mail уже существует
            </div>
        <? } ?>
        <div>
            <button>Зарегистрироваться</button>
        </div>
        <div>
            или <a class="blue is-bold" href="../index.php">Войти</a>
        </div>
    </form>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/footer/index.php');
    ?>
</div>
