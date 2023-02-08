<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SwitchController;
use Illuminate\Support\Facades\Route;
//login

Route::get('/', [SwitchController::class, 'index']);
Route::post('/', [SwitchController::class, 'change']);

Route::get('/login', [AuthController::class, 'loginPage']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

//register
Route::get('/register/en', [AuthController::class, 'registerPage']);
Route::get('/register/id', [AuthController::class, 'registerPageIndo']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

//admin only
Route::middleware('auth.admin')->group(function () {
    Route::get('/maintenance', [AdminController::class, 'maintanancePage']);
    Route::get('/deleteacc/{id}', [AdminController::class, 'delete']);
    Route::get('/maintenance/{id}', [AdminController::class, 'maintananceAcc']);
    Route::post('/maintenance/{id}', [AdminController::class, 'changerole']);
});

//for authenticated user (member & admin)
Route::middleware('auth')->group(function () {
    Route::get('/product/{id}', [ProductController::class, 'productDetail']);
    Route::post('/product/{id}', [ProductController::class, 'addToCart'])->middleware('auth');
    Route::get('/showcart', [CartController::class, 'showcart']);
    Route::get('/deletecart/{id}', [CartController::class, 'delete']);
    Route::post('/purchase', [CartController::class, 'purchase'])->name('purchase');
    Route::post('/product/{id}', [ProductController::class, 'addToCart']);
    Route::get('/home', [ProductController::class, 'index'])->name('home');
    Route::get('/profile', [AuthController::class, 'profilePage']);
    Route::post('/profile/{id}', [AuthController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
