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

Auth::routes();

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

//TRESURUR LEAD ROUTE END

