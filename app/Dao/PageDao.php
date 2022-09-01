<?php

namespace App\Dao;

use App\Models\Car;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TravelPackage;
use App\Contracts\Dao\PageDaoInterface;
use App\Http\Requests\StoreEmailRequest;


/**
 * Data accessing object for page
 */
class PageDao implements PageDaoInterface
{
    /**
     * getCategories function
     *
     * @return void
     */
    public function getCategories()
    {
        return Category::with('travel_packages')->get();
    }

    /**
     * getPosts function
     *
     * @return void
     */
    public function getPosts()
    {
        return Post::get();
    }

    /**
     * getCars function
     *
     * @return void
     */
    public function getCars()
    {
        return Car::get();
    }

    /**
     * getCarId function
     *
     * @param TravelPackage $travelPackage
     * @return void
     */
    public function getCarId(TravelPackage $travelPackage)
    {
        return Car::find($travelPackage->car_id);
    }

    /**
     * getCategoryId function
     *
     * @param TravelPackage $travelPackage
     * @return void
     */
    public function getCategoryId(TravelPackage $travelPackage)
    {
        return Category::find($travelPackage->category_id);
    }

    /**
     * getTravelPackages function
     *
     * @return void
     */
    public function getTravelPackages()
    {
        return TravelPackage::orderBy('id', 'desc')->paginate(3);
    }

    /**
     * getPopPackages function
     *
     * @return void
     */
    public function getPopPackages()
    {
        $popu_packages = TravelPackage::leftJoin('customer_comfirms', 'package_id', '=', 'travel_packages.id')
            ->select('travel_packages.id', 'travel_packages.name', 'travel_packages.image', 'travel_packages.description', 'travel_packages.price', 'travel_packages.location', 'travel_packages.duration', 'travel_packages.slug', DB::raw("count('customer_comfirms.package_id') as customer_count"))
            ->groupBy('travel_packages.id')
            ->orderBy('customer_count', 'desc')
            ->having('customer_count', '>', 4)
            ->get();
        return $popu_packages;
    }

    /**
     * getTravelPackageById function
     *
     * @param [type] $id
     * @return void
     */
    public function getTravelPackageById($id)
    {
        return TravelPackage::where('category_id', $id)->get();
    }
}
