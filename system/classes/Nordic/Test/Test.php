<?php

namespace Nordic\Test;

class Test
{
    public $speed = 60;
    public $weight = 2000;

    public function drive() {
        echo 'Я поехала со скоростью '.$this->speed.' км/ч';
    }

    public function accelerate($speed) {
        $this->speed = $speed;
    }
}
