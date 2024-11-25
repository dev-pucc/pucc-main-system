<?php

use App\Http\Controllers\RecruitmentOfficer\RegistrationController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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

//AdminController start
Route::get('/admin/pending-user', [AdminController::class, 'index'])->name('admin.pendingUser');
Route::get('/admin/approve-user/{id}', [AdminController::class, 'approvedUser'])->name('admin.approvedUser');
Route::get('/admin/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
Route::get('/admin/update-user/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
Route::post('/admin/update-user-post/{id}', [AdminController::class, 'updateUserPost'])->name('admin.updateUserPost');
Route::get('/admin/search-user', [AdminController::class, 'searchUser'])->name('admin.searchUser');

//AdminController end


// USER ROUTE START

Route::controller(UserController::class)->prefix('users')->group(function () {
    Route::get('/', 'users')->name('users');
    Route::get('/pending', 'pendingUsers')->name('users.pending');
    Route::get('/search', 'users')->name('users.search');
    Route::get('/{id}/edit', 'edit')->name('users.edit');
    Route::put('/{id}', 'update')->name('users.update');
    Route::delete('/{id}', 'destroy')->name('users.destroy');
    Route::get('/profile/{id}','profile')->name('users.profile');
});

// USER ROUTE END





// RECRUITEMENT OFFICER ROUTE START


Route::controller(RegistrationController::class)->group(function () {
   Route::get('/register', 'register')->name('recruitment_officer.register');
   Route::post('/register-process','registerProcess')->name('recruitment_officer.registerProcess');
});



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

