<?php

return [
    'session_cookie_name' => 'LSESSID', //default LSSESSID
    'session_cookie_expire' => 60, //default 60 min
    'shipping_costs' => [
        'type' => 'count', //count|price
        'count' => [
            '0|2' => 1.99,
            '2|4' => 4.99,
            '4|10' => 9.99,
            '10|*' => 19.99
        ],
        'price' => [
            '0|19.99' => 1.99,
            '20|*' => 0,
        ]
    ]
];