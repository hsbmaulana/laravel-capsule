<?php

return [

    'default' => env('CACHE_DRIVER', 'redis'),

    'prefix' => env('APP_NAME') . '_' . 'cache',

    'stores' => [

        'array' => [ 'driver' => 'array', 'serialize' => false, ],
        'file' => [ 'driver' => 'file', 'path' => storage_path('framework/cache/data'), ],
        'database' => [ 'driver' => 'database', 'connection' => env('CACHE_DB_CONNECTION'), 'table' => 'caches', ],
        'redis' => [ 'driver' => 'redis', 'connection' => env('CACHE_DB_CONNECTION'), ],
    ],
];