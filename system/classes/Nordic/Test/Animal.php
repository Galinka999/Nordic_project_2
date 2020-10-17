<?php

namespace Nordic\Test;

abstract class Animal implements \Nordic\Test\Test_interfaces\Eat, \Nordic\Test\Test_interfaces\Jump,
                                 \Nordic\Test\Test_interfaces\Run, \Nordic\Test\Test_interfaces\Sleep
{
    
    public function eat(){
        echo ' кушает,';
    }
    public function jump() {
        echo ' прыгает,';
    }
    public function run() {
        echo ' бежит,';
    }
    public function sleep() {
        echo ' спит.';
    }

}