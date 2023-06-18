<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MyConcertsController;
use App\Http\Controllers\SellsDetailController;
use App\Http\Controllers\ConcertDetailController;


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
    return redirect()->route('login');
});


// register route
Route::get('register',[RegisterController::class, 'index'])->name('register');
Route::post('register',[RegisterController::class, 'store']);

// login route
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store']);

//logout route
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


// concert route
Route::get('concerts',[ConcertController::class, 'index'])->name('concerts');
Route::post('concert_by_Date',[ConcertController::class, 'searchByDate'])->name('concert.byDate');
Route::get('concert_create',[ConcertController::class, 'create'])->name('concert.create');
Route::post('concert_create',[ConcertController::class, 'store'])->name('concert');

// buy route
Route::get('buy/{id}',[BuyController::class, 'create'])->name('buy');
Route::post('sold/{id}',[BuyController::class, 'store'])->name('concert.buy');

// admin routes
Route::get('concertDetail',[ConcertController::class, 'indexConcertDetails'])->name('admin.concertsDetail');
Route::get('/sellsDetail/{id}',[ConcertController::class, 'indexSellsConcertDetails'])->name('admin.sellsDetail');


// clients routes
Route::get('myConcerts',[MyConcertsController::class, 'index'])->name('client.myConcerts');

// home routes
Route::get('home',[HomeController::class, 'index'])->name('viewHome');

// Voucher
Route::get('/detail-order/{id}', [VoucherController::class, 'generatePDF'])->name('generate.pdf');
Route::get('descargar-pdf/{id}', [VoucherController::class, 'downloadPDF'])->name('pdf.descargar');
Route::get('/pdf', [VoucherController::class, 'pdf'])->name('pdf.example');

// Thanks route
Route::get('thanksMsg',[ThanksController::class, 'index'])->name('thanksMsg');
