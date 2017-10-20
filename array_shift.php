<?php

$array = [
    0 => [
        'name' => 'elsa',
        'age' => '35',
    ],
    1 => [
        'name' => 'kengo',
        'age' => '20',
    ],
];

var_dump($array);
$array_shifted = array_shift($array);

var_dump($array_shifted);
