<?php

$img  = $_POST['img'];

$img  = base64_encode($img);

error_log($img, '3', __DIR__. '/logs/debug.log');

$json['img'] = $img;

$json = json_encode($json);

echo $json;
exit;


