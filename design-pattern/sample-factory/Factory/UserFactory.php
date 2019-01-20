<?php

require(__DIR__ . '/../Class/UserClass.php');

class UserFactory
{
    public static function create()
    {
        return new UserClass();
    }
}
