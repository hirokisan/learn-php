<?php

$value = [
    'status' => 'true',
];

error_log(print_r($value,true), '3', __DIR__. '/logs/debug.log');

$json = json_encode($value);

echo $json;
exit;
