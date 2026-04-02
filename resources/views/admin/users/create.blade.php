@extends('layouts.layoutadmin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Nieuwe Gebruiker</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" class="max-w-lg">
        @csrf

        <!-- Naam -->
        <div class="mb-4">
            <label class="block mb-2 font-bold">Naam</label>
            <input type="text" name="name" class="border w-full p-2 rounded" value="{{ old('name') }}">
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block mb-2 font-bold">Email</label>
            <input type="email" name="email" class="border w-full p-2 rounded" value="{{ old('email') }}">
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Wachtwoord -->
        <div class="mb-4">
            <label class="block mb-2 font-bold">Wachtwoord</label>
            <input type="password" name="password" class="border w-full p-2 rounded">
            @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Is Admin Checkbox -->
        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_admin" class="form-checkbox h-5 w-5 text-red-600" value="1">
                <span class="ml-2 text-gray-700">Maak deze gebruiker Admin</span>
            </label>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Opslaan</button>
    </form>
@endsection
