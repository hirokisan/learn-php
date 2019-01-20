<?php

require_once(__DIR__ . '/../Factory/AbstractProductFactory.php');
require_once(__DIR__ . '/../Factory/ConcreteProductFactory.php');

function user(AbstractProductFactory $factory)
{
    return $factory->create();
}

$user = user(new ConcreteProductFactory());
$user->do();
