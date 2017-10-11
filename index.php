<?php

class Body
{
    private $name;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

$body = new Body;
$body->setName("Yuji");

echo $body->getName();
