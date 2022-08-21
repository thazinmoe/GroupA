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
    public function gettravelpackage();
    public function getsearch(StoreTravelPackageRequest $request);
    public function getcategory();
    public function getcar();
    public function packageStore(StoreTravelPackageRequest $request);
    public function packageUpdate(StoreTravelPackageRequest $request,TravelPackage $travelPackage);
    public function packageDestroy(TravelPackage $travelPackage);
}
