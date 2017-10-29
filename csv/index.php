<?php

/**
 * When you use CLI, pay attention to current dir
 * check current dir: getcwd()
 */

require __DIR__ . '/CsvClass.php';

$csv_file_path = __DIR__ . '/sample.csv';

/**
 * Instance: use "try {} catch () {}"
 * Class   : throw exeption
 */
$csv = new CsvClass;
try
{
    $csv->set($csv_file_path);
    var_dump($csv->get());
}
catch ( Exception $e )
{
    print $e->getMessage();
    error_log($e->getMessage());
}
