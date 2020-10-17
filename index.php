<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/about.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/header/index.php');
    /*
    include($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/Connect.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/UnitActions.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/Unit.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/SchowArticleInfo.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/eshop/system/classes/Article.php');
    */
     
    // $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // mysqli_set_charset($link, 'utf8');
    $result = (new \Nordic\Core\Article())->getElements();
    //mysqli_close($link);
?>

<div class="wrapper">
    <div>
        <h1>Новые поступления весны</h1>
        <p class="text lobster">Мы подготовили для Вас лучшие новинки сезона</p>
        <a href="http://localhost/eshop/catalog.php?is_new=1">
            <button class="btn-new">
                посмотреть новинки
            </button>
        </a>
    </div>
    <div class="flex-box article-flex">
        <? while($row = mysqli_fetch_assoc($result)){ ?>
        <? $article = new \Nordic\Core\Article($row['id']);
            //$article->getElementByTitle('Джинсовые куртки'); - ищем id по названию
            //$article->getId($row['id']);
            // $article = new Unit();
            // $article->getId($row['id']);
            // $article->getTable('core_articles');
        ?>
            <div class="article" style="background-image: url('<?= $article->getField('photo') ?>')">
                <div>
                    <? if($row['symbol'] == 3) {
                        $symbol = 'article-title-symbol';
                    } elseif ($row['symbol'] == 2) {
                        $symbol = 'article-price-symbol';
                    } elseif ($row['symbol'] == null) {
                        $symbol = '';
                    }?>
                        <div class= "<?= $symbol ?>">
                        </div>
                        <div class="article-title is-bold">
                            <?= $article->title() ?>
                        </div>
                    
                    <div class="article-price">
                        <?= $row['price'] ?>
                    </div>
                    <div class="article-description italic">
                        <?= $row['description'] ?>
                    </div>
                </div>   
            </div>
        <?} ?>
    </div>
    <div class="margin-top">
        <h2>Будь всегда в курсе выгодных предложений</h2>
        <p class="text lobster">подписывайся и следи за новинками и выгодными предложениями.</p>
        <div class="recording-new display-block">
            <form class="recording-new inline-block" action="system/controllers/users/new.php" method="get">
                <input required type="email" name="email" placeholder="e-mail" />
                <button>записаться</button>
            </form>
        </div>
    </div>
</div>
<div class="wrapper border">
        <div id="map"></div>
</div>
<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/footer/index.php');
?>


