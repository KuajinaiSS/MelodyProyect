<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});


/* RUTAS DE LOGIN */

// ruta de login que retorna la vista "auth/login.blade.php"
Route::get('login',[LoginController::class, 'index'])->name('viewLogin');


/*  RUTAS DE REGISTER */

// ruta de register que retorna la vista "auth/register.blade.php"
Route::get('register',[RegisterController::class, 'index'])->name('viewRegister');


/* RUTAS DE CONCERT */

// ruta de concert que retorna la vista "concert/index.blade.php"
Route::get('concert',[ConcertController::class, 'index'])->name('viewConcert');



