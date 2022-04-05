<?php

return [
    'database' => [
        'driver' => env('DB_DRIVER', 'mysql'),
        'host' => env('DB_HOST', '127.0.0.1'),
        'port' => env('DB_PORT', 3306),
        'charset' => env('DB_CHARSET', 'utf8mb4'),
        'dbname' => env('DB_NAME', 'farm_test'),
        'username' => env('DB_USERNAME', 'root'),
        'password' => env('DB_PASSWORD', 'root'),
    ]
];
