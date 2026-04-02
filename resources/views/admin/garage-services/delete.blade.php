@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="mb-6 border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-6 text-sm">
            <a href="{{ route('garage-services.index') }}"
               class="py-3 font-medium {{ request()->routeIs('garage-services.index') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Garage Services
            </a>
            <a href="{{ route('garage-services.delete', $garageService) }}"
               class="py-3 font-medium {{ request()->routeIs('garage-services.delete') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Delete Service
            </a>
        </div>
    </nav>
@endsection

@section('content')
    <div class="max-w-2xl mx-auto bg-white border rounded shadow p-6">

        <h1 class="text-lg font-semibold mb-4 text-red-600">Delete Garage Service?</h1>

        <p class="mb-4">Are you sure you want to delete the following garage service?</p>

        <div class="space-y-2 mb-4">
            <p class="text-gray-900 bg-gray-100 p-2 rounded">Name: {{ $garageService->name }}</p>
            <p class="text-gray-900 bg-gray-100 p-2 rounded">Description: {{ $garageService->description }}</p>
            <p class="text-gray-900 bg-gray-100 p-2 rounded">Price:
                € {{ $garageService->latest_price->price ?? 'N/A' }}</p>
        </div>

        <div class="flex gap-4">
            <form action="{{ route('garage-services.destroy', $garageService) }}" method="POST" class="flex-1">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded text-sm font-medium"
                        onclick="return confirm('Are you sure you want to delete this garage service?')">
                    Yes, Delete
                </button>
            </form>

            <a href="{{ route('garage-services.index') }}"
               class="w-full px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-900 rounded text-sm font-medium text-center">
                Cancel
            </a>
        </div>

    </div>
@endsection