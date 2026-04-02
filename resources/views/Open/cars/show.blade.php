@extends('layouts.layoutpublic')

@section('content')

    <!-- title: Brand, Model, Version, Price -->
    <div class="w-full px-6 py-12 bg-white border-b">
        <div class="container max-w-4xl mx-auto text-center">
            <h1 class="text-2xl md:text-4xl font-semibold mb-2">
                {{ $car->carModel->brand->brand ?? 'N/A' }} - {{ $car->carModel->name ?? 'N/A' }} {{ $car->name ?? '' }}
            </h1>
            <p class="text-xl text-green-600 font-bold">
                Price: {{ $car->latest_price->price ?? 'N/A' }} €
            </p>
        </div>
    </div>

    <!-- car specifics -->
    <div class="w-full px-6 py-12 bg-gray-100 border-t">
        <div class="container max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6 space-y-3">

            <p class="text-sm text-gray-600">Fuel Type: {{ $car->fuelType->name ?? 'N/A' }}</p>
            <p class="text-sm text-gray-600">Acceleration 0-100KM: {{ $car->acceleration ?? 'N/A' }} s</p>
            <p class="text-sm text-gray-600">Horsepower: {{ $car->horsepower ?? 'N/A' }} HP</p>
            <p class="text-sm text-gray-600">Top Speed: {{ $car->top_speed ?? 'N/A' }} km/h</p>
            <p class="text-sm text-gray-600">Length: {{ $car->length ?? 'N/A' }} mm</p>
            <p class="text-sm text-gray-600">Width: {{ $car->width ?? 'N/A' }} mm</p>
            <p class="text-sm text-gray-600">Height: {{ $car->height ?? 'N/A' }} mm</p>
            <p class="text-sm text-gray-600">Max Load: {{ $car->max_load ?? 'N/A' }} kg</p>

            <!-- Buttons -->
            <div class="mt-6 flex flex-col sm:flex-row sm:space-x-4 space-y-2 sm:space-y-0 justify-center">
                <!-- Disabled Order button -->
                <button disabled
                        class="inline-block bg-gray-400 text-white text-sm px-4 py-2 rounded opacity-50 cursor-not-allowed text-center">
                    Order Car
                </button>

                <!-- Back button -->
                <a href="{{ route('open.cars.index') }}"
                   class="inline-block bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-600 transition duration-300 text-center">
                    Back to Cars
                </a>
            </div>

        </div>
    </div>

@endsection