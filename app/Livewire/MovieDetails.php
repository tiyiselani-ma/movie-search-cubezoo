<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class MovieDetails extends Component
{
    public $imdbID;
    public $movie;

    public function mount($imdbID)
    {
        $this->imdbID = $imdbID;
        $this->fetchMovieDetails();
    }

    public function fetchMovieDetails()
    {
        try {
            $response = Http::get("http://www.omdbapi.com/", [
                'apikey' => config('services.omdb.api_key'),
                'i' => $this->imdbID,
            ]);

            if ($response->successful()) {
                $this->movie = $response->json();
            } else {
                $this->movie = null;
            }
        } catch (\Exception $e) {
            $this->movies = [];
        }
    }

    public function render()
    {
        return view('livewire.movie-details');
    }
}
