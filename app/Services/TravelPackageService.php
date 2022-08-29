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

    /**
     * gettravelpackage function
     *
     * @return void
     */
    public function gettravelpackage() {
        return $this->travelpackageDao->gettravelpackage();
    }

    /**
     * getsearch function
     *
     * @param Request $request
     * @return void
     */
    public function getsearch(Request $request) {
        return $this->travelpackageDao->getsearch($request);
    }

    /**
     * getcategory function
     *
     * @return void
     */
    public function getcategory() {
        return $this->travelpackageDao->getcategory();
    }

    /**
     * getcar function
     *
     * @return void
     */
    public function getcar() {
        return $this->travelpackageDao->getcar();
    }

    /**
     * packageStore function
     *
     * @param StoreTravelPackageRequest $request
     * @return void
     */
    public function packageStore(StoreTravelPackageRequest $request) {
        return $this->travelpackageDao->packageStore($request);
    }

    /**
     * packageUpdate function
     *
     * @param StoreTravelPackageRequest $request
     * @param TravelPackage $travelPackage
     * @return void
     */
    public function packageUpdate(StoreTravelPackageRequest $request,TravelPackage $travelPackage) {
        return $this->travelpackageDao->packageUpdate($request,$travelPackage);
    }

    /**
     * packageDestroy function
     *
     * @param TravelPackage $travelPackage
     * @return void
     */
    public function packageDestroy(TravelPackage $travelPackage) {
        return $this->travelpackageDao->packageDestroy($travelPackage);
    }

}