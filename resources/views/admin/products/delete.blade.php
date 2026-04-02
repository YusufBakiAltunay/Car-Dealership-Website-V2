@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="mb-6 border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-6 text-sm">
            <a href="{{ route('products.index') }}"
               class="py-3 font-medium {{ request()->routeIs('products.index') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Products
            </a>
            <a href="{{ route('products.delete', $product) }}"
               class="py-3 font-medium {{ request()->routeIs('products.delete') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Delete Product
            </a>
        </div>
    </nav>
@endsection
@section('content')
    <div class="max-w-lg mx-auto mt-8 bg-white border rounded shadow-sm">

        <!-- Header -->
        <div class="px-6 py-4 border-b">
            <h1 class="text-2xl font-bold text-red-600 text-center">
                Weet je zeker dat je dit product wilt verwijderen?
            </h1>
        </div>

        <!-- Product Details -->
        <div class="px-6 py-4 grid grid-cols-3 gap-4 divide-y divide-gray-200">

            <div class="py-2">
                <dt class="text-sm font-medium text-gray-500">ID</dt>
                <dd class="text-sm text-gray-900">{{ $product->id }}</dd>
            </div>

            <div class="py-2">
                <dt class="text-sm font-medium text-gray-500">Name</dt>
                <dd class="text-sm text-gray-900">{{ $product->name }}</dd>
            </div>

            <div class="py-2">
                <dt class="text-sm font-medium text-gray-500">Description</dt>
                <dd class="text-sm text-gray-900">{{ $product->description }}</dd>
            </div>

            <div class="py-2">
                <dt class="text-sm font-medium text-gray-500">Current Price</dt>
                <dd class="text-sm text-gray-900">€ {{ $product->latest_price->price ?? 'N/A' }}</dd>
            </div>

            <div class="py-2">
                <dt class="text-sm font-medium text-gray-500">Inventory</dt>
                <dd class="text-sm text-gray-900">{{ $product->inventory }}</dd>
            </div>

            <div class="py-2">
                <dt class="text-sm font-medium text-gray-500">Created At</dt>
                <dd class="text-sm text-gray-900">{{ $product->created_at }}</dd>
            </div>

        </div>

        <!-- Actions -->
        <div class="flex justify-center gap-3 p-6 border-t">

            <!-- Delete Button -->
            <form action="{{ route('products.destroy', $product) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded text-sm font-medium hover:bg-red-700 transition"
                        onclick="return confirm('Weet je zeker dat je dit product wilt verwijderen?')">
                    Ja, verwijderen
                </button>
            </form>

            <!-- Cancel Button -->
            <a href="{{ route('products.index') }}"
               class="px-4 py-2 border rounded text-sm font-medium text-black hover:bg-gray-100 transition">
                Annuleren
            </a>

        </div>

    </div>
@endsection