@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="mb-6 border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-6 text-sm">

            <a href="{{ route('car-models.index') }}"
               class="py-3 font-medium
           {{ request()->routeIs('car-models.index') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Car Models
            </a>

            <a href="{{ route('car-models.create') }}"
               class="py-3 font-medium
           {{ request()->routeIs('car-models.create') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Add Car Model
            </a>

        </div>
    </nav>
@endsection

@section('content')

    <div class="max-w-xl mx-auto bg-white border rounded shadow-sm">

        <div class="px-6 py-4 border-b">
            <h1 class="text-lg font-semibold">Create Car Model</h1>
        </div>

        <div class="p-6">

            @if ($errors->any())
                <div class="mb-4 border border-red-300 bg-red-50 text-red-700 text-sm rounded p-3">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('car-models.store') }}" method="POST" class="space-y-4">
                @csrf

                <label class="block text-sm">
                    <span class="text-gray-700">Name</span>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="mt-1 w-full border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-900">
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700">Brand</span>
                    <select name="brand_id" required
                            class="mt-1 w-full border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-900">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" @selected(old('brand_id') == $brand->id)>
                                {{ $brand->brand }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <div class="flex justify-end gap-3 pt-4 border-t">
                    <a href="{{ route('car-models.index') }}"
                       class="px-4 py-2 text-sm border rounded text-black hover:bg-gray-100">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-4 py-2 text-sm bg-blue-900 text-white rounded hover:bg-blue-700">
                        Create Car Model
                    </button>
                </div>

            </form>

        </div>
    </div>

@endsection