<?php

// 目的の画像から幅、高さを取得し,半分の値を計算します。
list($width, $height) = getimagesize("./sample.jpg");
$new_width = $width * 0.5;
$new_height = $height * 0.5;

// 画像を読み込み再サンプリングして1/4に縮小します。
$image_p = imagecreatetruecolor($new_width, $new_height);
$image = imagecreatefromjpeg("./sample.jpg");
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

// 出力
imagejpeg($image, './after.jpg', 100);
