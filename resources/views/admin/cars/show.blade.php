@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="mb-6 border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-6 text-sm">

            <a href="{{ route('cars.index') }}"
               class="py-3 font-medium
           {{ request()->routeIs('cars.index') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Cars
            </a>

            <a href="{{ route('cars.show', $car) }}"
               class="py-3 font-medium
           {{ request()->routeIs('cars.show') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Details Car
            </a>

        </div>
    </nav>
@endsection


@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">


        {{-- Specifications --}}

        <div class="bg-white border rounded shadow-sm">

            <div class="px-4 py-2 border-b bg-gray-100">
                <h3 class="text-sm font-semibold">Specifications</h3>
            </div>

            <dl class="divide-y text-sm">

                <div class="px-4 py-2 grid grid-cols-3">
                    <dt class="text-gray-600">Acceleration</dt>
                    <dd class="col-span-2 font-medium">{{ $car->acceleration }} s</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3 bg-gray-50">
                    <dt class="text-gray-600">Horsepower</dt>
                    <dd class="col-span-2 font-medium">{{ $car->horsepower }} HP</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3">
                    <dt class="text-gray-600">Top Speed</dt>
                    <dd class="col-span-2 font-medium">{{ $car->top_speed }} km/h</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3 bg-gray-50">
                    <dt class="text-gray-600">Dimensions</dt>
                    <dd class="col-span-2 font-medium">
                        {{ $car->length }} × {{ $car->width }} × {{ $car->height }} mm
                    </dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3">
                    <dt class="text-gray-600">Max Load</dt>
                    <dd class="col-span-2 font-medium">{{ $car->max_load }} kg</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3 bg-gray-50">
                    <dt class="text-gray-600">Stock</dt>
                    <dd class="col-span-2 font-medium">{{ $car->stock }}</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3">
                    <dt class="text-gray-600">Fuel Type</dt>
                    <dd class="col-span-2 font-medium">
                        {{ $car->fuelType->name ?? 'N/A' }}
                    </dd>
                </div>

            </dl>

        </div>


        {{-- Price History --}}

        <div class="bg-white border rounded shadow-sm">

            <div class="px-4 py-2 border-b bg-gray-100 flex justify-between items-center">
                <h3 class="text-sm font-semibold">Price History</h3>

                <span class="text-sm font-semibold text-blue-900">
            Current: € {{ number_format($car->latest_price->price ?? 0, 2) }}
        </span>
            </div>

            <table class="w-full text-sm">

                <thead class="bg-gray-100 text-black">
                <tr>
                    <th class="px-4 py-2 text-left font-semibold">Date</th>
                    <th class="px-4 py-2 text-right font-semibold">Price</th>
                </tr>
                </thead>

                <tbody class="divide-y">

                @foreach($car->prices->sortByDesc('effdate') as $price)

                    <tr class="hover:bg-gray-50">

                        <td class="px-4 py-2">
                            {{ \Carbon\Carbon::parse($price->effdate)->format('d-m-Y H:i') }}
                        </td>

                        <td class="px-4 py-2 text-right font-medium">
                            € {{ number_format($price->price, 2) }}
                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

@endsection