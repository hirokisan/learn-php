<?php

$name = $_POST['name'];
$img  = $_POST['img'];

error_log($name, '3', __DIR__. '/logs/debug.log');

$json['name'] = $name;
$json['img'] = $img;

$json = json_encode($json);

echo $json;
exit;

