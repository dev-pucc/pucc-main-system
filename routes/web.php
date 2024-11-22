<?php

use App\Http\Controllers\RecruitmentOfficer\RegistrationController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// USER ROUTE START

Route::controller(UserController::class)->prefix('users')->group(function () {
    Route::get('/', 'users')->name('users');
    Route::get('/{id}/edit', 'edit')->name('users.edit');
    Route::put('/{id}', 'update')->name('users.update');
    Route::delete('/{id}', 'destroy')->name('users.destroy');
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
