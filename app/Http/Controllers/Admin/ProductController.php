<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PriceProduct;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class ProductController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [

            new Middleware(PermissionMiddleware::using('index product'), only: ['index']),


            new Middleware(PermissionMiddleware::using('show product'), only: ['show']),


            new Middleware(PermissionMiddleware::using('create product'), only: ['create', 'store']),


            new Middleware(PermissionMiddleware::using('edit product'), only: ['edit', 'update']),


            new Middleware(PermissionMiddleware::using('delete product'), only: ['delete', 'destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('latest_price')->paginate(10);
        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $priceProducts = PriceProduct::all();
        return view('admin.products.create', ['priceProducts' => $priceProducts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->inventory = $request->input('inventory');
        $product->save();

        $priceProducts = new PriceProduct();
        $priceProducts->price  = $request->input('price');
        $priceProducts->effdate = now();
        $priceProducts->product_id = $product->id;
        $priceProducts->save();

        return to_route('products.index')->with('status', "Product created successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show',
            ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'priceProduct' => PriceProduct::all(),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->inventory = $request->input('inventory');
        $product->save();

        if ($request->input('price') != $product->latest_price->price)
        {
            $priceProducts = new PriceProduct();
            $priceProducts->price = $request->input('price');
            $priceProducts->effdate = now();
            $priceProducts->product_id = $product->id;
            $priceProducts->save();
        }

        return to_route('products.index')->with('status', "Product updated successfully");
    }

    public function delete(Product $product)
    {
        return view('admin.products.delete', [
            'priceProduct' => PriceProduct::all(),
            'product' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index')->with('status', "Product deleted successfully");;
    }
}
 