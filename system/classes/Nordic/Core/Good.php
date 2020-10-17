<?php

namespace Nordic\Core;

class Good extends \Nordic\Core\Unit
{

    public static $has_good = 3;

    const HAS_GOOD = 1;
    const IS_REAL = 1;

    public static function getGoodStaticInfo()
    {
        return self::IS_REAL;
    }

    public static function getStaticVar()
    {
        return self::$has_good;

    }

    public static function getQuality()
    {
        if (self::getGoodStaticInfo()) {
            $text = "Весь товар сертифицирован.";
        } else {
            $text = "Товар не сертифицирован.";
        }
        echo $text;
    }

    // public function getInfo() {
    //     if (!$this->data) {
    //         $link = mysqli_connect('localhost', 'root', '', 'eshop');
    //         mysqli_set_charset($link, 'utf8');
    //         $result = mysqli_query($link, "SELECT * FROM `core_goods` WHERE id = ".$this->id);
    //         $row = mysqli_fetch_assoc($result);
    //         $this->data = $row;
    //         mysqli_close($link);
    //     }
    //     $this->title = ($this->data)['title'];
    //     $this->price = ($this->data)['price'];
    //     $this->photo = ($this->data)['photo'];
    // }
    public function setTable() 
    {
        return 'core_goods';
    }
    
    public function price() 
    {
        return $this->getField('price');
    }

    public function photo() 
    {
        return $this->getField('photo');
    }

    public function getElements() 
    {
        $connect = new \Nordic\Core\Connect();

        // фильтрация по категориям (разделам)
        $filter = '';
        if (isset($_GET['category_id']) && $category_id = $_GET['category_id']) {
            $filter .= " AND category_id = $category_id";
        }

        //фильтрация по типу товаров
        if (isset($_GET['type']) && $type_id = $_GET['type']) {
            $filter .= " AND type_id = $type_id";
        }

        //фильтрация по новинкам
        if (isset($_GET['is_new']) && $is_new = $_GET['is_new']) {
            $filter .= " AND is_new = $is_new ";
        }

        // расчет товаров на страницу
        $page = 1;
        if ( isset($_GET['page']) ) {
            $page= $_GET['page'];
        }
            // если страница 1, то стартовое значение 0
            // если страница 2, то стартовое значение 4
            // если страница 3, то стартовое значение 8
        $limit = 4; //сколько товаров на странице будет отображаться
        $from = ($page -1)*$limit;
        $result = mysqli_query($connect->getConnection(), "SELECT * FROM " .$this->setTable(). " WHERE id>0 $filter LIMIT $from, $limit");
        return $result;
    }

}