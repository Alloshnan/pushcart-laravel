<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/user', function (Request $request) {
    return $request->session()->all();
});

// Route::post('login', [LoginController::class,'authenticate'])->name('login');

Route::middleware('api')->get('dash-products', [ProductController::class,'index']);

Route::middleware('auth:sanctum')->resource('products', ProductController::class)->except(['create','edit']);

Route::middleware('auth:sanctum')->resource('catalogs', CatalogController::class)->except(['create','edit']);

Route::middleware('auth:sanctum')->resource('users', UserController::class)->except(['create','edit']);

Route::middleware('auth:sanctum')->resource('user-types', UserTypeController::class)->only(['index']);


