<x-guest-layout>
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]"
            src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" />
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <div class="container mx-auto mt-10">
                    <h1 class="text-2xl font-bold mb-5">Search Movies</h1>
                    <livewire:movie-search />
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
