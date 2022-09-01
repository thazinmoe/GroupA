<?php

namespace App\Contracts\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Http\Requests\StoreEmailRequest;

/**
 * Interface for Data Accessing Object of Page
 */
interface PageServiceInterface
{
    /**
     * getCategories function
     *
     * @return void
     */
    public function getCategories();

    /**
     * getPosts function
     *
     * @return void
     */
    public function getPosts();

    /**
     * getCars function
     *
     * @return void
     */
    public function getCars();

    /**
     * getCarId function
     *
     * @param TravelPackage $travelPackage
     * @return void
     */
    public function getCarId(TravelPackage $travelPackage);

    /**
     * getCategoryId function
     *
     * @param TravelPackage $travelPackage
     * @return void
     */
    public function getCategoryId(TravelPackage $travelPackage);

    /**
     * getTravelPackages function
     *
     * @return void
     */
    public function getTravelPackages();

    /**
     * getTravelPackageById function
     *
     * @param [type] $id
     * @return void
     */
    public function getTravelPackageById($id);

    /**
     * getPopPackages function
     *
     * @return void
     */
    public function getPopPackages();
}
