<?php

return [
    'redis' => [
        'host' => env('REDIS_HOST', '127.0.0.1'),
        'port' => env('REDIS_PORT', 6379),
        'database' => env('REDIS_DATABASE', 0),
        'password' => env('REDIS_PASSWORD', ''),
    ]
];
