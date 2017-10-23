<?php

$records = array(
    0 => [
        array(
            'id' => 2135,
            'first_name' => 'John',
            'last_name' => 'Doe',
        ),
        array(
            'id' => 3245,
            'first_name' => 'Sally',
            'last_name' => 'Smith',
        ),
        array(
            'id' => 5342,
            'first_name' => 'Jane',
            'last_name' => 'Jones',
        ),
        array(
            'id' => 5623,
            'first_name' => 'Peter',
            'last_name' => 'Doe',
        )
    ],
    1 => [
        array(
            'id' => 235,
            'first_name' => 'John',
            'last_name' => 'Doe',
        ),
        array(
            'id' => 345,
            'first_name' => 'Sally',
            'last_name' => 'Smith',
        ),
        array(
            'id' => 542,
            'first_name' => 'Jane',
            'last_name' => 'Jones',
        ),
        array(
            'id' => 523,
            'first_name' => 'Peter',
            'last_name' => 'Doe',
        )
    ],
);

foreach($records as $record)
{
    $first_names[] = array_($record, 'first_name');
}
print_r($first_names);
