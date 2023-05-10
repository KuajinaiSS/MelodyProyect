<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('auth.login');
});


// register rutas
Route::get('register',[RegisterController::class, 'index'])->name('register');
Route::post('register',[RegisterController::class, 'store']);

// login route test
Route::get('login', [LoginController::class, 'index'])->name('login');

// concert rutas
Route::get('concert_create',[ConcertController::class, 'create'])->name('concert.create');
Route::post('concert_create',[ConcertController::class, 'store'])->name('concert');

// home rutas
Route::get('home',[HomeController::class, 'index'])->name('viewHome');
