<?php

use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\User\UserProductVariantcontroller;
use App\Http\Controllers\User\UserProductVariantItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function () {



    /**
     * Product Routes
     */
    Route::resource('product', UserProductController::class);
    /**
     * Product Routes
     */


  


    /**
     * Product Variants Routes
     */

    Route::delete('product-variant/destroy/{id}', [UserProductVariantcontroller::class, 'destroy'])->name('product-variant.destroy');
    Route::put('product-variant/update', [UserProductVariantcontroller::class, 'update'])->name('product-variant.update');
    Route::get('product-variant/edit/{product_id}/{variant_id}', [UserProductVariantcontroller::class, 'edit'])->name('product-variant.edit');
    Route::post('product-variant/store', [UserProductVariantcontroller::class, 'store'])->name('product-variant.store');
    Route::get('product-variant/create/{product_id}', [UserProductVariantcontroller::class, 'create'])->name('product-variant.create');
    Route::get('product-variant/{product_id}', [UserProductVariantcontroller::class, 'index'])->name('product-variant.index');

    /**
     * Product Variants Routes
     */




         /**
     * Product Variant Items Routes
     */
         Route::delete('product-variant-item/destroy/{id}', [UserProductVariantItemController::class, 'destroy'])->name('product-variant-item.destroy');
         Route::put('product-variant-item/update', [UserProductVariantItemController::class, 'update'])->name('product-variant-item.update');
         Route::get('product-variant-item/edit/{product_id}/{variant_id}/{item_id}', [UserProductVariantItemController::class, 'edit'])->name('product-variant-item.edit');
         Route::post('product-variant-item/store', [UserProductVariantItemController::class, 'store'])->name('product-variant-item.store');
         Route::get('product-variant-item/create/{product_id}/{variant_id}', [UserProductVariantItemController::class, 'create'])->name('product-variant-item.create');
         Route::get('product-variant-item/{product_id}/{variant_id}', [UserProductVariantItemController::class, 'index'])->name('product-variant-item.index');
              /**
     * Product Variant Items Routes
     */




     
    /**
     * User Dashboard Routes
     */

     Route::get('dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
        
     /**
     * User Dashboard Routes
     */

   
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
