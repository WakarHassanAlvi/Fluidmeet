<?php

use Illuminate\Support\Facades\Route;


Route::get('admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
Route::post('admin/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('role.store');
Route::delete('admin/roles/{role}/destroy', [App\Http\Controllers\RoleController::class, 'destroy'])->name('role.destroy');
Route::get('admin/roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit');
Route::put('admin/roles/{role}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('role.update');
Route::put('admin/roles/{role}/attach/permission', [App\Http\Controllers\RoleController::class, 'attach_permission'])->name('role.permission.attach');
Route::put('admin/roles/{role}/detach/permission', [App\Http\Controllers\RoleController::class, 'detach_permission'])->name('role.permission.detach');