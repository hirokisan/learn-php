<?php

$string = " [you]https://www.hello.com[/you]";

preg_match('|(\[you]+)(.*?)(\[/you]+)|is',$string, $string_array);
$string = preg_replace('|(\[you]+)(.*?)(\[/you]+)|is', '', $string);

/* htmlエンティティ処理される場合には、HTMLタグは使えません。
$string = "aaa これからは　それほど<you>https://www.hello.com</you>これからも正解";

preg_match('|<you>(.*?)</you>|is',$string, $string_array);
$string = preg_replace('|<you>(.*?)</you>|is', '', $string);
 */
var_dump(isset($string_array));
var_dump($string_array);
var_dump($string);
var_dump(empty($string));
