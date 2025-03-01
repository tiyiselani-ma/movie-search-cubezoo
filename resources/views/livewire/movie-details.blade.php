<div class=" max-w-6xl mx-auto p-6">
    <div class="grid sm:grid-cols-2 gap-5">

        @if ($movie)
            <div class="">
                <h1 class="text-2xl font-bold">{{ $movie['Title'] }}</h1>
                <p><strong>Year:</strong> {{ $movie['Year'] }}</p>
                <p><strong>Rated:</strong> {{ $movie['Rated'] }}</p>
                <p><strong>Released:</strong> {{ $movie['Released'] }}</p>
                <p><strong>Runtime:</strong> {{ $movie['Runtime'] }}</p>
                <p><strong>Genre:</strong> {{ $movie['Genre'] }}</p>
                <p><strong>Director:</strong> {{ $movie['Director'] }}</p>
                <p><strong>Actors:</strong> {{ $movie['Actors'] }}</p>
                <p><strong>Plot:</strong> {{ $movie['Plot'] }}</p>
                <p><strong>IMDB Rating:</strong> {{ $movie['imdbRating'] }}</p>
            </div>
            <div class="">
                @if ($movie['Poster'] !== 'N/A')
                    <img src="{{ $movie['Poster'] }}" alt="Movie Poster" class="mt-4">
                @endif

            </div>
        @endif
    </div>
    @if (!$movie)
        <p>Movie details not found.</p>
    @endif

    <a href="/" class="text-blue-500 hover:underline mt-4 block">Back to Search</a>
</div>
