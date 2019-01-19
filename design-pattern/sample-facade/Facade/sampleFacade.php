<?php

require(__DIR__ . '/../Class/sampleClass1.php');
require(__DIR__ . '/../Class/sampleClass2.php');
require(__DIR__ . '/../Class/sampleClass3.php');

class sampleFacade
{
    private $sample1;
    private $sample2;
    private $sample3;

    public function __construct()
    {
        $this->sample1 = new sampleClass1();
        $this->sample2 = new sampleClass2();
        $this->sample3 = new sampleClass3();
    }

    public function run()
    {
        $this->sample1->do();
        $this->sample2->do();
        $this->sample3->do();
    }
}
