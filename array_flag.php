<?php

$list1 = [
    0 => (object)[
        'title' => 'only',
        'url' => 'hello',
        'time' => time()
    ],
    1 => (object)[
        'title' => 'on',
        'url' => 'hello',
        'time' => time()
    ],
];

$list2 = [
    0 => (object)[
        'title' => 'on',
        'url' => 'hello',
        'sort' => 1,
        'time' => time()
    ],
    1 => (object)[
        'title' => 'only',
        'url' => 'hell',
        'sort' => 3,
        'time' => time()
    ],
    2 => (object)[
        'title' => 'nly',
        'url' => 'hell',
        'sort' => 2,
        'time' => time()
    ],
    3 => (object)[
        'title' => 'o',
        'url' => 'hell',
        'sort' => 4,
        'time' => time()
    ],
];

// 連想配列内の値をキーとしてソートする
// オブジェクトでもソートできる
foreach($list2 as $key => $value)
{
    $sort[$key] = $value->sort;
}
array_multisort($sort, SORT_ASC, $list2);
var_dump($list2);

//foreach($list1 as $key => $value)
//{
//    $flag = true;
//    foreach($list2 as $k => $v)
//    {
//        if($value->title == $v->title && $value->url != $v->url)
//        {
//            $flag = false;
//        }
//    }
//    //var_dump($flag);
//}
//
//$list2 = array_slice($list2, 0, 3);
//var_dump($list2);
