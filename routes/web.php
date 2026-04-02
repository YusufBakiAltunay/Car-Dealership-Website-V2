<?php

use App\Http\Controllers\Admin\ProductController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin as Admin;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Open as Open;
use App\Http\Controllers\Open\CarController as OpenCarController;


Route::get('/', function () {
    return view('home.index');
})->name('home');


Route::get('/products', [Open\ProductController::class, 'index'])->name('open.products.index');
Route::get('/garage-services', [Open\GarageServiceController::class, 'index'])->name('open.garage-services.index');
Route::get('/cars', [OpenCarController::class, 'index'])->name('open.cars.index');
Route::get('/cars/{car}', [OpenCarController::class, 'show'])->name('open.cars.show');



//Route::get('/projects', [Open\ProjectController::class, 'index'])->name('open.projects.index');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', function () {
        return view('layouts.layoutadmin');
    })->name('admin');

    Route::get('admin/brands/{brand}/delete', [Admin\BrandController::class, 'delete'])
        ->name('brands.delete');
    Route::resource('admin/brands', Admin\BrandController::class);

    Route::get('admin/cars/{car}/delete', [Admin\CarController::class, 'delete'])
        ->name('cars.delete');
    Route::resource('admin/cars', Admin\CarController::class);

    Route::get('admin/fuel-types/{fuelType}/delete', [Admin\FuelTypeController::class, 'delete'])
        ->name('fuel-types.delete');
    Route::resource('admin/fuel-types', Admin\FuelTypeController::class);

    Route::get('/admin/car-models/{carModel}/delete', [Admin\CarModelController::class, 'delete'])
        ->name('car-models.delete');
    Route::resource('admin/car-models', Admin\CarModelController::class);


//    Route::get('admin/price-cars/{priceCar}/delete', [Admin\PriceCarController::class, 'delete'])
//        ->name('price-cars.delete');
//    Route::resource('admin/price-cars', Admin\PriceCarController::class);

    Route::resource('admin/garage-services', Admin\GarageServiceController::class);

    Route::get('/admin/garage-services/{garage_service}/delete', [Admin\GarageServiceController::class, 'delete'])
        ->name('garage-services.delete');

    Route::resource('admin/products', ProductController::class);

    Route::get('/admin/products/{product}/delete', [Admin\ProductController::class, 'delete'])
        ->name('products.delete');

});

Route::resource('/admin/users', UserController::class);

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';

