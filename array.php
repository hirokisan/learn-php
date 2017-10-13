<?php

$rows = [
    'aa'=> [
        0 => [ 'id' => 40, 'title' => 'dave', 'comment' => 'Hello, world!'],
        1 => [ 'id' => 10, 'title' => 'alice', 'comment' => '你好，世界！'],
        2 => [ 'id' => 30, 'title' => 'charlie', 'comment' => 'こんにちは、世界！' ],
        3 => [ 'id' => 20, 'title' => 'bob', 'comment' => 'Salve , per omnia saecula !' ],
    ],
    'bb'=> [
        0 => [ 'id' => 40, 'title' => 'dave', 'comment' => 'Hello, world!'],
        1 => [ 'id' => 10, 'title' => 'alice', 'comment' => '你好，世界！'],
        2 => [ 'id' => 30, 'title' => 'charlie', 'comment' => 'こんにちは、世界！' ],
        3 => [ 'id' => 20, 'title' => 'bob', 'comment' => 'Salve , per omnia saecula !' ],
    ],
];

foreach($rows as $row)
{
    var_export(array_column($row, 'id'));
}
