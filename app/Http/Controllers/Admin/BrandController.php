<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\brand;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Spatie\Permission\Middleware\PermissionMiddleware;


class BrandController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index brand'), only: ['index']),
            new Middleware(PermissionMiddleware::using('create brand'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('show brand'), only: ['show']),
            new Middleware(PermissionMiddleware::using('edit brand'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete brand'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $brands = Brand::orderBy('id', 'asc')->paginate(10);

        return view('admin.brands.index', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public
    function create(): View
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public
    function store(BrandStoreRequest $request)
    {
        $brand = new Brand();
        $brand->brand = $request->brand;
        $brand->save();

        return to_route('brands.index')->with('status', "Brand {$brand->brand} was created ");
    }

    /**
     * Display the specified resource.
     */
    public
    function show(Brand $brand): View
    {
        return view('admin.brands.show', ['brand' => $brand]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public
    function edit(Brand $brand): View
    {
        return view('admin.brands.edit', [
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(BrandUpdateRequest $request, Brand $brand)
    {
        $brand->brand = $request->input('brand');
        $brand->save();

        return to_route('brands.index')->with('status', "Brand {$brand->brand} was updated ");
    }


    public
    function delete(Brand $brand): View
    {
        return view('admin.brands.delete', [
            'brand' => $brand
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(Brand $brand)
    {
        $brand->delete();
        return to_route('brands.index')->with('status', "Brand: {$brand->brand} was deleted ");
    }
}
