<?php

use App\Http\Livewire\UsersTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TrainerController;

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


// Login 
Route::get('/', [Controller::class, 'index'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


// Admin Route
Route::prefix('admin')->middleware(['role:1'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/users', [AdminController::class, 'route_users'])->name('admin.users');
        Route::get('/add_user', [AdminController::class, 'route_add_user'])->name('admin.add.user');
        Route::get('/user/{id}/view', [AdminController::class, 'route_view_user'])->name('admin.view.user');
        Route::get('/members', [AdminController::class, 'route_members'])->name('admin.members');

        // Route::get('/back', [AdminController::class, 'route_back'])->name('admin.back');
});

// Staff Route
Route::prefix('staff')->middleware(['role:2'])->group(function () {
        Route::get('/', [StaffController::class, 'index'])->name('staff.index');
});

// Trainer Role
Route::prefix('/trainer')->middleware(['role:3'])->group(function () {
        Route::get('/', [TrainerController::class, 'index'])->name('trainer.index');
});

// Member Role
Route::prefix('/member')->middleware(['role:4'])->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('member.index');
});
