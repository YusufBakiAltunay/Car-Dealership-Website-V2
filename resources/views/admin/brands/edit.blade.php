@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="mb-6 border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-6 text-sm">
            <a href="{{ route('brands.index') }}" class="py-3 font-medium text-gray-700 hover:text-blue-900">Brands</a>
            <span class="py-3 font-medium text-blue-900 border-b-2 border-blue-900">Edit Brand</span>
        </div>
    </nav>
@endsection

@section('content')
    <div class="max-w-lg mx-auto bg-white border rounded shadow-sm">
        <div class="px-6 py-4 border-b">
            <h1 class="text-lg font-semibold">Edit Brand</h1>
        </div>

        <div class="p-6">
            @if($errors->any())
                <div class="mb-4 border border-red-300 bg-red-50 text-red-700 text-sm rounded p-3">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('brands.update', $brand) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <label class="block text-sm">
                    <span class="text-gray-700">Brand Name</span>
                    <input type="text" name="brand" value="{{ old('brand', $brand->brand) }}" required
                           class="mt-1 w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-900">
                </label>

                <div class="flex justify-end gap-2 pt-4 border-t">
                    <a href="{{ route('brands.index') }}"
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
    </div>
@endsection