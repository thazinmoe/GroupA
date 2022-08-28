<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Http\Requests\StoreTravelPackageRequest;
/**
 * Interface for Data Accessing Object of TravelPackage
 */
interface TravelPackageServiceInterface
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function gettravelpackage();

    /**
     * getsearch function
     *
     * @param StoreTravelPackageRequest $request
     * @return void
     */
    public function getsearch(StoreTravelPackageRequest $request);

    /**
     * getcategory function
     *
     * @return void
     */
    public function getcategory();

    /**
     * getcar function
     *
     * @return void
     */
    public function getcar();

    /**
     * packageStore function
     *
     * @param StoreTravelPackageRequest $request
     * @return void
     */
    public function packageStore(StoreTravelPackageRequest $request);

    /**
     * packageUpdate function
     *
     * @param StoreTravelPackageRequest $request
     * @param TravelPackage $travelPackage
     * @return void
     */
    public function packageUpdate(StoreTravelPackageRequest $request,TravelPackage $travelPackage);

    /**
     * packageDestroy function
     *
     * @param TravelPackage $travelPackage
     * @return void
     */
    public function packageDestroy(TravelPackage $travelPackage);
}
