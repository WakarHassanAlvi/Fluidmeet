<?php

use Illuminate\Support\Facades\Route;


Route::get('admin/companies', [App\Http\Controllers\CompanyController::class, 'index'])->name('companies.index');
Route::get('admin/companies/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
Route::post('admin/companies', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
Route::delete('admin/companies/{company}/destroy', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('company.destroy');
Route::get('admin/companies/{company}/edit', [App\Http\Controllers\CompanyController::class, 'edit'])->name('company.edit');
Route::patch('admin/companies/{company}/update', [App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
