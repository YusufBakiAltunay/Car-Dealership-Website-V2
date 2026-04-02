<?php
//
//namespace App\Http\Controllers\Admin;
//
//use App\Http\Controllers\Controller;
//use App\Http\Requests\BrandUpdateRequest;
//use App\Http\Requests\PriceCarStoreRequest;
//use App\Http\Requests\PriceCarUpdateRequest;
//use App\Models\PriceCar;
//use Illuminate\Routing\Controllers\HasMiddleware;
//use Illuminate\Routing\Controllers\Middleware;
//use Illuminate\View\View;
//use Spatie\Permission\Middleware\PermissionMiddleware;
//
//class PriceCarController extends Controller implements HasMiddleware
//{
//
//    public static function middleware(): array
//    {
//        return [
//            new Middleware(PermissionMiddleware::using('index car'), only: ['index']),
//            new Middleware(PermissionMiddleware::using('create car'), only: ['create', 'store']),
//            new Middleware(PermissionMiddleware::using('show car'), only: ['show']),
//            new Middleware(PermissionMiddleware::using('edit car'), only: ['edit', 'update']),
//            new Middleware(PermissionMiddleware::using('delete car'), only: ['delete', 'destroy']),
//        ];
//    }
//
//    /**
//     * Display a listing of the resource.
//     */
//    public function index(): View
//    {
//        $priceCars = PriceCar::all();
//        return view('admin.price-cars.index', ['priceCars' => $priceCars]);
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     */
//    public function create(): View
//    {
//        return view('admin.price-cars.create');
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(PriceCarStoreRequest $request)
//    {
//        $priceCar = new PriceCar();
//        $priceCar->price = $request->price;
//        $priceCar->effects = $request->effects;
//        $priceCar->save();
//
//        return to_route('price-cars.index')->with('status', "Price car {$priceCar->price} and {$priceCar->effects} have been created!");
//    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show(PriceCar $priceCar): View
//    {
//        return view('admin.price-cars.show', ['priceCar' => $priceCar]);
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit(PriceCar $priceCar): View
//    {
//        return view('admin.price-cars.edit', ['priceCar' => $priceCar]);
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(PriceCarUpdateRequest $request, PriceCar $priceCar)
//    {
//
//        if ($request->input('price')->latest_price->price) {
//            $priceCar = new PriceCar();
//            $priceCar->price = $request->input('price');
//            $priceCar->effects = now();
//            $priceCar->save();
//        }
//
//        return to_route('price-cars.index')->with('status', "Price car {$priceCar->price} and {$priceCar->effects} have been updated!");
//    }
//
//    public function delete(PriceCar $priceCar): View
//    {
//        return view('admin.price-cars.delete', ['priceCar' => $priceCar]);
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy(PriceCar $priceCar)
//    {
//        $priceCar->delete();
//        return to_route('price-cars.index')->with('status', "Price car {$priceCar->price} with date {$priceCar->effects} has deleted!");
//    }
//}
