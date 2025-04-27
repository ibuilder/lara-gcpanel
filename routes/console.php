<?php

use Illuminate\Support\Facades\Route;

// Define console routes here
Route::get('/console', function () {
    return 'Console routes are working!';
});

// Additional console routes can be added below as needed
// Example: Route::get('/console/some-command', 'SomeController@someMethod');