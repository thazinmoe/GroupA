<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Customer
        $this->app->bind('App\Contracts\Dao\CustomerDaoInterface', 'App\Dao\CustomerDao');
        $this->app->bind('App\Contracts\Services\CustomerServiceInterface', 'App\Services\CustomerService');
        //Category
        $this->app->bind('App\Contracts\Dao\CategoryDaoInterface', 'App\Dao\CategoryDao');
        $this->app->bind('App\Contracts\Services\CategoryServiceInterface', 'App\Services\CategoryService');
        //Post
        $this->app->bind('App\Contracts\Dao\PostDaoInterface', 'App\Dao\PostDao');
        $this->app->bind('App\Contracts\Services\PostServiceInterface', 'App\Services\PostService');
        
        //travelpackage
        $this->app->bind('App\Contracts\Dao\TravelPackageDaoInterface','App\Dao\TravelPackageDao');
        $this->app->bind('App\Contracts\Services\TravelPackageServiceInterface','App\Services\TravelPackageService');
  
        //car
        $this->app->bind('App\Contracts\Dao\CarDaoInterface','App\Dao\CarDao');
        $this->app->bind('App\Contracts\Services\CarServiceInterface','App\Services\CarService');

        //dashboard
        $this->app->bind('App\Contracts\Dao\DashboardDaoInterface','App\Dao\DashboardDao');
        $this->app->bind('App\Contracts\Services\DashboardServiceInterface','App\Services\DashboardService');
        
        

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
