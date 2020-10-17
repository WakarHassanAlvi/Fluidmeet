<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home/company/{company}/details', [App\Http\Controllers\CompanyController::class, 'show'])->name('company.view');
Route::get('home/companies/search', [App\Http\Controllers\CompanyController::class, 'search'])->name('company.search');

Auth::routes();

Route::middleware(['auth'])->group(function(){

    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');//because admin cannot be accessed without authentication

});
