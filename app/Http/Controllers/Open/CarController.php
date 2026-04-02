<?php

namespace App\Http\Controllers\Open;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\View\View;

class CarController extends Controller
{
    /**
     * Display a listing of the cars.
     */
    public function index(): View
    {
        $cars = Car::with([
            'carModel.brand',
            'fuelType',
            'latest_price'
        ])->paginate(12);

        return view('open.cars.index', ['cars' => $cars]);
    }

    /**
     * Show the details of a specific car.
     */
    public function show(Car $car): View
    {
        $car->load(['carModel.brand', 'fuelType', 'latest_price']);

        return view('open.cars.show', ['car' => $car]);
    }
}