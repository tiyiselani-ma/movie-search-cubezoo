<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MovieDetails extends Component
{
    public $imdbID;
    public $movie;

    public function mount($imdbID)
    {
        $this->imdbID = $imdbID;
       
        // Check if the movie details are already cached and cache it for 7 days
        $this->movieDetails = Cache::remember("movie_details_{$this->imdbID}", now()->addDays(7), function () {
            return $this->fetchMovieDetails();
        });
        
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
            return ['error' => 'Unable to retrieve movie details.'];
        }
    }

    public function render()
    {
        return view('livewire.movie-details');
    }
}
