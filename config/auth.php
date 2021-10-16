<?php

return [

    'defaults' => [ 'guard' => 'web', 'passwords' => 'default', ],
    'password_timeout' => 7200,

    'guards' => [

        'web' => [

            'driver' => 'session',
            'provider' => 'eloquent',
        ],

        'api' => [],
    ],

    'passwords' => [

        'default' => [

            'provider' => 'eloquent',
            'table' => 'resetters',
            'expire' => 8,
            'throttle' => 120,
        ],
    ],



    'providers' => [

        'eloquent' => [ 'driver' => 'eloquent', 'model' => App\Models\User::class, ],
        'database' => [ 'driver' => 'database', 'table' => 'users', ],
    ],
];