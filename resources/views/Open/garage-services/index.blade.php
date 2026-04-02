@extends('layouts.layoutpublic')

@section('content')

    <!-- title -->
    <h1 class="text-center text-2xl md:text-4xl px-6 py-12 bg-white font-semibold">
        Alle Garage Services
    </h1>
    <!-- /title -->

    <!-- grid -->
    <div class="w-full px-6 py-12 bg-gray-100 border-t">

        <div class="container max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach($garageServices as $garageService)
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition duration-300 flex flex-col justify-between">

                    <!-- Garage Service Name -->
                    <h2 class="text-lg font-semibold mb-2">
                        <a href="#"
                           class="text-gray-800 hover:text-blue-600 transition duration-300">
                            {{ $garageService->name }}
                        </a>
                    </h2>

                    <!-- Price -->
                    <div class="text-2xl font-bold text-green-600 mb-3">
                        ${{ $garageService->latest_price->price ?? 'N/A' }}
                    </div>

                    <!-- Description -->
                    <p class="text-sm text-gray-600 mb-4 h-20 overflow-hidden break-words">
                        {{ Str::limit($garageService->description, 120) }}
                    </p>

                    <!-- Button -->
                    <button disabled
                       class="inline-block bg-gray-400 text-white text-sm px-4 py-2 rounded opacity-50 cursor-not-allowed text-center">
                        Plan Garage Service
                    </button>

                </div>
            @endforeach

        </div>

        <!-- Pagination -->
        <div class="container max-w-6xl mx-auto mt-10 flex justify-center">
            {{ $garageServices->links() }}
        </div>

    </div>
    <!-- /grid -->

@endsection