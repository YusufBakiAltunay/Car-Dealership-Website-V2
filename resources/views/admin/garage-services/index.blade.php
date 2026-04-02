@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="mb-6 border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-6 text-sm">

            <a href="{{ route('garage-services.index') }}"
               class="py-3 font-medium
           {{ request()->routeIs('garage-services.index') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Garage Services
            </a>

            <a href="{{ route('garage-services.create') }}"
               class="py-3 font-medium
           {{ request()->routeIs('garage-services.create') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Add Service
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

    <div class="max-w-7xl mx-auto px-4">

        <h2 class="text-xl font-semibold mb-4">Garage Services</h2>

        <div class="bg-white border rounded shadow-sm overflow-hidden">

            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 text-black">
                <tr>
                    <th class="px-4 py-2 text-left font-semibold">ID</th>
                    <th class="px-4 py-2 text-left font-semibold">Name</th>
                    <th class="px-4 py-2 text-left font-semibold">Description</th>
                    <th class="px-4 py-2 text-right font-semibold">Current Price</th>
                    <th class="px-4 py-2 text-center font-semibold">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y">
                @forelse($garageServices as $service)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $service->id }}</td>
                        <td class="px-4 py-2 font-medium text-gray-900">{{ $service->name }}</td>
                        <td class="px-4 py-2">{{ Str::limit($service->description, 50) }}</td>
                        <td class="px-4 py-2 text-right font-medium">
                            € {{ number_format($service->latest_price->price ?? 0, 2) }}</td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <a href="{{ route('garage-services.show', $service) }}"
                               class="px-3 py-1 bg-blue-900 text-white rounded hover:bg-blue-700 text-xs font-medium">
                                View
                            </a>
                            <a href="{{ route('garage-services.edit', $service) }}"
                               class="px-3 py-1 bg-blue-900 text-white rounded hover:bg-blue-700 text-xs font-medium">
                                Edit
                            </a>
                            <a href="{{ route('garage-services.delete', $service) }}"
                               class="px-3 py-1 bg-blue-900 text-white rounded hover:bg-blue-700 text-xs font-medium">
                                Delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-500">
                            No garage services found
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            @if($garageServices instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="flex justify-between items-center p-4 text-sm">
                    <p class="text-gray-600">
                        Showing {{ $garageServices->firstItem() }} – {{ $garageServices->lastItem() }}
                        of {{ $garageServices->total() }}
                    </p>
                    {{ $garageServices->links('pagination::tailwind') }}
                </div>
            @endif

        </div>
    </div>
@endsection