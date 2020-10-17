<?php

    include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/config.php');
?>
<footer class="wrapper">
    <div class="flex-box flex-between margin-top">
        <div class="footer-column">
            <div class="is-bold">КОЛЛЕКЦИИ</div>
            <div>
            <?php
            $connect = new \Nordic\Core\Connect();
            $categories = mysqli_query($connect->getConnection(), "SELECT * FROM categories");
            while($category = mysqli_fetch_assoc($categories)) {
                $count = mysqli_query($connect->getConnection(), "SELECT COUNT(*) as num FROM core_goods WHERE category_id=".$category['id']);
                $info = mysqli_fetch_assoc($count);
            ?>
                <div>
                    <a href="/eshop/catalog.php?category_id=<?= $category['id']?>">
                        <?= $category['title']?> (<?= $info['num']?>)
                    </a>
                </div>
            <?}?>
            <?php
                $count = mysqli_query($connect->getConnection(), "SELECT COUNT(*) as num FROM core_goods WHERE is_new=1");
                $info = mysqli_fetch_assoc($count);
            ?>
            <div>
                <a href="/eshop/catalog.php?is_new=1">
                    Новинки (<?= $info['num']?>)
                </a>
            </div>
            </div>
        </div>
        <div class="footer-column footer-column-center">
            <div class="is-bold">МАГАЗИН</div>
            <div>
                <div><a href="http://localhost/eshop/index.php">О нас</a></div>
                <div><a href="#">Доставка</a></div>
                <div><a href="#">Работай с нами</a></div>
                <div><a href="#">Контакты</a></div>
            </div>
        </div>
        <div class="footer-column footer-column-rigth">
            <div class="is-bold">МЫ В СОЦИАЛЬНЫХ СЕТЯХ</div>
            <div>
                <div>Сайт разработан в inordic.ru</div>
                <div>2020 &#169; Все права защищены</div>
            </div>
            <div class="social flex-box flex-between">
                <img src="/eshop/img/icons/facebook.png" class="cursor">
                <img src="/eshop/img/icons/twitter.png" class="cursor">
                <img src="/eshop/img/icons/instagram.png" class="cursor">
            </div>    
        </div>
    </div>
</footer>
<script src="js/script.js"></script>