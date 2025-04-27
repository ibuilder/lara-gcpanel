<?php

return [
    'default' => env('DB_CONNECTION', 'supabase'),

    'connections' => [
        'supabase' => [
            'driver' => 'pgsql',
            'host' => env('SUPABASE_DB_HOST', 'your_supabase_host'),
            'port' => env('SUPABASE_DB_PORT', '5432'),
            'database' => env('SUPABASE_DB_NAME', 'your_database_name'),
            'username' => env('SUPABASE_DB_USER', 'your_username'),
            'password' => env('SUPABASE_DB_PASSWORD', 'your_password'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'schema' => 'public',
        ],
    ],

    'migrations' => 'migrations',
];