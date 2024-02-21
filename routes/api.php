<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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


/* Product apis */
Route::get('/products', [ProductController::class, 'index']); // List all products
Route::get('/products/{id}', [ProductController::class, 'show']); // List products by id
Route::post('/products', [ProductController::class, 'store']); // to create new product
Route::put('/products/{id}', [ProductController::class, 'update']); // to update a product
Route::delete('/products/{id}', [ProductController::class, 'destroy']); // to delete a product


/* Category apis */
Route::get('/categories', [CategoryController::class, 'index']); // List all categories
Route::get('/categories/{id}', [CategoryController::class, 'show']); // List category by id
Route::post('/categories', [CategoryController::class, 'store']); // to create new category
Route::put('/categories/{id}', [CategoryController::class, 'update']); // to update a category
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']); // to delete a category


