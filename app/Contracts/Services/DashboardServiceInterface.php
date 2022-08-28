<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of dashboard
 */
interface DashboardServiceInterface
{
    /**
     * package function
     *
     * @return void
     */
    public function package();

    /**
     * category function
     *
     * @return void
     */
    public function category();

    /**
     * post function
     *
     * @return void
     */
    public function post();

    /**
     * car function
     *
     * @return void
     */
    public function car();
}