<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class MovieSearch extends Component
{
    public $input = '';
    public $movies = [];

    public function searchMovies()
    {
        if (empty($this->input)) {
            $this->movies = [];
            return;
        }

        try {
            //store the response from api
            $response = Http::get('http://www.omdbapi.com/', [
                'apikey' => config('services.omdb.api_key'),
                's' => $this->input,
            ]);

            //Check if response is successful then assign the response to movies
            if ($response->successful()) {
                $this->movies = $response->json()['Search'] ?? [];
            } else {
                $this->movies = [];
            }

        } catch (\Exception $e) {
            $this->movies = [];
        }

    }
    public function render()
    {
        return view('livewire.movie-search');
    }
}
