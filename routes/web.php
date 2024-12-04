<?php

use App\Http\Controllers\UserRegistration\RegistrationController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\DivisionLead\MeetingController;
use App\Http\Controllers\DivisionLead\CurriculumController;
use App\Http\Controllers\Notice\NoticeController;
use App\Http\Controllers\Payment\PaymentController;

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
 
Route::get('/users', [UserController::class, 'users'])->name('users');
Route::get('/users/pending', [UserController::class, 'pendingUsers'])->name('users.pending');
Route::get('/users/search', [UserController::class, 'users'])->name('users.search');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/profile/{id}', [UserController::class, 'profile'])->name('users.profile');


// USER ROUTE END





// RECRUITEMENT OFFICER ROUTE START


Route::get('/register',[RegistrationController::class, 'register'])->name('user_registration.register');
Route::post('/register-process',[RegistrationController::class, 'registerProcess'])->name('user_registration.registerProcess');

// RECRUITEMENT OFFICER ROUTE END


//ADMIN ROUTE START

//ADMIN ROUTE END


//SECRETARY ROUTE START

//calander start

Route::get('/Secretary', function () {
    return view('calander/index'); 
})->name('secretary.calendar');

//calander end


//notice start

Route::get('/notice/create', [NoticeController::class, 'create'])->name('notice.create');
Route::post('/notice/store', [NoticeController::class, 'store'])->name('notice.store');
Route::get('/notice', [NoticeController::class, 'index'])->name('notice.index');
Route::get('/notice/{id}', [NoticeController::class, 'show'])->name('notice.show');

//notice end

//SECRETARY ROUTE END


//DIVISION LEAD ROUTE START

//MeetingController start

// Show the list of all meetings
Route::get('/meetings', [MeetingController::class, 'showMeetings'])->name('meetings.index');
// Show students in a specific meeting
Route::get('/meetings/{id}/students', [MeetingController::class, 'getMeetingStudents']);
 // Store a new meeting
Route::post('/meetings/store', [MeetingController::class, 'store'])->name('meetings.store');
// Terminate a specific meeting
Route::post('/meetings/{id}/terminate', [MeetingController::class, 'terminateMeeting'])->name('meetings.terminate');
// Check the meeting status
Route::get('/meetings/meetingIndex', [MeetingController::class, 'checkMeetingStatus'])->name('meetings.status');
// Route for storing attendance for a specific meeting
Route::post('/meetings/attendance/{meetingId}', [MeetingController::class, 'storeAttendance'])->name('attendance.store');

//MeetingController end


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
Route::get('/payment/{page}', [PaymentController::class, 'create']);
Route::post('/payment', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::get('/payments/show', [PaymentController::class, 'show'])->name('payments.show');
Route::get('payments/{id}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
Route::delete('payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');
Route::put('payments/{id}', [PaymentController::class, 'update'])->name('payments.update');
//TRESURUR LEAD ROUTE END
