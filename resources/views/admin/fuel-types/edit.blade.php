@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="mb-6 border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-6 text-sm">
            <a href="{{ route('fuel-types.index') }}"
               class="py-3 font-medium {{ request()->routeIs('fuel-types.index') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Fuel Types
            </a>
            <a href="{{ route('fuel-types.edit', $fuelType) }}"
               class="py-3 font-medium {{ request()->routeIs('fuel-types.edit') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Edit Fuel Type
            </a>
        </div>
    </nav>
@endsection

@section('content')
    <div class="max-w-xl mx-auto bg-white border rounded shadow-sm p-6">
        <h1 class="text-xl font-bold mb-4">Edit Fuel Type</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('fuel-types.update', $fuelType) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <label class="block text-sm">
                <span class="text-gray-700">Fuel Type Name</span>
                <input type="text" name="name" value="{{ old('name', $fuelType->name) }}" required
                       class="mt-1 w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-900">
            </label>

            <div class="flex justify-end gap-2 pt-4 border-t">
                <a href="{{ route('fuel-types.index') }}"
                   class="px-3 py-1 border rounded text-sm text-black hover:bg-gray-100 transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-3 py-1 bg-blue-900 text-white rounded text-sm hover:bg-blue-700 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection