<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegistrationController;
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

Route::get('/home', function () {
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/register', [RegistrationController::class, 'create']);
Route::post('/register', [RegistrationController::class, 'store']);
Route::get('/login', function () {
    return view('login');
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