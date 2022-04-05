<?php

return [
    'server' => [
        'mode' => env('SERVER_MODE', 2),
        'host' => env('SERVER_HOST', '0.0.0.0'),
        'port' => env('SERVER_PORT', 9501),
        'enable_coroutine' => env('SERVER_COROUTINE', true),
        'worker_num' => env('SERVER_WORKER_NUM', 16),
        'debug' => env('APP_DEBUG', false),
        'name' => env('SERVER_NAME', 5),
    ],
];
