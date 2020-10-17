<?php

namespace Nordic\Core;

abstract class Unit implements \Nordic\Interfaces\UnitActions
{
    public $id;
    public $data;

    //вызывается автоматически при создании экземпляра класса
    public function __construct($id = null) {
        $this->id = $id;
    }

    /*
    public function getId() {
        $this->id = $id;
    }
    */

    /*найти id по заголовку
    public function getElementByTitle($title) {
            $link = mysqli_connect('localhost', 'root', '', 'eshop');
            mysqli_set_charset($link, 'utf8');
            $result = mysqli_query($link, "SELECT * FROM ".$this->setTable()." WHERE title = '$title'");
            //echo "SELECT * FROM ".$this->setTable()." WHERE title = '$title'";
            $row = mysqli_fetch_assoc($result);
            //момент кэширования
            $this->id = $row['id'];
    }
    */
    // Вызывается в момент, когда пытаемся считать непубличное свойство
    public function __get($name) {
        echo "Произошел доступ к непубличным свойствам<br>";
        return $this->$name;
    }
    // Вызывается в момент, когда пытаемся перезаписать непубличное свойство
    public function __set($name, $value) {
        echo "Попытка изменить непубличное свойство<br>";
        $this->$name = $value;
    }

    public function getTable($table) {
        $this->table = $table;
    }

    public function setTable() {
        return $this->table;
    }

    public function getElements() {
        $connect = new \Nordic\Core\Connect();
        $result = mysqli_query($connect->getConnection(), "SELECT * FROM ".$this->setTable());
        return $result;
    }

    

    public function getData() {
        $link = mysqli_connect('localhost', 'root', '', 'eshop');
        mysqli_set_charset($link, 'utf8');
        $result = mysqli_query($link, "SELECT * FROM ".$this->setTable()." WHERE id = ".$this->id);
        $row = mysqli_fetch_assoc($result);
        //момент кэширования
        $this->data = $row;
    
        mysqli_close($link);
    }

    public function getField($field) {

        if (!$this->data) {
            $this->getData();
        }
        
        return ($this->data)[$field];
    }

    public function title() {
        return $this->getField('title');
    }




}