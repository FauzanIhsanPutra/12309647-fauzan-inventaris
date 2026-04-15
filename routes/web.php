<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthLogin;
use App\Http\Controllers\StaffItemController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthLogin::class, 'showLogin'])->name('login');
Route::post('/login', [AuthLogin::class, 'login']);
Route::post('/logout', [AuthLogin::class, 'logout'])->name('logout');



Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::middleware('isAdmin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/items', ItemController::class);
    Route::get('/user/export', [UserController::class, 'export'])->name('users.export');
    Route::resource('admin/users', UserController::class);
});

// Route::resource('admin/categories', CategoryController::class);
// Route::resource('admin/items', ItemController::class);
// Route::get('/user/export', [UserController::class, 'export'])->name('users.export');
// Route::resource('admin/users', UserController::class);

Route::middleware('isOperator')->group(function () {
    Route::get('staff/dashboard', function () {
        return view('staff.dashboard');
    });
    Route::resource('staff/item', StaffItemController::class);
    Route::resource('staff/lending', LendingController::class);
    Route::get('/item/export', [ItemController::class, 'export'])->name('item.export');
    // Route::resource('profile', ProfileController::class);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

