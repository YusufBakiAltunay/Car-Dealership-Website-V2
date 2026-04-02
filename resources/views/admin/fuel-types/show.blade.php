@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="mb-6 border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-6 text-sm">

            <a href="{{ route('fuel-types.index') }}"
               class="py-3 font-medium {{ request()->routeIs('fuel-types.index') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Fuel Types
            </a>

            <a href="{{ route('fuel-types.show', $fuelType) }}"
               class="py-3 font-medium {{ request()->routeIs('fuel-types.show') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Details Fuel Type
            </a>

        </div>
    </nav>
@endsection

@section('content')

    <div class="max-w-4xl mx-auto grid grid-cols-1 gap-6">

        {{-- Fuel Type Info --}}
        <div class="bg-white border rounded shadow-sm">

            <div class="px-4 py-2 border-b bg-gray-100">
                <h3 class="text-sm font-semibold">Fuel Type Information</h3>
            </div>

            <dl class="divide-y text-sm">

                <div class="px-4 py-2 grid grid-cols-3">
                    <dt class="text-gray-600">ID</dt>
                    <dd class="col-span-2 font-medium">{{ $fuelType->id }}</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3 bg-gray-50">
                    <dt class="text-gray-600">Fuel Type Name</dt>
                    <dd class="col-span-2 font-medium">{{ $fuelType->name }}</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3">
                    <dt class="text-gray-600">Created At</dt>
                    <dd class="col-span-2 font-medium">{{ $fuelType->created_at }}</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3 bg-gray-50">
                    <dt class="text-gray-600">Updated At</dt>
                    <dd class="col-span-2 font-medium">{{ $fuelType->updated_at }}</dd>
                </div>

            </dl>
        </div>

        {{-- Associated Cars --}}
        {{--        <div class="bg-white border rounded shadow-sm">--}}

        {{--            <div class="px-4 py-2 border-b bg-gray-100 flex justify-between items-center">--}}
        {{--                <h3 class="text-sm font-semibold">Cars Using This Fuel Type</h3>--}}
        {{--                <span class="text-sm font-semibold text-blue-900">--}}
        {{--                Total: {{ $fuelType->cars->count() }}--}}
        {{--            </span>--}}
        {{--            </div>--}}

        {{--            <table class="w-full text-sm">--}}

        {{--                <thead class="bg-gray-100 text-black">--}}
        {{--                <tr>--}}
        {{--                    <th class="px-4 py-2 text-left font-semibold">Car Name</th>--}}
        {{--                    <th class="px-4 py-2 text-left font-semibold">Model</th>--}}
        {{--                    <th class="px-4 py-2 text-right font-semibold">Price</th>--}}
        {{--                </tr>--}}
        {{--                </thead>--}}

        {{--                <tbody class="divide-y">--}}
        {{--                @forelse($fuelType->cars as $car)--}}
        {{--                    <tr class="hover:bg-gray-50">--}}
        {{--                        <td class="px-4 py-2 font-medium">{{ $car->name }}</td>--}}
        {{--                        <td class="px-4 py-2 font-medium">{{ $car->carModel->name ?? 'N/A' }}</td>--}}
        {{--                        <td class="px-4 py-2 text-right font-medium">€ {{ number_format($car->latest_price->price ?? 0, 2) }}</td>--}}
        {{--                    </tr>--}}
        {{--                @empty--}}
        {{--                    <tr>--}}
        {{--                        <td colspan="3" class="px-4 py-4 text-center text-gray-500">--}}
        {{--                            No cars found for this fuel type.--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}
        {{--                @endforelse--}}
        {{--                </tbody>--}}

        {{--            </table>--}}
        {{--        </div>--}}

    </div>

@endsection