<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// USER ROUTE START

// USER ROUTE END

// RECRUITEMENT OFFICER ROUTE START

// RECRUITEMENT OFFICER ROUTE END


//ADMIN ROUTE START

//ADMIN ROUTE END

//SECRETARY ROUTE START

//SECRETARY ROUTE END


//DIVISION LEAD ROUTE START

//DIVISION LEAD ROUTE END


//TRESURUR ROUTE START
Route::get('/payment/{page}', [App\Http\Controllers\Payment\PaymentController::class, 'create']);
Route::post('/payment', [App\Http\Controllers\Payment\PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments', [App\Http\Controllers\Payment\PaymentController::class, 'index'])->name('payments.index');
Route::get('/payments/show', [App\Http\Controllers\Payment\PaymentController::class, 'show'])->name('payments.show');
Route::get('payments/{id}/edit', [App\Http\Controllers\Payment\PaymentController::class, 'edit'])->name('payments.edit');
Route::delete('payments/{id}', [App\Http\Controllers\Payment\PaymentController::class, 'destroy'])->name('payments.destroy');
Route::put('payments/{id}', [App\Http\Controllers\Payment\PaymentController::class, 'update'])->name('payments.update');
//TRESURUR LEAD ROUTE END
