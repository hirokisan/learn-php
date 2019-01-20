<?php

require_once(__DIR__ . '/AbstractProductFactory.php');
require_once(__DIR__ . '/../Class/ProductClass.php');

class ConcreteProductFactory implements AbstractProductFactory
{
    public function create()
    {
        return new ProductClass();
    }
}
