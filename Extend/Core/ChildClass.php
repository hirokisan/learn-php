<?php
namespace Core;

require(__DIR__ . '/BaseClass.php');

class Child extends Base
{
    public function get() {
        return parent::get();
    }
}

