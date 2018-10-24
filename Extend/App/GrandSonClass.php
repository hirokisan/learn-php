<?php
namespace App;

require(__DIR__ . '/../Core/ChildClass.php');

class GrandSon extends \Core\Child
{
    public function get() {
        return parent::get();
    }
}

