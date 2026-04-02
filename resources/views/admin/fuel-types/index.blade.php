@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="mb-6 border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-6 text-sm">
            <a href="{{ route('fuel-types.index') }}"
               class="py-3 font-medium {{ request()->routeIs('fuel-types.index') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Fuel Types
            </a>
            <a href="{{ route('fuel-types.create') }}"
               class="py-3 font-medium {{ request()->routeIs('fuel-types.create') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Add Fuel Type
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

    <div class="max-w-7xl mx-auto bg-white border rounded shadow-sm overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 text-black">
            <tr>
                <th class="px-4 py-2 text-left font-semibold">ID</th>
                <th class="px-4 py-2 text-left font-semibold">Fuel Type</th>
                <th class="px-4 py-2 text-center font-semibold">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y">
            @forelse($fuelTypes as $fuelType)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $fuelType->id }}</td>
                    <td class="px-4 py-2 font-medium text-gray-900">{{ $fuelType->name }}</td>
                    <td class="px-4 py-2 text-center space-x-2">
                        <a href="{{ route('fuel-types.show', $fuelType) }}"
                           class="px-3 py-1 bg-blue-900 text-white rounded hover:bg-blue-700 text-xs font-medium">View</a>
                        <a href="{{ route('fuel-types.edit', $fuelType) }}"
                           class="px-3 py-1 bg-blue-900 text-white rounded hover:bg-blue-700 text-xs font-medium">Edit</a>
                        <a href="{{ route('fuel-types.delete', $fuelType) }}"
                           class="px-3 py-1 bg-blue-900 text-white rounded hover:bg-blue-700 text-xs font-medium">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center py-6 text-gray-500">No fuel types found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection