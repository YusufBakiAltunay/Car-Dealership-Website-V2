@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="{{ route('price-cars.index') }}"
                               class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht
                                Car Prices</a>
                            <a href="{{ route('price-cars.create') }}"
                               class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Car Price
                                Toevoegen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <div class="card mt-6">
        <!-- header -->
        <div class="card-header flex flex-row justify-between">
            <h1 class="h6">Price car Admin</h1>
        </div>
        <!-- end header -->

        <!-- errors -->

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Er ging iets mis!</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <!-- body -->
        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <form action="{{ route('price-cars.update', $priceCar) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label class="block text-sm" for="name">
                        <span class="text-gray-700">Car Price</span>
                        <input class="bg-gray-200  block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                              min="0" step="0.01" name="price" value="{{ old('price', $priceCar->price) }}" type="number" required/>
                    </label>

                    <label for="description" class="block text-sm">
                        <span class="text-gray-700">Date</span>
                        <textarea
                                class="bg-gray-200 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                            focus:outline-none focus:shadow-outline" name="effects"
                                id="effects">{{ old('effects', $priceCar->effects) }}</textarea>
                    </label>



                    <button class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150
                    bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700
                    focus:outline-none focus:shadow-outline-purple" type="submit">Update
                    </button>
                </form>
            </div>
        </div>
        <!-- end body -->
    </div>
@endsection



