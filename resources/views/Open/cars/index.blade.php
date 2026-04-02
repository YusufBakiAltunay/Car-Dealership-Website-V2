@extends('layouts.layoutpublic')

@section('content')

    <!-- title -->
    <h1 class="text-center text-2xl md:text-4xl px-6 py-12 bg-white font-semibold">
        Alle Cars
    </h1>

    <!-- grid -->
    <div class="w-full px-6 py-12 bg-gray-100 border-t">

        <div class="container max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach($cars as $car)
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition duration-300 flex flex-col justify-between">

                    <!-- Car Name / Model -->
                    <h2 class="text-lg font-semibold mb-2">
                        {{ $car->carModel->brand->brand ?? 'N/A' }}
                        - {{ $car->carModel->name ?? 'N/A' }} {{ $car->name ?? '' }}
                    </h2>

                    <!-- Fuel Type & Price -->
                    <div class="text-sm text-gray-600 mb-4 space-y-1">
                        <p>Fuel Type: {{ $car->fuelType->name ?? 'N/A' }}</p>
                        <p>Price: {{ $car->latest_price?->price ?? 'N/A' }} €</p>
                    </div>

                    <!-- Detail button -->
                    <a href="{{ route('open.cars.show', $car) }}"
                       class="inline-block bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-600 transition duration-300 mb-2 text-center">
                        View Details
                    </a>

                    <!-- Disabled Order button -->
                    <button disabled
                            class="inline-block bg-gray-400 text-white text-sm px-4 py-2 rounded opacity-50 cursor-not-allowed text-center">
                        Order Car
                    </button>
                </div>
            @endforeach

        </div>

        <!-- Pagination -->
        <div class="container max-w-6xl mx-auto mt-10 flex justify-center">
            {{ $cars->links() }}
        </div>

    </div>
    <!-- /grid -->

@endsection