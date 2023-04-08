<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('dashboard',[DashboardController::class,'index'])->middleware('auth');
Route::resource('category', CategoryController::class)->middleware('auth');
Route::resource('product', ProductController::class)->middleware('auth');
Route::resource('cart', CartController::class)->middleware('auth');
Route::resource('transaction', TransactionController::class)->middleware('auth');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
