@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="mb-6 border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-6 text-sm">
            <a href="{{ route('products.index') }}"
               class="py-3 font-medium {{ request()->routeIs('products.index') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Products
            </a>
            <a href="{{ route('products.create') }}"
               class="py-3 font-medium {{ request()->routeIs('products.create') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Add Product
            </a>
        </div>
    </nav>
@endsection

@section('content')

    @if(session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('status') }}
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-4">

        <h2 class="text-xl font-semibold mb-4">Products</h2>

        <div class="bg-white border rounded shadow-sm overflow-hidden">

            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 text-black">
                <tr>
                    <th class="px-4 py-2 text-left font-semibold">ID</th>
                    <th class="px-4 py-2 text-left font-semibold">Name</th>
                    <th class="px-4 py-2 text-left font-semibold">Description</th>
                    <th class="px-4 py-2 text-right font-semibold">Price</th>
                    <th class="px-4 py-2 text-right font-semibold">Inventory</th>
                    <th class="px-4 py-2 text-center font-semibold">Actions</th>
                </tr>
                </thead>

                <tbody class="divide-y">
                @forelse($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $product->id }}</td>
                        <td class="px-4 py-2 font-medium">{{ $product->name }}</td>
                        <td class="px-4 py-2">{{ Str::limit($product->description, 50) }}</td>
                        <td class="px-4 py-2 text-right font-medium">€ {{ $product->latest_price->price ?? '0.00' }}</td>
                        <td class="px-4 py-2 text-right">{{ $product->inventory }}</td>
                        <td class="px-4 py-2 text-center space-x-2">

                            <a href="{{ route('products.show', $product) }}"
                               class="px-3 py-1 bg-blue-900 text-white rounded hover:bg-blue-700 text-xs font-medium">
                                View
                            </a>

                            <a href="{{ route('products.edit', $product) }}"
                               class="px-3 py-1 bg-blue-900 text-white rounded hover:bg-blue-700 text-xs font-medium">
                                Edit
                            </a>

                            <a href="{{ route('products.delete', $product) }}"
                               class="px-3 py-1 bg-blue-900 text-white rounded hover:bg-blue-700 text-xs font-medium">
                                Delete
                            </a>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500">No products found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <div class="flex justify-between items-center p-4 text-sm">
                <p class="text-gray-600">
                    Showing {{ $products->firstItem() }} – {{ $products->lastItem() }} of {{ $products->total() }}
                </p>
                {{ $products->links('pagination::tailwind') }}
            </div>

        </div>

    </div>
@endsection