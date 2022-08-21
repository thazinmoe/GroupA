<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TravelPackageController;

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\PageController::class, 'home'])->name('viewHome');

Route::group(['middleware' => 'auth'], function () {

    Route::group([ 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/login',function () {
            return view('auth.login');
        });
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        //role and permission
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::get('exportuserexcel', [UserController::class, 'exportuserexcel']);
        Route::get('exportexcel', [CustomerController::class, 'exportexcel']);
        //cars
        Route::resource('cars', \App\Http\Controllers\Admin\CarController::class);
        Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::get('customers', [CustomerController::class, 'index'])->name('customers');
        Route::get('delete-customer/{id}', [CustomerController::class, 'destroy'])->name('destroy');
        //travelpackage
        Route::resource('travel-packages',TravelPackageController::class);
        Route::post('travel-packages/search', [App\Http\Controllers\Admin\TravelPackageController::class, 'search'])->name('package-search');
    });
});
Route::get('customers', [CustomerController::class, 'index']);
Route::get('add-customer/{travelPackage:slug}', [CustomerController::class, 'create'])->name('add-customer');
Route::post('add-customer/{travelPackage:slug}', [CustomerController::class, 'store'])->name('add-customer');
Route::get('/{id}/completed', [CustomerController::class, 'completed']);
Route::get('edit-customer/{id}', [CustomerController::class, 'edit']);
Route::put('update-customer/{id}', [CustomerController::class, 'update']);
