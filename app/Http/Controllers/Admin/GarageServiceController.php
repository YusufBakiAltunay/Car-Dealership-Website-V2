<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GarageServiceStoreRequest;
use App\Http\Requests\GarageServiceUpdateRequest;
use App\Models\GarageService;
use App\Models\PriceProduct;
use App\Models\PriceService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;

class GarageServiceController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [

            new Middleware(PermissionMiddleware::using('index garage-service'), only: ['index']),


            new Middleware(PermissionMiddleware::using('show garage-service'), only: ['show']),


            new Middleware(PermissionMiddleware::using('create garage-service'), only: ['create', 'store']),


            new Middleware(PermissionMiddleware::using('edit garage-service'), only: ['edit', 'update']),


            new Middleware(PermissionMiddleware::using('delete garage-service'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $garageServices = GarageService::with('latest_price')->paginate(10);
        return view('admin.garage-services.index', ['garageServices' => $garageServices]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $priceServices = PriceService::all();
        return view('admin.garage-services.create', ['priceServices' => $priceServices]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GarageServiceStoreRequest $request)
    {
        $garageService = new GarageService();
        $garageService->name = $request->input('name');
        $garageService->description = $request->input('description');
        $garageService->save();

        $priceServices = new PriceService();
        $priceServices->price = $request->input('price');
        $priceServices->effdate = now();
        $priceServices->garage_service_id = $garageService->id;
        $priceServices->save();

        return to_route('garage-services.index')->with('status', "Garage Service created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(GarageService $garageService)
    {
        return view('admin.garage-services.show', ['garageService' => $garageService]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GarageService $garageService)
    {
        return view('admin.garage-services.edit', [
            'priceServices' => PriceService::all(),
            'garageService' => $garageService,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GarageServiceUpdateRequest $request, GarageService $garageService)
    {
        $garageService->name = $request->input('name');
        $garageService->description = $request->input('description');
        $garageService->save();

        if ($request->input('price') != $garageService->latest_price->price)
        {
            $priceServices = new PriceService();
            $priceServices->price = $request->input('price');
            $priceServices->effdate = now();
            $priceServices->garage_service_id = $garageService->id;
            $priceServices->save();
        }

        return to_route('garage-services.index')->with('status', "Garage Service updated successfully");
    }


    public function delete(GarageService $garageService): View
    {
        return view('admin.garage-services.delete', [
            'priceServices' => PriceService::all(),
            'garageService' => $garageService,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GarageService $garageService)
    {
        $garageService->delete();
        return to_route('garage-services.index')->with('status', "Garage Service deleted successfully");
    }
}

 