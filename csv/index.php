<?php

require './CsvClass.php';

$csv_file_path = './sample.csv';

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
