<?php

use App\Http\Controllers\OrderController2;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;

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

// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/welcome', function () {
//     return view('welcome');
// });


// route login dan register

Route::get('/register', [RegistrationController::class, 'create']);
Route::post('/register', [RegistrationController::class, 'store']);
Route::get('/login', function () {
    return view('latihan.login');
})->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login');




// route product
Route::resource('/products', ProductController::class)->middleware('auth');

// route catalog / etalase product
Route::resource('/catalogs', CatalogController::class)->middleware('auth');



// route order
// Route::get('/orders/create', [OrderController::class, 'create'])->name('order.create')->middleware('auth');
// Route::post('/orders/store', [OrderController::class, 'store'])->name('order.store')->middleware('auth');
// Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
// Route::put('orders/update', [OrderController::class, 'update'])->name('order.update');
// Route::delete('order/destroy', [OrderController::class, 'store'])->name('order.destroy');


Route::resource('orders', OrderController2::class)->middleware('auth');

// dashboard controller
Route::get('/order/dashboard', [DashboardController::class, 'index'])->name('order.dashboard')->middleware('auth');

Route::get('/order/{product_id}/detail', [DashboardController::class, 'show'])->name('order.detail')->middleware('auth');