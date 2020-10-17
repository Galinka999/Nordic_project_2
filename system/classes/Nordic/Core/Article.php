<?php

namespace Nordic\Core;

class Article extends \Nordic\Core\Unit implements \Nordic\Interfaces\SchowArticleInfo
{
    //переопределение метода
    public function setTable() {
        return 'core_articles';
    }

    public function price() {
        return $this->getField('price');
    }
    public function photo() {
        return $this->getField('photo');
    }
    public function title() {
        return $this->getField('title');
    }
    public function description() {
        return $this->getField('description');
    }

}