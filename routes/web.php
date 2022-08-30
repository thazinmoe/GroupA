<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
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
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [PageController::class, 'home'])->name('viewHome');

//packageTravel(Hnin Yu Yu Lwin)
Route::get('package-travel', [PageController::class, 'package'])->name('package');
Route::get('package-travel/{id}', [PageController::class, 'package_by_cat'])->name('package_by_cat');
Route::get('detail/{travelPackage:slug}', [PageController::class, 'detail'])->name('detail');

//posts(Eaindra MyoMyint)
Route::get('posts', [PageController::class, 'posts'])->name('posts');
Route::get('posts/{post:slug}', [PageController::class, 'detailPost'])->name('posts.show');

//contact(Thazin Moe)
Route::get('contact', [PageController::class, 'contact'])->name('contact');
Route::post('contact', [PageController::class, 'getEmail'])->name('contact.email');

//start customer(Thazin Moe)
Route::get('add-customer/{travelPackage:slug}', [CustomerController::class, 'create'])->name('add-customer');
Route::post('add-customer/{travelPackage:slug}', [CustomerController::class, 'store'])->name('add-customer');
//end customer

Route::group(['middleware' => 'prevent-back-history'],function(){
Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/login', function () {
            return view('auth.login');
        });
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        //role and permission(TZM&EMM)
        // start role 
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
        Route::get('roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::patch('roles/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::get('roles/{id}', [RoleController::class, 'show'])->name('roles.show');
        Route::delete('roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
        // end role

        // start user (TZM&EMM)
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('users', [UserController::class, 'store'])->name('users.store');
        Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::patch('users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('exportuserexcel', [UserController::class, 'exportuserexcel']);
        // end user

        // start category (Thazin Moe)
        Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        // end category 

        //customer-info(Thazin Moe)
        Route::get('exportexcel', [CustomerController::class, 'exportexcel']);
        Route::get('customers', [CustomerController::class, 'index'])->name('customers');
        Route::get('delete-customer/{id}', [CustomerController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/completed', [CustomerController::class, 'completed']);

        // start post(Eaindra MyoMyint)  
        Route::get('posts', [PostController::class, 'index'])->name('posts.index');
        Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('posts', [PostController::class, 'store'])->name('posts.store');
        Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
        // end post 

        // start car (Thein Htike Soe)
        Route::get('cars', [CarController::class, 'index'])->name('cars.index');
        Route::get('cars/create', [CarController::class, 'create'])->name('cars.create');
        Route::post('cars', [CarController::class, 'store'])->name('cars.store');
        Route::get('cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
        Route::put('cars/{car}', [CarController::class, 'update'])->name('cars.update');
        Route::delete('cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
        // end car 
         
        // start travel Package(Hnin Yu Yu Lwin)
        Route::get('travel-packages', [TravelPackageController::class, 'index'])->name('travel-packages.index');
        Route::get('travel-packages/create', [TravelPackageController::class, 'create'])->name('travel-packages.create');
        Route::post('travel-packages', [TravelPackageController::class, 'store'])->name('travel-packages.store');
        Route::get('travel-packages/{travelPackage}/edit', [TravelPackageController::class, 'edit'])->name('travel-packages.edit');
        Route::put('travel-packages/{travelPackage}', [TravelPackageController::class, 'update'])->name('travel-packages.update');
        Route::delete('travel-packages/{travelPackage}', [TravelPackageController::class, 'destroy'])->name('travel-packages.destroy');
        Route::post('travel-packages/search', [TravelPackageController::class, 'search'])->name('package-search');
        // end travel package  

    });
});
});