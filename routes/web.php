<?php

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

Route::get('/home', function () {
    return view('home');
});

Route::get('/welcome', function () {
    return view('latihan.home');
});

Route::get('/register', [RegistrationController::class, 'create']);
Route::post('/register', [RegistrationController::class, 'store']);
Route::get('/login', function () {
    return view('latihan.login');
});
Route::post('/login', [LoginController::class, 'login']);

// Route::get('/create', function () {
//     return view('products.create');
// });

// Route::post('/create', [ProductController::class, 'store']);

// Route::get('/edit/{id}', function () {
//     return view('products.edit');
// });

// Route::get('/products', function () {
//     return view('/products.products');
// });

// Route::get('/get', [ProductController::class, 'index']);
// Route::get('/edit', function () {
//     return view('products.edit');
// });

// Route::put('/edit/{id}', [ProductController::class, 'update']);


Route::resource('/products', ProductController::class);


Route::resource('/catalogs', CatalogController::class);


Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

Route::get('/order/dashboard', [DashboardController::class, 'index'])->name('order.dashboard');

Route::get('/order/{product_id}/detail', [DashboardController::class, 'show'])->name('order.detail');





Route::get('/latihan', function () {
    return view('latihan.register');
});