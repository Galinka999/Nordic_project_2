<?

require_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/header/index.php');

?>

<div class="wrapper">
    <div class="basket-container-items">
    <? if (isset($_SESSION['basket']) && count($_SESSION['basket'])) { ?>
        <h2>ВАША КОРЗИНА</h2>
        <p class="text lobster">Товары резервируются на ограниченное время</p>
        <div class="basket-table-name flex-box flex-between is-bold">
            <div class=" flex-box flex-between">
                <p class="basket-table-photo">фото</p>
                <p>наименование</p>
            </div>
            <div class="basket-length flex-box">
                <p>размер</p>
                <p>количество</p>
                <p>стоимость</p>
                <p>удалить</p>
            </div>
        </div>
        <?php   $arr = []; 
                $value_arr = []; ?> 
        <? foreach($_SESSION['basket'] as $id){ ?>
            <? $good = new \Nordic\Core\Good($id); ?>
            <div class="basket-item flex-box flex-between">
                <div class="flex-box flex-align-items">
                    <div class="basket-item-photo">
                        <img src="<?= $good->photo() ?>" />
                    </div>
                    <div>
                        <a class="good-name is-bold" href="card.php?id=<?= $good->getField('id')?>" >
                            <?= $good->title() ?>
                        </a>
                        <div>
                            арт. <?= $good->getField('articul') ?> 
                        </div>
                    </div>
                </div>
                <div class="basket-item-info basket-length flex-box flex-align-items">
                    <div>
                        <?= $a = $good->price(); 
                            array_push($arr, "$a");
                        ?> руб.
                    </div>
                    <div class="good-delete">
                        <img data-id="<?= $id ?>" onclick="fromBasket()" src="/eshop/img/icons/clear.png" />
                        
                    </div>
                </div>
            </div>
        <?} ?>
        <div class="sum basket-length flex-box is-bold">
            <div>
                Итого:
            </div>
            <div class="orange" id="basket-sum" >
                <?php if ( $arr ) {
                    echo array_sum($arr) . " руб.";
                } elseif (isset($_SESSION['basket'])) {
                    echo array_sum($value_arr) . " руб.";
                } ?>
            </div>
        </div>

    <div class="btn-clear-basket is-bold" >
        <a href="system/controllers/basket/clear_basket.php">Очистить корзину</a>
    </div>
    
    <div class="separation">
        <img src="/eshop/img/icons/zigzag.png">
    </div>

    <div>
        <form  action="system/controllers/orders/create.php" method="get">
            <div class="delivery">
                <h1>АДРЕС ДОСТАВКИ</h1>
                <p class="text lobster">Все поля обязательны для заполнения</p>
                <div class="form-delivery">
                    <select name="delivery_method" required >
                        <option hidden>ВЫБЕРИТЕ ВАРИАНТ ДОСТАВКИ:</option>
                            <optgroup label="Для регионов">
                                <option value="post">Почта России</option>
                                <option value="express">Express доставка</option>
                            </optgroup>
                            <optgroup label="Для Москвы">
                                <option value="curier" selected>Курьерская служба - 500 руб.</option>
                            </optgroup>
                    </select>
                    <div class="delivery-item flex-box">
                        <label>
                            Имя 
                            <input required type="text" name="first_name" />
                        </label>
                        <label>
                            Фамилия
                            <input required type="text" name="first_surname" />
                        </label>
                    </div>
                    <div class="delivery-address">
                        <label>
                            Адрес
                            <input required type="text" name="address" />
                        </label>
                    </div>
                    <div class="delivery-item flex-box">
                        <label>
                            Город
                            <input required type="text" name="city" />
                        </label>
                        <label>
                            Индекс
                            <input required type="text" name="address_index" />
                        </label>
                    </div>
                    <div class="delivery-item flex-box">
                        <label>
                            Телефон
                            <input required type="phone" name="phone" />
                        </label>
                        <label>
                            E-mail
                            <input required type="email" name="email" />
                        </label>
                    </div>
                </div>
            </div>
            <div class="separation">
                <img src="/eshop/img/icons/zigzag.png">
            </div>
            <div class="payment">
                <h1>ВАРИАНТЫ ОПЛАТЫ</h1>
                <p class="text lobster">Все поля обязательны для заполнения</p>
                <div class="payment-text flex-box">
                    <div class="is-bold">
                        Стоимость:     
                    </div>
                    <div id="basket-total" class="payment-text-price" >
                        <?php if ( $arr ) {
                            echo array_sum($arr) . " руб.";
                        } elseif (isset($_SESSION['basket'])) {
                            echo array_sum($value_arr) . " руб.";
                        } ?>
                    </div>
                </div>
                <div class="payment-text flex-box">
                    <div class="is-bold">
                        Доставка:   
                    </div>
                    <div class="payment-text-price">500 руб.</div>
                </div>
                <div class="payment-text flex-box orange">
                    <div class="is-bold">
                        Итого:
                    </div>
                    <div id="basket-total-delivery" class="payment-text-price">
                        <?php if ( $arr ) {
                            $sum = array_sum($arr) + 500;
                            echo $sum . " руб.";
                        } elseif (isset($_SESSION['basket'])) {
                            echo array_sum($value_arr);
                        }?>
                    </div>
                </div>
                <div class="form-delivery">
                    <select required >
                        <option hidden>ВЫБЕРИТЕ СПОСОБ ОПЛАТЫ:</option>
                            <option value="card" selected>Банковская карта</option>
                            <option value="express">Электронный кошелек</option>
                            <option value="curier" >Счет на оплату</option>
                    </select>
                </div>
                <button class="btn-clear-basket is-bold" >
                    Заказать
                </button>
            </div>
        </form>
    </div>
          

    <? } else { ?>
        <div class="clear-basket is-bold">
            <h2 >Ваша корзина пуста</h2>
        </div>
    <? } ?>
        
    </div>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/eshop/components/footer/index.php');
    ?>
</div>