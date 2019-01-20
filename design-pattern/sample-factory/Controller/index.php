<?php

require(__DIR__ . '/../Factory/UserFactory.php');

$user = UserFactory::create();

$user->do();
