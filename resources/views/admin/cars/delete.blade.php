@extends('layouts.layoutadmin')

@section('content')
    <div class="max-w-lg mx-auto mt-8 bg-white border rounded shadow-sm p-6">

        <h1 class="text-2xl font-bold text-red-600 mb-6 text-center">
            Weet je zeker dat je deze Car wilt verwijderen?
        </h1>

        <div class="mb-6 space-y-2">
            <p class="text-sm font-semibold text-gray-900 bg-gray-100 px-3 py-2 rounded shadow-sm">
                Version Name: {{ $car->name }}
            </p>
            <p class="text-sm font-semibold text-gray-900 bg-gray-100 px-3 py-2 rounded shadow-sm">
                Model: {{ $car->carModel->name ?? 'N/A' }}
            </p>
            <p class="text-sm font-semibold text-gray-900 bg-gray-100 px-3 py-2 rounded shadow-sm">
                Brand: {{ $car->carModel->brand->brand ?? 'N/A' }}
            </p>
            <p class="text-sm font-semibold text-gray-900 bg-gray-100 px-3 py-2 rounded shadow-sm">
                Acceleration: {{ $car->acceleration }}
            </p>
            <p class="text-sm font-semibold text-gray-900 bg-gray-100 px-3 py-2 rounded shadow-sm">
                Horsepower: {{ $car->horsepower }}
            </p>
            <p class="text-sm font-semibold text-gray-900 bg-gray-100 px-3 py-2 rounded shadow-sm">
                Top Speed: {{ $car->top_speed }}
            </p>
            <p class="text-sm font-semibold text-gray-900 bg-gray-100 px-3 py-2 rounded shadow-sm">
                Max Load: {{ $car->max_load }}
            </p>
            <p class="text-sm font-semibold text-gray-900 bg-gray-100 px-3 py-2 rounded shadow-sm">
                Length: {{ $car->length }}
            </p>
            <p class="text-sm font-semibold text-gray-900 bg-gray-100 px-3 py-2 rounded shadow-sm">
                Width: {{ $car->width }}
            </p>
            <p class="text-sm font-semibold text-gray-900 bg-gray-100 px-3 py-2 rounded shadow-sm">
                Height: {{ $car->height }}
            </p>
            <p class="text-sm font-semibold text-gray-900 bg-gray-100 px-3 py-2 rounded shadow-sm">
                Stock: {{ $car->stock }}
            </p>
            <p class="text-sm font-semibold text-gray-900 bg-gray-100 px-3 py-2 rounded shadow-sm">
                Starting Price (€): € {{ number_format($car->latest_price->price ?? 0, 2) }}
            </p>
            <p class="text-sm font-semibold text-gray-900 bg-gray-100 px-3 py-2 rounded shadow-sm">
                Fuel Type: {{ $car->fuelType->name ?? 'N/A' }}
            </p>
        </div>

        <div class="flex justify-center gap-2 mt-4">
            <form action="{{ route('cars.destroy', $car) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit"
                        class="px-3 py-1 bg-red-600 text-white rounded text-sm hover:bg-red-700 transition"
                        onclick="return confirm('Weet je zeker dat je deze Car wilt verwijderen?')">
                    Ja, verwijderen
                </button>
            </form>

            <a href="{{ route('cars.index') }}"
               class="px-3 py-1 border rounded text-sm text-black hover:bg-gray-100 transition">
                Annuleren
            </a>
        </div>
    </div>
@endsection