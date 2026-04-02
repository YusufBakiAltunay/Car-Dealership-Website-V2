@extends('layouts.layoutadmin')

@section('content')
    <div class="max-w-md mx-auto mt-8 bg-white border rounded shadow-sm p-6">

        <h1 class="text-2xl font-bold text-red-600 mb-6 text-center">
            Weet je zeker dat je dit Brand wilt verwijderen?
        </h1>

        <div class="mb-6 space-y-3">
            <p class="text-sm font-semibold text-gray-900 bg-gray-100 px-3 py-2 rounded shadow-sm">
                Naam: {{ $brand->brand }}
            </p>
        </div>

        <div class="flex justify-center gap-2">
            <form action="{{ route('brands.destroy', $brand) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit"
                        class="px-3 py-1 bg-red-600 text-white rounded text-sm hover:bg-red-700 transition"
                        onclick="return confirm('Weet je zeker dat je dit Brand wilt verwijderen?')">
                    Ja, verwijderen
                </button>
            </form>

            <a href="{{ route('brands.index') }}"
               class="px-3 py-1 border rounded text-sm text-black hover:bg-gray-100 transition">
                Annuleren
            </a>
        </div>
    </div>
@endsection