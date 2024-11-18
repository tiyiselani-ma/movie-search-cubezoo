<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\cache;
use Illuminate\Support\Facades\DB;


class TrendingMovies extends Component
{
    public $movies = [];

    public function mount()
    {
        // Fetch cached movie IDs from the database
        $cachedMovieIds = $this->getCachedMovieIdsFromDatabase();

        if (empty($cachedMovieIds)) {
            $this->movies = [];  // No trending movies if there are no cached IDs
            return;
        }

        // Retrieve movie details for each cached movie ID
        $this->movies = collect($cachedMovieIds)
            ->map(function ($imdbID) {
                // Try to get movie details from cache (could be in database or file-based cache)
                $cacheKey = "movie_details_{$imdbID}";
                $movie = Cache::get($cacheKey); // Using the default Laravel Cache for individual movie details

                // If movie is not in cache, fetch it from the API
                if (!$movie) {
                    $movie = $this->fetchMovieDetailsFromApi($imdbID);
                    if ($movie) {
                        // Cache the movie details for 24 hours if fetched from API
                        Cache::put($cacheKey, $movie, now()->addHours(24));
                    }
                }

                return $movie;
            })
            ->filter()  // Remove null values from the collection
            ->toArray();
    }

    /**
     * Get cached movie IDs from the database cache table
     */
    private function getCachedMovieIdsFromDatabase()
    {
        // Assuming you have a 'cache' table and it stores cached movie IDs
        // Replace 'cache' with the name of your actual cache table
        $cachedMovieIds = DB::table('cache')
            ->where('key', 'like', 'movie_details_%') // Adjust this condition based on how your data is stored
            ->pluck('key')  // Getting the 'key' column that contains cached movie IDs
            ->map(function ($key) {
                // Extract the IMDb ID from the cache key (assuming the format is movie_details_{imdbID})
                return str_replace('movie_details_', '', $key);
            })
            ->toArray();

        return $cachedMovieIds;
    }

    /**
     * Fetch movie details from the OMDB API
     * 
     * @param string $imdbID
     * @return array|null
     */
    private function fetchMovieDetailsFromApi($imdbID)
    {
        try {
            $response = Http::get('http://www.omdbapi.com/', [
                'apikey' => config('services.omdb.api_key'),
                'i' => $imdbID,
            ]);

            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            // Log the error or handle it accordingly
            return null;
        }

        return null;
    }

    public function render()
    {
        return view('livewire.trending-movies')->layout('layouts.guest-layout');
    }
}
