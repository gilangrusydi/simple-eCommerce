<?php

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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{PRODUCT_SLUG}', [ProductController::class, 'view']);

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

// Auth
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'loginProcess']);
    Route::post('/logout', [AuthController::class, 'logoutProcess']);
});
// End Auth
