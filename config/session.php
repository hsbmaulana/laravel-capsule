<?php

return [

    'driver' => env('SESSION_DRIVER', 'redis'),
    'store' => env('SESSION_STORE', 'redis'),
    'cookie' => env('APP_NAME') . '_' . 'session', 'path' => '/', 'domain' => null,



    'files' => storage_path('framework/session'), // File
    'table' => 'sessions', // Database

    'connection' => env('SESSION_DB_CONNECTION'), // Connection for Database / Redis



    'lifetime' => 120,
    'expire_on_close' => false,
    'lottery' => [ 2, 100, ],
    'encrypt' => false,
    'secure' => false,
    'http_only' => true,
    'same_site' => 'lax',
];