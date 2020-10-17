<?php

    include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/autoload.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/config.php');
    
    require_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/header/index.php');
?>



<?php

    if( isset($_GET['category_id']) ) {
        $category = new \Nordic\Core\Category($_GET['category_id']);
        $cat_name = $category->getField('title');
    } elseif ( isset($_GET['is_new']) ) {
        $is_new = new \Nordic\Core\Good($_GET['is_new']);
        if ( $_GET['is_new'] == 1 )
        $cat_name = 'НОВИНКИ'; 
    } else {
        $cat_name = 'Все товары';
    }

    // удалили в 34 уроке, т.к. создали таблицу в БД categories и класс Category
    // if (isset($_GET['category_id']) && $_GET['category_id'] == 1) {
    //     $cat_name = 'Женщинам';
    // } elseif(isset($_GET['category_id']) && $_GET['category_id'] == 2) {
    //     $cat_name = 'Мужчинам';
    // } elseif(isset($_GET['category_id']) && $_GET['category_id'] == 3) {
    //     $cat_name = 'Детям';
    // } else {
    //     $cat_name = 'Все товары';
    // }
  
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
            <?= $cat_name ?>
        </div>
    </div>
    <h2><?= $cat_name ?></h2>
        <div class="filters flex-box flex-between">
            <div class="filter">
                <div class="filter-title flex-box flex-between">
                    <div> Категория</div>
                    <div class="arrow"  onclick = "clik(event)">
                        <img src="img/icons/down-arrow.png">
                    </div>
                </div>
                <div class="filter-hr"></div>
                <div  class="filter-items">
                    <ul class="filter-title-items">
                        <li>
                            <a href="?type=1<?= isset($_GET['category_id']) ? '&category_id='.$_GET['category_id'] : '' ?>">Куртки</a>
                        </li>
                        <li>
                            <a href="?type=2<?= isset($_GET['category_id']) ? '&category_id='.$_GET['category_id'] : '' ?>">Джинсы</a>
                        </li>
                        <li>
                            <a href="?type=3<?= isset($_GET['category_id']) ? '&category_id='.$_GET['category_id'] : '' ?>">Обувь</a>
                        </li>
                    </ul>
                </div>  
            </div>
            <div class="filter">
                <div class="filter-title flex-box flex-between">
                    <div>Размер</div>
                    <div class="arrow"  onclick = "clik(event)">
                        <img src="img/icons/down-arrow.png">
                    </div>
                </div>
                <div class="filter-hr"></div>
                <div  class="filter-items">
                    <ul class="filter-title-items">
                        <li>
                            <a href="#">до 35</a>
                        </li>
                        <li>
                            <a href="#">35-48</a>
                        </li>
                        <li>
                            <a href="#">49 и выше</a>
                        </li>
                    </ul>
                </div>  
            </div>
            <div class="filter">
                <div class="filter-title flex-box flex-between">
                    <div>Стоимость</div>
                    <div class="arrow"  onclick = "clik(event)">
                        <img src="img/icons/down-arrow.png">
                    </div>
                </div>
                <div class="filter-hr"></div>
                <div  class="filter-items">
                    <ul class="filter-title-items">
                        <li>
                            <a href="#">0-1000 руб.</a>
                        </li>
                        <li>
                            <a href="#">1000-3000 руб.</a>
                        </li>
                        <li>
                            <a href="#">3000-6000 руб.</a>
                        </li>
                        <li>
                            <a href="#">6000-20000 руб.</a>
                        </li>
                    </ul>
                </div>  
            </div>
        </div>
    <!-- сюда подгружаем товары -->
    <div id="catalog">
        
    </div>
    <div class="pagination flex-box flex-center">
        <?php
            $connect = new \Nordic\Core\Connect();

            // фильтрация по категориям (разделам)
            $cat_str = ''; // вспомогательная строчка для категории

            $type_str = ''; // вспомогательная строчка для типов

            $new_str = ''; // вспомогательная строчка для новинок

            $filter = '';
            if (isset($_GET['category_id']) && $category_id = $_GET['category_id']) {
                $filter .= " AND category_id = $category_id";
                $cat_str = "&category_id=$category_id";
            }

            // фильтрация по типу товара
            if (isset($_GET['type']) && $type_id = $_GET['type']) {
                $filter .= " AND type_id = $type_id";
                $type_str = "&type=$type_id";
            }

            // фильтрация по новинкам
            if (isset($_GET['is_new']) && $is_new = $_GET['is_new']) {
                $filter .= " AND is_new = $is_new";
                $new_str = "&is_new=$is_new ";
            }
            
            $result = mysqli_query($connect->getConnection(), "SELECT COUNT(id) as num FROM core_goods WHERE id>0 $filter");
            $info = mysqli_fetch_assoc($result);
            $amount = $info['num'];
            $per_page = 4;
            $pages_amount = ceil($amount/$per_page);
            $page = 1;
            if ( isset($_GET['page']) ) {
                $page = $_GET['page'];
            }
        ?>
        <? for ($i = 1; $i <= $pages_amount;  $i++) {?>
            <div class="box <? if ($i == $page) {?> page-activ <?}?>">
                <a href="?page=<?= $i ?><?= $cat_str ?><?= $type_str ?><?= $new_str ?>">
                    <?= $i ?>
                </a>
            </div>
        <?}?>
    </div>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/footer/index.php');
    ?>
</div>

<script src="js/script.js"></script>