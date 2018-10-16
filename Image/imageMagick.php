<?php
$w = 2000;
$h = 2000;

header('Content-type: image/jpeg');

$file = './sample.jpg';
$resize_path = './after.jpg';

$img = new Imagick($file);
$img->setImageCompressionQuality(80);

$img->resizeImage($w, $h, Imagick::FILTER_LANCZOS, 1);
$img->writeImage($resize_path);

