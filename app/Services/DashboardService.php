<?php

namespace App\Services;

use App\Models\Car;
use App\Models\Post;
use App\Models\Category;
use App\Models\TravelPackage;
use App\Contracts\Dao\DashboardDaoInterface;
use App\Contracts\Services\DashboardServiceInterface;

/**
 * Serivce class for dashboard
 */
class DashboardService implements DashboardServiceInterface
{
    /**
     * Class DashboardDao
     */
    private $dashboardDao;
    /**
     * Class Constructor
     * @param DashboardDaoInterface
     * @return
     */
    public function __construct(DashboardDaoInterface $dashboardDaoInterface)
    {
        $this->dashboardDao = $dashboardDaoInterface;
    }

    /**
     * package function
     *
     * @return void
     */
    public function package() {
        return $this->dashboardDao->package();
    }

    /**
     * category function
     *
     * @return void
     */
    public function category() {
        return $this->dashboardDao->category();
    }

    /**
     * post function
     *
     * @return void
     */
    public function post() {
        return $this->dashboardDao->post();
    }
    
    /**
     * car function
     *
     * @return void
     */
    public function car() {
        return $this->dashboardDao->car();
    }
}