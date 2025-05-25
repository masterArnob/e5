<?php

use App\Http\Controllers\User\InventoryController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\StockMovementController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\User\UserProductVariantController;
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
    Route::get('product/variant-items/{product_id}', [UserProductController::class, 'variantItemsByProductId'])->name('product.variant-items');

    /**
     * Product Variants Routes
     */
    Route::delete('product-variant/destroy/{id}', [UserProductVariantController::class, 'destroy'])->name('product-variant.destroy');
    Route::put('product-variant/update', [UserProductVariantController::class, 'update'])->name('product-variant.update');
    Route::get('product-variant/edit/{product_id}/{variant_id}', [UserProductVariantController::class, 'edit'])->name('product-variant.edit');
    Route::post('product-variant/store', [UserProductVariantController::class, 'store'])->name('product-variant.store');
    Route::get('product-variant/create/{product_id}', [UserProductVariantController::class, 'create'])->name('product-variant.create');
    Route::get('product-variant/{product_id}', [UserProductVariantController::class, 'index'])->name('product-variant.index');

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
     * User Dashboard Routes
     */
    Route::get('dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');

    /**
     * Stock Movement Routes
     */
    Route::get('stock', [StockMovementController::class, 'index'])->name('stock-movement.index');
    Route::get('stock/create', [StockMovementController::class, 'create'])->name('stock-movement.create');
    Route::post('stock/store', [StockMovementController::class, 'store'])->name('stock-movement.store');
    Route::get('stock/{id}', [StockMovementController::class, 'show'])->name('stock-movement.show');
    Route::get('stock/edit/{id}', [StockMovementController::class, 'edit'])->name('stock-movement.edit');
    Route::put('stock/update/{id}', [StockMovementController::class, 'update'])->name('stock-movement.update');
    Route::delete('stock/destroy/{id}', [StockMovementController::class, 'destroy'])->name('stock-movement.destroy');

    /**
     * Inventory Report Route
     */
    Route::get('inventory/report', [InventoryController::class, 'index'])->name('inventory.index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
