<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(ProductsController::class)->group(function() {
    Route::get('/products', 'getAllProducts');
    Route::get('/products/{id}', 'product');
    Route::get('/products/search/{keyword}', 'search');
    Route::get('/products/categories', 'categories');
    Route::get('/products/categories/{category}', 'searchByCategory');
    Route::post('/products', 'addProduct');
    Route::put('/products/{id}', 'updateProduct');
    Route::delete('/products/{id}', 'deleteProduct');
});


