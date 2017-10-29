<?php

require './CsvClass.php';

$csv_file_path = './sample.csv';

$csv = new CsvClass;
$csv->set($csv_file_path);
var_dump($csv->get());
