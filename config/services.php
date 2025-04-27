<?php

return [

    /*
    |--------------------------------------------------------------------------
    | External Services Configuration
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for external services such as
    | Supabase, payment gateways, and other third-party services.
    |
    */

    'supabase' => [
        'url' => env('SUPABASE_URL'),
        'key' => env('SUPABASE_KEY'),
    ],

    'pdf' => [
        'driver' => 'dompdf', // or 'snappy' for snappy PDF generation
        'options' => [
            'defaultFont' => 'Arial',
            'isHtml5ParserEnabled' => true,
        ],
    ],

];