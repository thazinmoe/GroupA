<?php

namespace App\Providers;

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

        //travelpackage
        $this->app->bind('App\Contracts\Dao\TravelPackageDaoInterface','App\Dao\TravelPackageDao');
        $this->app->bind('App\Contracts\Services\TravelPackageServiceInterface','App\Services\TravelPackageService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
