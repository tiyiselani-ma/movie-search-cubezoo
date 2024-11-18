<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\TrendingMovies;

Route::get('/movie/{imdbID}', function ($imdbID) {
    return view('movie-details', ['imdbID' => $imdbID]);
})->name('movie.details');

Route::get('/trending', TrendingMovies::class)->name('trending.movies');