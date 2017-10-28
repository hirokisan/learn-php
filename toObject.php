<?php

$items = [
    0 => [
        'id' => '1',
        'name' => 'john',
        'age' => 24
    ],
    1 => [
        'id' => '2',
        'name' => 'elen',
        'age' => 32
    ],
];

$items = toObject($items);

var_dump($items);

foreach($items as $item)
{
    echo "<pre>";
    echo "id: " . $item->id;
    echo "<br>";
    echo "name: " . $item->name;
    echo "</pre>";
}

function toObject($array)
{
    $object = json_encode($array);

    $object = json_decode($object);

    return $object;
}

