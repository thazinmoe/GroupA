<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Contracts\Dao\TravelPackageDaoInterface;
use App\Http\Requests\StoreTravelPackageRequest;
use App\Contracts\Services\TravelPackageServiceInterface;

/**
 * Serivce class for travelpackage
 */
class TravelPackageService implements TravelPackageServiceInterface
{
    /**
     * Class TravelpackageDao
     */
    private $travelpackageDao;
    /**
     * Class Constructor
     * @param TravelPackageDaoInterface
     * @return
     */
    public function __construct(TravelPackageDaoInterface $travelpackageDaoInterface)
    {
        $this->travelpackageDao = $travelpackageDaoInterface;
    }
    public function gettravelpackage() {
        return $this->travelpackageDao->gettravelpackage();
    }
    public function getsearch(Request $request) {
        return $this->travelpackageDao->getsearch($request);
    }
    public function getcategory() {
        return $this->travelpackageDao->getcategory();
    }
    public function getcar() {
        return $this->travelpackageDao->getcar();
    }
    public function packageStore(StoreTravelPackageRequest $request) {
        return $this->travelpackageDao->packageStore($request);
    }
    public function packageUpdate(StoreTravelPackageRequest $request,TravelPackage $travelPackage) {
        return $this->travelpackageDao->packageUpdate($request,$travelPackage);
    }
    public function packageDestroy(TravelPackage $travelPackage) {
        return $this->travelpackageDao->packageDestroy($travelPackage);
    }

}