<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//OMDB related routes
require __DIR__.'/omdb.php';