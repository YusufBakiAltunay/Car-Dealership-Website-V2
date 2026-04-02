<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\FuelType;
use App\Models\PriceCar;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;


class CarController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index car'), only: ['index']),
            new Middleware(PermissionMiddleware::using('create car'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('show car'), only: ['show']),
            new Middleware(PermissionMiddleware::using('edit car'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete car'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $cars = Car::with(['carModel'])->paginate(10);
        return view('admin.cars.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $fuelTypes = FuelType::all();
        $carModels = CarModel::all();

        return view('admin.cars.create', ['carModels' => $carModels, 'fuelTypes' => $fuelTypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarStoreRequest $request)
    {
        $car = new Car();
        $car->name = $request->input('name');
        $car->acceleration = $request->input('acceleration');
        $car->horsepower = $request->input('horsepower');
        $car->top_speed = $request->input('top_speed');
        $car->length = $request->input('length');
        $car->width = $request->input('width');
        $car->height = $request->input('height');
        $car->max_load = $request->input('max_load');
        $car->stock = $request->input('stock');
        $car->car_model_id = $request->input('car_model_id');
        $car->fuel_type_id = $request->input('fuel_type_id');

        $car->save();

        $priceCar = new PriceCar();
        $priceCar->price = $request->price;
        $priceCar->effects = now();
        $priceCar->car_id = $car->id;
        $priceCar->save();

        return to_route('cars.index')->with('status', "Car created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car): View
    {
        return view('admin.cars.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car): View
    {
        $fuelTypes = FuelType::all();
        $carModels = CarModel::all();
        return view('admin.cars.edit', [
            'carModels' => $carModels,
            'fuelTypes' => $fuelTypes,
            'car' => $car
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarUpdateRequest $request, Car $car)
    {
        $car->name = $request->input('name');
        $car->acceleration = $request->input('acceleration');
        $car->horsepower = $request->input('horsepower');
        $car->top_speed = $request->input('top_speed');
        $car->length = $request->input('length');
        $car->width = $request->input('width');
        $car->height = $request->input('height');
        $car->max_load = $request->input('max_load');
        $car->car_model_id = $request->input('car_model_id');
        $car->save();

        if ($request->input('price') != $car->latest_price->price) {
            $priceCar = new PriceCar();
            $priceCar->price = $request->price;
            $priceCar->effects = now();
            $priceCar->car_id = $car->id;
            $priceCar->save();
        }

        return to_route('cars.index')->with('status', "Car successfully updated");
    }

    public function delete(Car $car): View
    {
        $carModels = CarModel::all();
        $fuelTypes = FuelType::all();
        return view('admin.cars.delete', ['carModels' => $carModels, 'car' => $car, 'fuelTypes' => $fuelTypes]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return to_route('cars.index')->with('status', "Car successfully deleted");
    }
}
