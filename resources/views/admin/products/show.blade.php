@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="mb-6 border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-6 text-sm">

            <a href="{{ route('products.index') }}"
               class="py-3 font-medium
        {{ request()->routeIs('products.index') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Products
            </a>

            <a href="{{ route('products.show', $product) }}"
               class="py-3 font-medium
        {{ request()->routeIs('products.show') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Details Product
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
                    <dt class="text-gray-600">ID</dt>
                    <dd class="col-span-2 font-medium">{{ $product->id }}</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3 bg-gray-50">
                    <dt class="text-gray-600">Name</dt>
                    <dd class="col-span-2 font-medium">{{ $product->name }}</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3">
                    <dt class="text-gray-600">Description</dt>
                    <dd class="col-span-2 font-medium">{{ $product->description }}</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3 bg-gray-50">
                    <dt class="text-gray-600">Inventory</dt>
                    <dd class="col-span-2 font-medium">{{ $product->inventory }}</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3">
                    <dt class="text-gray-600">Created At</dt>
                    <dd class="col-span-2 font-medium">{{ $product->created_at }}</dd>
                </div>
            </dl>
        </div>

        {{-- Price History --}}
        <div class="bg-white border rounded shadow-sm">
            <div class="px-4 py-2 border-b bg-gray-100 flex justify-between items-center">
                <h3 class="text-sm font-semibold">Price History</h3>
                <span class="text-sm font-semibold text-blue-900">
                Current: € {{ number_format($product->latest_price->price ?? 0, 2) }}
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
                @forelse($product->prices->sortByDesc('effdate') as $price)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">
                            {{ \Carbon\Carbon::parse($price->effdate)->format('d-m-Y H:i') }}
                        </td>
                        <td class="px-4 py-2 text-right font-medium">
                            € {{ number_format($price->price, 2) }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-4 py-4 text-center text-gray-500">
                            No price history available
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>

@endsection