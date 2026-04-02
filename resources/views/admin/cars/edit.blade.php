@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="mb-6 border-b">
        <div class="max-w-7xl mx-auto flex items-center gap-6 text-sm">

            <a href="{{ route('cars.index') }}"
               class="py-3 font-medium
           {{ request()->routeIs('cars.index') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Cars
            </a>

            <a href="{{ route('cars.edit', $car) }}"
               class="py-3 font-medium
           {{ request()->routeIs('cars.edit') ? 'text-blue-900 border-b-2 border-blue-900' : 'text-gray-700 hover:text-blue-900' }}">
                Edit Car
            </a>

        </div>
    </nav>
@endsection

@section('content')

    <div class="max-w-xl mx-auto bg-white border rounded shadow-sm">

        <div class="px-6 py-4 border-b">
            <h1 class="text-lg font-semibold">
                Edit Car
            </h1>
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

            <form action="{{ route('cars.update',$car) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-4">

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Version Name</label>
                        <input type="text" name="name"
                               value="{{ old('name',$car->name) }}"
                               class="mt-1 w-full border rounded px-3 py-2 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700">Acceleration</label>
                        <input type="number" step="0.01" name="acceleration"
                               value="{{ old('acceleration',$car->acceleration) }}"
                               class="mt-1 w-full border rounded px-3 py-2 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700">Horsepower</label>
                        <input type="number" name="horsepower"
                               value="{{ old('horsepower',$car->horsepower) }}"
                               class="mt-1 w-full border rounded px-3 py-2 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700">Top Speed</label>
                        <input type="number" name="top_speed"
                               value="{{ old('top_speed',$car->top_speed) }}"
                               class="mt-1 w-full border rounded px-3 py-2 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700">Max Load</label>
                        <input type="number" name="max_load"
                               value="{{ old('max_load',$car->max_load) }}"
                               class="mt-1 w-full border rounded px-3 py-2 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700">Length</label>
                        <input type="number" step="0.01" name="length"
                               value="{{ old('length',$car->length) }}"
                               class="mt-1 w-full border rounded px-3 py-2 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700">Width</label>
                        <input type="number" step="0.01" name="width"
                               value="{{ old('width',$car->width) }}"
                               class="mt-1 w-full border rounded px-3 py-2 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700">Height</label>
                        <input type="number" step="0.01" name="height"
                               value="{{ old('height',$car->height) }}"
                               class="mt-1 w-full border rounded px-3 py-2 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700">Stock</label>
                        <input type="number" name="stock"
                               value="{{ old('stock',$car->stock) }}"
                               class="mt-1 w-full border rounded px-3 py-2 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700">Price (€)</label>
                        <input type="number" step="0.01" name="price"
                               value="{{ old('price',$car->latest_price?->price) }}"
                               class="mt-1 w-full border rounded px-3 py-2 text-sm">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700">Car Model</label>
                        <select name="car_model_id"
                                class="mt-1 w-full border rounded px-3 py-2 text-sm">
                            @foreach($carModels as $carModel)
                                <option value="{{ $carModel->id }}"
                                        @selected($car->car_model_id == $carModel->id)>
                                    {{ $carModel->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700">Fuel Type</label>
                        <select name="fuel_type_id"
                                class="mt-1 w-full border rounded px-3 py-2 text-sm">
                            @foreach($fuelTypes as $fuelType)
                                <option value="{{ $fuelType->id }}"
                                        @selected($car->fuel_type_id == $fuelType->id)>
                                    {{ $fuelType->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="flex justify-end gap-3 pt-4 border-t">

                    <a href="{{ route('cars.index') }}"
                       class="px-4 py-2 text-sm border rounded text-black hover:bg-gray-100">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-4 py-2 text-sm bg-blue-900 text-white rounded hover:bg-blue-700">
                        Update Car
                    </button>

                </div>

            </form>

        </div>
    </div>

@endsection