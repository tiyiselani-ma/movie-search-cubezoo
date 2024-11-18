<div>
    <!-- Search Form -->
    <div class="flex items-center space-x-2">
        <input  type="text" 
                class="border p-2 flex-1 text-black" 
                placeholder="Search for a movie..."
                wire:model.debounce.0ms="input" 
        >
                
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" wire:click="searchMovies">
            Search
        </button>
    </div>


    @if (!empty($movies))
        <ul class="mt-4">
            @foreach ($movies as $movie)
                <li class="border-b p-2">
                    <a href="{{ route('movie.details', ['imdbID' => $movie['imdbID']]) }}"
                         class="text-blue-500 hover:underline">
                        {{ $movie['Title'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    @elseif(strlen($input) > 0)
        <p class="mt-4 text-gray-500">No results found for "{{ $input }}"</p>
    @endif

</div>
