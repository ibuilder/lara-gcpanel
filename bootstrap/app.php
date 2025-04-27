<?php

require __DIR__.'/../vendor/autoload.php';

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

// Bind the kernel to the application
$app->singleton(
    Kernel::class,
    App\Http\Kernel::class
);

// Handle the incoming request
$request = Request::capture();
$response = $app->make(Kernel::class)->handle($request);
$response->send();

// Terminate the application
$app->terminate($request, $response);