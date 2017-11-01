<?php

$str = 'aaa<br /><br /><br /><br />aaa';
$str = preg_replace('/<br \/>((<br \/>)+)/', '<br>', $str);
echo $str;
