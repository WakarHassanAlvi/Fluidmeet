<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){

    
    Route::get('admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');
    Route::put('admin/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');

    Route::get('admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::delete('admin/users/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

});

Route::middleware(['role:Admin', 'auth'])->group(function(){//Admin is the role parameter

    
    Route::get('admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::put('admin/users/{user}/attach', [App\Http\Controllers\UserController::class, 'attachRole'])->name('user.role.attach');
    Route::put('admin/users/{user}/detach', [App\Http\Controllers\UserController::class, 'detachRole'])->name('user.role.detach');

});

Route::middleware(['can:view,user'])->group(function(){//calling userpolicy method view with parameter user.

    Route::get('admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');

});