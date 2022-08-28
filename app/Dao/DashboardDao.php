<?php

namespace App\Dao;

use App\Models\Car;
use App\Models\Post;
use App\Models\Category;
use App\Models\TravelPackage;
use App\Contracts\Dao\DashboardDaoInterface;
use App\Dao\DashboardDao;

/**
 * Data accessing object for dashboard
 */
class DashboardDao implements DashboardDaoInterface
{
    /**
     * package function
     *
     * @return void
     */
    public function package() {
        $packages = TravelPackage::count();
        return $packages;
    }

    /**
     * category function
     *
     * @return void
     */
    public function category() {
        $categories = Category::count();
        return $categories;
    }

    /**
     * post function
     *
     * @return void
     */
    public function post() {
        $posts = Post::count();
        return $posts;
    }

    /**
     * car function
     *
     * @return void
     */
    public function car() {
        $cars = Car::count();
        return $cars;
    }
}