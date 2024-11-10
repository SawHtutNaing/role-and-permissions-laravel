<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserController;
use App\Models\Permission;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     Route::get('/role-permissions', [RolePermissionController::class, 'index'])->name('role_permission.index');

// Route::post('/role-permissions', [RolePermissionController::class, 'assign'])->name('role_permission.assign');
Route::resource('roles',RoleController::class);
Route::resource('permissions',PermissionController::class);
Route::resource('features',FeatureController::class);
Route::resource('blogs',BlogController::class);
Route::resource('users', UserController::class);
});






require __DIR__.'/auth.php';
