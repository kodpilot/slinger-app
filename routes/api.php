<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\productController;
use App\Http\Controllers\api\categoryController;
use App\Http\Controllers\api\ecommerceController;
use App\Http\Controllers\api\apiController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// ECOMMERCE CONTROLLER
// Route::get('/sliders', 								[ecommerceController::class, 'sliders']);
// Route::post('/register', 							[ecommerceController::class, 'register']);
// Route::get('/users', 								[ecommerceController::class, 'sliders']);

// // PRODUCT CONTROLLER
// Route::get('/products', 							[productController::class, 'index']);
// Route::get('/products/{cat?}/{start?}/{limit?}', 	[productController::class, 'limit']);
// Route::get('/products/{id?}', 						[productController::class, 'show']);
// Route::get('/photos/{id?}', 						[productController::class, 'photos']);
// Route::post('/products', 							[productController::class, 'store']);
// Route::get('/lastProducts/{cat?}', 					[productController::class, 'last']);
// Route::get('/selectProducts/{cat?}', 				[productController::class, 'select']);



// // CATEGORY CONTROLLER
// Route::get('/category', 							[categoryController::class, 'index']);
// Route::get('/category/{id?}', 						[categoryController::class, 'show']);
// Route::post('/category', 							[categoryController::class, 'store']);

Route::post('/register', [apiController::class, 'register'])->middleware('control:general');
Route::post('/register-company', [apiController::class, 'registerCompany'])->middleware('control:general');
Route::post('/login', [apiController::class, 'login'])->middleware('control:general');

//get req
Route::get('/categories-page', [apiController::class, 'categories'])->middleware('control:key');
