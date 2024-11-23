<?php

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