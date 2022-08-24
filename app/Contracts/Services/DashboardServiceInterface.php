<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of dashboard
 */
interface DashboardServiceInterface
{
    public function package();
    public function category();
    public function post();
    public function car();
}