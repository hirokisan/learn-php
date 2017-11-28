<?php

$flags = '31';
$pos = '5';

$bin = strrev(sprintf("%08d", decbin( $flags )));

var_dump($bin);
var_dump($bin[$pos]);exit;
