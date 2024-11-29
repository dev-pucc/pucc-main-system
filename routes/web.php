<?php

use App\Http\Controllers\RecruitmentOfficer\RegistrationController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\DivisionLead\MeetingController;
use App\Http\Controllers\DivisionLead\CurriculumController;

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
    //calander start
    Route::get('/Secretary/Calendar', function () {
        return view('calander/view'); // Assuming your Blade file is `calendar.blade.php`
    })->name('secretary.calendar');



    //calander end
//SECRETARY ROUTE END


//DIVISION LEAD ROUTE START


// Route for the division lead index page
Route::get('/meetingIndex', function () {
    return view('division_lead.index');
});
// Grouping routes related to meetings
Route::prefix('meetings')->group(function () {
    // Show the list of all meetings
    Route::get('/', [MeetingController::class, 'showMeetings'])->name('meetings.index');   
    // Show students in a specific meeting
    Route::get('{id}/students', [MeetingController::class, 'getMeetingStudents']);   
    // Store a new meeting
    Route::post('/store', [MeetingController::class, 'store'])->name('meetings.store');   
    // Terminate a specific meeting
    Route::post('{id}/terminate', [MeetingController::class, 'terminateMeeting'])->name('meetings.terminate');    
});
// Check the meeting status
Route::get('/meetingIndex', [MeetingController::class, 'checkMeetingStatus'])->name('meetings.status');
// Route for storing attendance for a specific meeting
Route::post('/attendance/{meetingId}', [MeetingController::class, 'storeAttendance'])->name('attendance.store');


// Curriculum Resource Routes

// Show the Curriculum Resource of AI
Route::get('/ai', [CurriculumController::class, 'ai'])->name('ai');
// Show the Curriculum Resource of Devops
Route::get('/devops', [CurriculumController::class, 'devops'])->name('devops');
// Show the Curriculum Resource of Deep Learning
Route::get('/dl', [CurriculumController::class, 'dl'])->name('dl');
// Show the Curriculum Resource of Gaming
Route::get('/gaming', [CurriculumController::class, 'gaming'])->name('gaming');
// Show the Curriculum Resource of Networking
Route::get('/networking', [CurriculumController::class, 'networking'])->name('networking');


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

