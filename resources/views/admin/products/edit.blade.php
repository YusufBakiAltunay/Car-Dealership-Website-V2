@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="mb-6 border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-6 text-sm">
            <a href="{{ route('products.index') }}"
               class="py-3 font-medium {{ request()->routeIs('products.index') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Products
            </a>
            <a href="{{ route('products.edit', $product) }}"
               class="py-3 font-medium {{ request()->routeIs('products.edit') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Edit Product
            </a>
        </div>
    </nav>
@endsection

@section('content')
    <div class="max-w-4xl mx-auto mt-6 bg-white border rounded shadow-sm">

        <div class="px-6 py-4 border-b">
            <h1 class="text-lg font-semibold">Edit Product</h1>
        </div>

        <div class="p-6">
            @if($errors->any())
                <div class="mb-4 border border-red-300 bg-red-50 text-red-700 text-sm rounded p-3">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.update', $product) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <label class="block text-sm">
                    <span class="text-gray-700">Name</span>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}"
                           class="mt-1 w-full border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-900">
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700">Description</span>
                    <textarea name="description"
                              class="mt-1 w-full border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-900">{{ old('description', $product->description) }}</textarea>
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700">Current Price (€)</span>
                    <input type="number" step="0.01" name="price"
                           value="{{ old('price', $product->latest_price->price ?? '') }}"
                           class="mt-1 w-full border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-900">
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700">Inventory</span>
                    <input type="number" name="inventory" value="{{ old('inventory', $product->inventory) }}"
                           class="mt-1 w-full border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-900">
                </label>

                <div class="flex justify-end gap-3 pt-4 border-t">
                    <a href="{{ route('products.index') }}"
                       class="px-4 py-2 text-sm border rounded text-black hover:bg-gray-100">Cancel</a>
                    <button type="submit"
                            class="px-4 py-2 text-sm bg-blue-900 text-white rounded hover:bg-blue-700">Update Product
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection