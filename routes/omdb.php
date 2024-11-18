<?php
use Illuminate\Support\Facades\Route;

Route::get('/movie/{imdbID}', function ($imdbID) {
    return view('movie-details', ['imdbID' => $imdbID]);
})->name('movie.details');