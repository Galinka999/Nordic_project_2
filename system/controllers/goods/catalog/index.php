<?php

    include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');
    /*
    include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/Connect.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/UnitActions.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/Unit.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/Good.php');
    */
    include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/config.php');
    
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    mysqli_set_charset($link, 'utf8');

    $result = (new \Nordic\Core\Good())->getElements();
    
   
?>

<div class="wrapper">
    <div class="flex-box">
        <? while($row = mysqli_fetch_assoc($result)){ ?>
            <? $good = new \Nordic\Core\Good($row['id']); ?>
            <div class="item">
                <div class="item-photo">
                    <img src="<?= $good->photo() ?>" />
                </div>
                <div>
                    <b>
                        <p class="item-title">
                            <a href="card.php?id=<?= $good->getField('id')?>" >
                                <?= $good->title() ?>
                            </a>
                        </p>
                    </b>
                </div>
                <div>
                    <p>
                        <?= $good->price() ?> руб.
                    </p>
                </div>
                <!-- <div> Тренируемся со статическими свойствами и методами
                    <?= \Nordic\Core\Good::getQuality() ?>
                </div>
                <div>
                    <? if(\Nordic\Core\Good::HAS_GOOD) {?>
                        Ограниченное количество.
                    <? } ?>
                </div>
                <div>
                    <? if(\Nordic\Core\Good::$has_good) {?>
                        В наличии <?= \Nordic\Core\Good::getStaticVar() ?> шт.
                    <? } ?>
                </div> -->
            </div>
        <?} ?>
    </div>
</div>




