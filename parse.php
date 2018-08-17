<?php

$url = '/hokkaido/sapporo/price/?lm=30&lt=image';

$uri = parse_url($url);
var_dump($uri);

$paramString = $uri['query'];

// HTMLエンティティを文字列に変換する
$paramString = htmlspecialchars($paramString);
var_dump($paramString);

// HTMLエンティティを文字列に変換する
$paramString = htmlspecialchars_decode($paramString);
var_dump($paramString);

parse_str($paramString, $params);
var_dump($params);

$excludeParams = ['lm'];
$addParams     = [
    'lm' => '30'
];

// 指定したパラメータを削除する
$params = array_diff_key($params, array_flip($excludeParams));

// 指定したパラメータを追加する
$params = array_merge($params, $addParams);
var_dump($params);

// クエリパラメータを生成する
$paramString = http_build_query($params);
var_dump($paramString);
