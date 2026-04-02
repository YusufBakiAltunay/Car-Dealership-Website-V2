@extends('layouts.layoutadmin')

@if (session('status'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('status') }}</span>
    </div>
@endif
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
@section('title', 'projects')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Projects Overzicht</h2>

    <div class="bg-white shadow overflow-hidden rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Description
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aangemaakt
                    op
                </th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Details</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Edit</th>
                @can('delete project')
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Delete</th>
                @endcan
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @forelse($projects as $project)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $project->id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $project->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{Str::limit($project->description, 50) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $project->created_at->format('d-m-Y') }}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('projects.show', $project) }}"
                           class="text-indigo-600 hover:text-indigo-900 mr-3">Details</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">

                        <a href="{{ route('projects.edit', $project) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                    @can('delete project')
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">

                            <a href="{{ route('projects.delete', $project) }}"
                               class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    @endcan
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                        Geen projects gevonden.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
