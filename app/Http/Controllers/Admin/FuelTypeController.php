<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FuelType;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use App\Http\Requests\FuelTypeStoreRequest;
use App\Http\Requests\FuelTypeUpdateRequest;
use Spatie\Permission\Middleware\PermissionMiddleware;


class FuelTypeController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index fuelType'), only: ['index']),
            new Middleware(PermissionMiddleware::using('create fuelType'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('show fuelType'), only: ['show']),
            new Middleware(PermissionMiddleware::using('edit fuelType'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete fuelType'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $fuelTypes = FuelType::orderBy('id', 'asc')->paginate(10);
        return view('admin.fuel-types.index', ['fuelTypes' => $fuelTypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.fuel-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FuelTypeStoreRequest $request)
    {
        $fuelType = new FuelType();
        $fuelType->name = $request->name;
        $fuelType->save();

        return to_route('fuel-types.index')->with('success', "FuelType {$fuelType->name} has been created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(FuelType $fuelType): View
    {
        return view('admin.fuel-types.show', ['fuelType' => $fuelType]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FuelType $fuelType): View
    {
        return view('admin.fuel-types.edit',
            ['fuelType' => $fuelType]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FuelTypeUpdateRequest $request, FuelType $fuelType)
    {
        $fuelType->name = $request->input('name');
        $fuelType->save();

        return to_route('fuel-types.index')->with('status', "Fuel type {$fuelType->name} was updated.");
    }

    public function delete(FuelType $fuelType): View
    {
        return view('admin.fuel-types.delete', ['fuelType' => $fuelType]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FuelType $fuelType)
    {
        $fuelType->delete();
        return to_route('fuel-types.index')->with('status', "Fuel type successfully deleted.");
    }
}
