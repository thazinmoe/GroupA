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
    public function package() {
        $packages = TravelPackage::count();
        return $packages;
    }

    public function category() {
        $categories = Category::count();
        return $categories;
    }

    public function post() {
        $posts = Post::count();
        return $posts;
    }

    public function car() {
        $cars = Car::count();
        return $cars;
    }
}