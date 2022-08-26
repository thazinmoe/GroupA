<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of dashboard
 */
interface DashboardDaoInterface
{
    public function package();
    public function category();
    public function post();
    public function car();
}