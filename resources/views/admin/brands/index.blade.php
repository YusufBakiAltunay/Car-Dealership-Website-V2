@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="mb-6 border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-6 text-sm">
            <a href="{{ route('brands.index') }}"
               class="py-3 font-medium {{ request()->routeIs('brands.index') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Brands
            </a>
            <a href="{{ route('brands.create') }}"
               class="py-3 font-medium {{ request()->routeIs('brands.create') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Add Brand
            </a>
        </div>
    </nav>
@endsection

@section('content')

    @if(session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('status') }}
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-xl font-semibold mb-4">Brands Overview</h2>

        <div class="bg-white border rounded shadow-sm overflow-hidden">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 text-black">
                <tr>
                    <th class="px-4 py-2 text-left font-semibold">ID</th>
                    <th class="px-4 py-2 text-left font-semibold">Brand Name</th>
                    <th class="px-4 py-2 text-center font-semibold">Actions</th>
                </tr>
                </thead>

                <tbody class="divide-y">
                @forelse($brands as $brand)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $brand->id }}</td>
                        <td class="px-4 py-2 font-medium">{{ $brand->brand }}</td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <a href="{{ route('brands.show', $brand) }}"
                               class="px-3 py-1 bg-blue-900 text-white rounded hover:bg-blue-700 text-xs font-medium">View</a>
                            <a href="{{ route('brands.edit', $brand) }}"
                               class="px-3 py-1 bg-blue-900 text-white rounded hover:bg-blue-700 text-xs font-medium">Edit</a>
                            <a href="{{ route('brands.delete', $brand) }}"
                               class="px-3 py-1 bg-blue-900 text-white rounded hover:bg-blue-700 text-xs font-medium">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-6 text-gray-500">No brands found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            @if($brands instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="flex justify-between items-center p-4 text-sm">
                    <p class="text-gray-600">
                        Showing {{ $brands->firstItem() }} – {{ $brands->lastItem() }} of {{ $brands->total() }}
                    </p>
                    {{ $brands->links('pagination::tailwind') }}
                </div>
            @endif
        </div>
    </div>

@endsection