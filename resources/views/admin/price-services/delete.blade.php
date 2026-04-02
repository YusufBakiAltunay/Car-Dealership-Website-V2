@extends('layouts.layoutadmin')
@section('topmenu')
    <nav class="card">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="{{ route('projects.index') }}"
                               class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht
                                Project</a>
                            <a href="{{ route('projects.create') }}"
                               class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Project
                                Toevoegen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <h1 class="text-red-600">Delete?</h1>

    <p><strong>Naam:</strong> {{$project->name}}</p>
    <p><strong>Description:</strong>{{$project->description}}</p>

    <form action="{{ route('projects.destroy', $project) }}" method="POST">
        @csrf
        @method('DELETE')

        <button
            type="submit" class="bg-red-500 text-white p-2 inline-block"
            onclick="return confirm('Weet je zeker dat je dit project wilt verwijderen?')">
            >
            Ja, weg ermee
        </button>

        <a href="{{ route('projects.index') }}">Annuleren</a>
    </form>
@endsection

