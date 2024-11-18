
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Trending Movies</h1>

    @if(empty($movies))
        <p class="text-lg text-gray-600">No Trending movies available.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($movies as $movie)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img 
                        src="{{ $movie['Poster'] ?? 'https://via.placeholder.com/300x450?text=No+Image' }}" 
                        alt="{{ $movie['Title'] }}" 
                        class="w-full h-64 object-cover"
                    >
                    <div class="p-4">
                        <h2 class="text-xl font-semibold">{{ $movie['Title'] }}</h2>
                        <p class="text-gray-600">{{ $movie['Year'] }}</p>
                        <a 
                            href="{{ route('movie.details', ['imdbID' => $movie['imdbID']]) }}" 
                            class="mt-4 inline-block text-blue-500 hover:underline"
                        >
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
