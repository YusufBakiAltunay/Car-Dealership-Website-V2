@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="mb-6 border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-6 text-sm">

            <a href="{{ route('brands.index') }}"
               class="py-3 font-medium {{ request()->routeIs('brands.index') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Brands
            </a>

            <a href="{{ route('brands.show', $brand) }}"
               class="py-3 font-medium {{ request()->routeIs('brands.show') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Details Brand
            </a>

        </div>
    </nav>
@endsection

@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- Brand Info --}}
        <div class="bg-white border rounded shadow-sm">

            <div class="px-4 py-2 border-b bg-gray-100">
                <h3 class="text-sm font-semibold">Brand Information</h3>
            </div>

            <dl class="divide-y text-sm">

                <div class="px-4 py-2 grid grid-cols-3">
                    <dt class="text-gray-600">ID</dt>
                    <dd class="col-span-2 font-medium">{{ $brand->id }}</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3 bg-gray-50">
                    <dt class="text-gray-600">Brand Name</dt>
                    <dd class="col-span-2 font-medium">{{ $brand->brand }}</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3">
                    <dt class="text-gray-600">Created At</dt>
                    <dd class="col-span-2 font-medium">{{ $brand->created_at }}</dd>
                </div>

                <div class="px-4 py-2 grid grid-cols-3 bg-gray-50">
                    <dt class="text-gray-600">Updated At</dt>
                    <dd class="col-span-2 font-medium">{{ $brand->updated_at }}</dd>
                </div>

            </dl>
        </div>

        {{-- Associated Models --}}
        {{--        <div class="bg-white border rounded shadow-sm">--}}

        {{--            <div class="px-4 py-2 border-b bg-gray-100 flex justify-between items-center">--}}
        {{--                <h3 class="text-sm font-semibold">Associated Car Models</h3>--}}
        {{--                <span class="text-sm font-semibold text-blue-900">--}}
        {{--                Total: {{ $brand->carModels->count() }}--}}
        {{--            </span>--}}
        {{--            </div>--}}

        {{--            <table class="w-full text-sm">--}}

        {{--                <thead class="bg-gray-100 text-black">--}}
        {{--                <tr>--}}
        {{--                    <th class="px-4 py-2 text-left font-semibold">Model Name</th>--}}
        {{--                    <th class="px-4 py-2 text-left font-semibold">Version</th>--}}
        {{--                </tr>--}}
        {{--                </thead>--}}

        {{--                <tbody class="divide-y">--}}
        {{--                @forelse($brand->carModels as $model)--}}
        {{--                    <tr class="hover:bg-gray-50">--}}
        {{--                        <td class="px-4 py-2 font-medium">{{ $model->name }}</td>--}}
        {{--                        <td class="px-4 py-2 font-medium">{{ $model->version ?? 'N/A' }}</td>--}}
        {{--                    </tr>--}}
        {{--                @empty--}}
        {{--                    <tr>--}}
        {{--                        <td colspan="2" class="px-4 py-4 text-center text-gray-500">--}}
        {{--                            No models associated with this brand.--}}
        {{--                        </td>--}}
        {{--                    </tr>--}}
        {{--                @endforelse--}}
        {{--                </tbody>--}}

        {{--            </table>--}}
        {{--        </div>--}}

    </div>

@endsection