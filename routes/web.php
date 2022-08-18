<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/', [App\Http\Controllers\PageController::class, 'home'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'isAdmin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('cars', \App\Http\Controllers\Admin\CarController::class);
        Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::get('customers', [CustomerApiController::class, 'index'])->name('customers');
        Route::get('delete-customer/{id}', [CustomerApiController::class, 'destroy'])->name('destroy');
    });
});
Route::get('customers', [CustomerApiController::class, 'index']);
Route::get('add-customer/{travelPackage:slug}', [CustomerApiController::class, 'create'])->name('add-customer');
Route::post('add-customer/{travelPackage:slug}', [CustomerApiController::class, 'store'])->name('add-customer');
Route::get('/{id}/completed', [CustomerApiController::class, 'completed']);
Route::get('edit-customer/{id}', [CustomerApiController::class, 'edit']);
Route::put('update-customer/{id}', [CustomerApiController::class, 'update']);

