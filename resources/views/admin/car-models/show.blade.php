@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="mb-6 border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-6 text-sm">

            <a href="{{ route('car-models.index') }}"
               class="py-3 font-medium {{ request()->routeIs('car-models.index') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Car Models
            </a>

            <a href="{{ route('car-models.show', $carModel) }}"
               class="py-3 font-medium {{ request()->routeIs('car-models.show') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Details Model
            </a>

        </div>
    </nav>
@endsection

@section('content')

    <div class="max-w-4xl mx-auto grid grid-cols-1 gap-6">

        {{-- Model Info --}}
        <div class="bg-white border rounded shadow-sm">

            <div class="px-4 py-2 border-b bg-gray-100">
                <h3 class="text-sm font-semibold">Car Model Information</h3>
            </div>

            <dl class="divide-y text-sm">

                <div class="px-4 py-2 grid grid-cols-3">
                    <dt class="text-gray-600">ID</dt>
                    <dd class="col-span-2 font-medium">{{ $carModel->id }}</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3 bg-gray-50">
                    <dt class="text-gray-600">Brand</dt>
                    <dd class="col-span-2 font-medium">{{ $carModel->brand->brand ?? 'N/A' }}</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3">
                    <dt class="text-gray-600">Model Name</dt>
                    <dd class="col-span-2 font-medium">{{ $carModel->name }}</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3 bg-gray-50">
                    <dt class="text-gray-600">Created At</dt>
                    <dd class="col-span-2 font-medium">{{ $carModel->created_at }}</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3">
                    <dt class="text-gray-600">Updated At</dt>
                    <dd class="col-span-2 font-medium">{{ $carModel->updated_at }}</dd>
                </div>

            </dl>
        </div>

        {{--        --}}{{-- Associated Cars --}}
        {{--        <div class="bg-white border rounded shadow-sm">--}}

        {{--            <div class="px-4 py-2 border-b bg-gray-100 flex justify-between items-center">--}}
        {{--                <h3 class="text-sm font-semibold">Cars of This Model</h3>--}}
        {{--                <span class="text-sm font-semibold text-blue-900">--}}
        {{--                Total: {{ $carModel->cars->count() }}--}}
        {{--            </span>--}}
        {{--            </div>--}}

        {{--            <table class="w-full text-sm">--}}

        {{--                <thead class="bg-gray-100 text-black">--}}
        {{--                <tr>--}}
        {{--                    <th class="px-4 py-2 text-left font-semibold">Car Name</th>--}}
        {{--                    <th class="px-4 py-2 text-right font-semibold">Price</th>--}}
        {{--                    <th class="px-4 py-2 text-right font-semibold">Stock</th>--}}
        {{--                </tr>--}}
        {{--                </thead>--}}

        {{--                <tbody class="divide-y">--}}
        {{--                @forelse($carModel->cars as $car)--}}
        {{--                    <tr class="hover:bg-gray-50">--}}
        {{--                        <td class="px-4 py-2 font-medium">{{ $car->name }}</td>--}}
        {{--                        <td class="px-4 py-2 text-right font-medium">--}}
        {{--                            € {{ number_format($car->latest_price->price ?? 0, 2) }}</td>--}}
        {{--                        <td class="px-4 py-2 text-right font-medium">{{ $car->stock }}</td>--}}
        {{--                    </tr>--}}
        {{--                @empty--}}
        {{--                    <tr>--}}
        {{--                        <td colspan="3" class="px-4 py-4 text-center text-gray-500">--}}
        {{--                            No cars found for this model.--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}
        {{--                @endforelse--}}
        {{--                </tbody>--}}

        {{--            </table>--}}
        {{--        </div>--}}

    </div>

@endsection