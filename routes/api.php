<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CategoryController;


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
//Product Route
Route::get('/product/index',[ProductController::class,'index']);
Route::get('/product/show/{id}',[ProductController::class,'show']);
Route::post('/product/store',[ProductController::class,'store']);

//Categories Route
Route::get('/category',[CategoryController::class,'index']);
Route::get('/category/show/{id}',[CategoryController::class,'show']);
Route::post('/category/store',[CategoryController::class,'store']);
