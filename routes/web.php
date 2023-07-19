<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MyConcertsController;
use App\Http\Controllers\SellsDetailController;
use App\Http\Controllers\ConcertDetailController;
use App\Http\Controllers\CollectionController;


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

// home routes
Route::get('home',[HomeController::class, 'index'])->name('viewHome');

Route::middleware(['verifiedAdmin'])->group(function () {
    // admin routes
    Route::get('concertsDetail',[ConcertController::class, 'indexConcertDetails'])->name('admin.concertsDetail');
    Route::get('/sellsDetail/{id}',[ConcertController::class, 'indexSellsConcertDetails'])->name('admin.sellsDetail');

    // Create concert
    Route::get('concert-create',[ConcertController::class, 'create'])->name('concert.create');
    Route::post('concert-create',[ConcertController::class, 'store'])->name('concert');

    // User info
    Route::get('users',[UserController::class, 'index'] )->name('users');
    Route::get('user-info',[UserController::class, 'getUser'] )->name('user.info');

    // Collection
    Route::get('/collection', [CollectionController::class, 'index'])->name('admin.collection');

    // Concerts details
    Route::get('/all-concert-sales', [CollectionController::class, 'allConcertsTotalSales']);
    Route::get('/all-detail-orders', [CollectionController::class, 'allDetailOrders']);

});


Route::middleware(['verifiedClient'])->group(function () {
    // concert route
    Route::get('concerts',[ConcertController::class, 'index'])->name('concerts');
    Route::post('concert-by-Date',[ConcertController::class, 'searchByDate'])->name('concert.byDate');

    // buy route
    Route::get('buy/{id}',[BuyController::class, 'create'])->name('buy');
    Route::post('sold/{id}',[BuyController::class, 'store'])->name('concert.buy');

    // clients routes
    Route::get('myConcerts',[ConcertController::class, 'indexMyConcerts'])->name('client.myConcerts');

    // Voucher
    Route::get('/detail-order/{id}', [VoucherController::class, 'generatePDF'])->name('generate.pdf');
    Route::get('descargar-pdf/{id}', [VoucherController::class, 'downloadPDF'])->name('pdf.descargar');
    Route::get('/pdf', [VoucherController::class, 'pdf'])->name('pdf.example');

    // Thanks route
    Route::get('thanksMsg',[ThanksController::class, 'index'])->name('thanksMsg');
});

















