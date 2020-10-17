<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/config.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/header/index.php');

$good = new \Nordic\Core\Good($_GET['id']);

?>

<?php
        $category = new \Nordic\Core\Category($good->getField('category_id'));
        $cat_name = $category->getField('title');

        $type = new \Nordic\Core\Type($good->getField('type_id'));
        $type_name = $type->getField('title');
?>

<div class="wrapper">
    <div class="breadcrumps flex-box">
        <div>
            <a href="index.php">
                Главная
            </a>
            /
        </div>
        <div>
            <a href="catalog.php?category_id=<?=$good->getField('category_id')?>">
                <?= $cat_name ?>
            </a>
            /
        </div>
        <div>
            <a href="catalog.php?category_id=<?=$good->getField('category_id')?>&type=<?=$good->getField('type_id')?>">
                <?= $type_name ?>
            </a>
            /
        </div>
        <div>
            <?=$good->getField('title')?>
        </div>
    </div>
    <div class="item-card">
        <div class="item-photo-card">
            <img src="<?= $good->photo() ?>" />
        </div>
        <div>
            <b>
                <h2>
                    <?= $good->title() ?>
                </h2>
            </b>
        </div>
        <div>
            <p class="center text-card grey">
                Артикул: <?= $good->getField('articul') ?>
            </p>
        </div>
        <div>
            <p class="center text-card payment-text-price">
                <?= $good->price() ?> руб.
            </p>
        </div>
        <div>
            <p class="center text-card description">
                <?= $good->getField('description') ?>
            </p>
        </div>
        <div>
            <h4 class="center">РАЗМЕР</h4>
            <div class="pagination flex-box flex-center">
                <div class="box page-activ">38</div>
                <div class="box page-activ">39</div>
                <div class="box page-activ">40</div>
                <div class="box page-activ">41</div>
            </div>
        </div>
        <div onclick="toBasket()" class="btn-clear-basket">
            Добавить в корзину
        </div>
    </div>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/footer/index.php');
    ?>
</div>
<script src="js/script.js"></script>

