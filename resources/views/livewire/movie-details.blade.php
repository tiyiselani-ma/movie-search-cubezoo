<div class="container mx-auto p-6">
    @if ($movie)
        <h1 class="text-2xl font-bold">{{ $movie['Title'] }}</h1>
        <p> {{ $movie['Year'] }}</p>
        <p> {{ $movie['Rated'] }}</p>
        <p> {{ $movie['Released'] }}</p>
        <p> {{ $movie['Runtime'] }}</p>
        <p> {{ $movie['Genre'] }}</p>
        <p> {{ $movie['Director'] }}</p>
        <p> {{ $movie['Actors'] }}</p>
        <p> {{ $movie['Plot'] }}</p>
        <p> {{ $movie['imdbRating'] }}</p>

        
       <img src="{{ $movie['Poster'] }}" alt="Movie Poster" class="mt-4">
     
   
    @endif


</div>