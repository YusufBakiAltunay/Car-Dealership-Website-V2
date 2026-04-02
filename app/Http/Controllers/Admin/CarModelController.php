<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarModelUpdateRequest;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\FuelType;
use App\Models\PriceCar;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use App\Http\Requests\CarModelStoreRequest;
use Spatie\Permission\Middleware\PermissionMiddleware;

class CarModelController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index carModel'), only: ['index']),
            new Middleware(PermissionMiddleware::using('create carModel'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('show carModel'), only: ['show']),
            new Middleware(PermissionMiddleware::using('edit carModel'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete carModel'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $carModels = CarModel::with('brand')->paginate(10);
        return view('admin.car-models.index', ['carModels' => $carModels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $brands = Brand::all();

        return view('admin.car-models.create', ['brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarModelStoreRequest $request)
    {
        $carModel = new CarModel();
        $carModel->name = $request->input('name');
        $carModel->brand_id = $request->input('brand_id');
        $carModel->save();

        return to_route('car-models.index')->with('status', "{$carModel->name} has been created");
    }

    /**
     * Display the specified resource.
     */
    public function show(CarModel $carModel): View
    {
        return view('admin.car-models.show', ['carModel' => $carModel]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarModel $carModel): View
    {
        return view('admin.car-models.edit', [
            'brands' => Brand::all(),
            'carModel' => $carModel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarModelUpdateRequest $request, CarModel $carModel)
    {
        $carModel->name = $request->input('name');
        $carModel->brand_id = $request->input('brand_id');
        $carModel->save();

        return to_route('car-models.index')->with('status', "{$carModel->name} has been updated");
    }

    public function delete(CarModel $carModel): View
    {
        return view('admin.car-models.delete', [
            'brands' => Brand::all(),
            'carModel' => $carModel
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarModel $carModel)
    {
        $carModel->delete();
        return to_route('car-models.index')->with('status', "{$carModel->name} was successfully deleted");
    }
}
