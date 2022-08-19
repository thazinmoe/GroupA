<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerApiController;

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

//Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/', [App\Http\Controllers\PageController::class, 'home'])->name('viewHome');

Route::group(['middleware' => 'auth'], function () {

    Route::group([ 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/login',function () {
            return view('auth.login');
        });
        Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        //role and permission
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::get('exportuserexcel', [UserController::class, 'exportuserexcel']);
        Route::get('exportexcel', [CustomerApiController::class, 'exportexcel']);
        //cars
        Route::resource('cars', \App\Http\Controllers\Admin\CarController::class);
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
