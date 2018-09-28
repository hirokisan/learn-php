<?php

function getYear($input){
    try {
        return new DateTime($input);
    } catch (Exception $e) {
        throw $e;
    }
}

function validation($input){
    try {
        if ($input < 0) {
            throw new Exception("入力値は正のみ受け付けます。");
        }
    } catch (Exception $e) {
        throw $e;
    }
}

try
{
    echo "start\n";
    echo "===\n";
    $time = getYear("2014-8-1");
    validation(-1);
    print_r($time);
}
catch (Exception $e)
{
    echo "例外発生：" . $e->getMessage()."\n";
}
finally
{
    echo "===\n";
    echo "end\n";
}
