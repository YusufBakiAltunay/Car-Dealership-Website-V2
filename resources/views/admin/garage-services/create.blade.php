@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="mb-6 border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-6 text-sm">
            <a href="{{ route('garage-services.index') }}"
               class="py-3 font-medium {{ request()->routeIs('garage-services.index') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Garage Services
            </a>
            <a href="{{ route('garage-services.create') }}"
               class="py-3 font-medium {{ request()->routeIs('garage-services.create') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Add Service
            </a>
        </div>
    </nav>
@endsection

@section('content')
    <div class="max-w-2xl mx-auto bg-white border rounded shadow p-6">

        <h1 class="text-lg font-semibold mb-4">Add Garage Service</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <strong class="font-bold">Error!</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('garage-services.store') }}" method="POST" class="space-y-4">
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700">Name</span>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="block w-full p-2 mt-1 rounded bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </label>

            <label class="block text-sm">
                <span class="text-gray-700">Description</span>
                <textarea name="description" rows="4" class="block w-full p-2 mt-1 rounded bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
            </label>

            <label class="block text-sm">
                <span class="text-gray-700">Start Price</span>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}" required
                       class="block w-full p-2 mt-1 rounded bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </label>

            <button type="submit" class="px-4 py-2 bg-blue-900 hover:bg-blue-700 text-white rounded text-sm font-medium">
                Save
            </button>
        </form>

    </div>
@endsection