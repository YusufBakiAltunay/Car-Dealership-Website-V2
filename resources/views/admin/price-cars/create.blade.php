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
                               class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Car
                                Price Toevoegen</a>
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
            <h1 class="h6">Car Price Admin</h1>
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
                <form id="form" class="shadow-md rounded-lg px-8 pt-6 pb-8 mb-4"
                      action="{{route("price-cars.store")}}" method="POST">
                    @csrf

                    <label class="block text-sm" for="name">
                        <span class="text-gray-700">Price</span>
                        <input class="bg-gray-200  block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                               name="price" type="number" step="0.01" value="{{old('price')}}" required/>
                    </label>

                    <label class="block text-sm" for="name">
                        <span class="text-gray-700">Date</span>
                        <input class="bg-gray-200  block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                               name="effects" value="{{old("effects")}}" type="date" required/>
                    </label>

                    <label class="block text-sm">
                        <span class="text-gray-700">Car</span>
                        <select name="car_model_id">
                            @foreach($cars as $car)
                                <option value="{{ $car->id }}"
                                        @selected($car->id == old('car_id'))>
                                    {{ $car->name }}
                                </option>
                            @endforeach
                        </select>
                    </label>

                    <button class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150
                    bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700
                    focus:outline-none focus:shadow-outline-purple" type="submit">Toevoegen
                    </button>
                </form>
            </div>
        </div>
        <!-- end body -->
    </div>
@endsection



