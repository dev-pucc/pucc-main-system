<?php

use App\Http\Controllers\RecruitmentOfficer\RegistrationController;
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

// USER ROUTE END



// RECRUITEMENT OFFICER ROUTE START


    //route for displaying registration form
    Route::get('/register', [RegistrationController::class, 'register'])->name('recruitment_officer.register');

    //route for store registration data
    Route::post('/register-process', [RegistrationController::class, 'registerProcess'])->name('recruitment_officer.registerProcess');



// RECRUITEMENT OFFICER ROUTE END


//ADMIN ROUTE START

//ADMIN ROUTE END

//SECRETARY ROUTE START

//SECRETARY ROUTE END


//DIVISION LEAD ROUTE START

//DIVISION LEAD ROUTE END


//TRESURUR ROUTE START

//TRESURUR LEAD ROUTE END
