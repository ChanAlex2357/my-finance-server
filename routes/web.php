<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;

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
    return view('welcome');
});

Route::get('/login' , [AuthController::class , 'login'])->name('auth.login');
Route::post('/login' , [AuthController::class , 'dologin'])->name('auth.dologin');

Route::get('/register',[AuthController::class, 'register'])->name('auth.register');
Route::post('/register',[AuthController::class, 'doregister'])->name('auth.doregister');


# User routes
Route::middleware('auth')->group(function () {
    Route::get('/user/home', [HomeController::class, 'index'])->name('user.home');
    Route::get('/user/account/create', [AccountController::class, 'createForm'])->name('user.account.createForm');
    Route::post('/user/account/create', [AccountController::class, 'create'])->name('user.account.create');
});