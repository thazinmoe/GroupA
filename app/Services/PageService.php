<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Contracts\Dao\PageDaoInterface;
use App\Http\Requests\StoreEmailRequest;
use App\Contracts\Services\PageServiceInterface;

/**
 * Serivce class for page
 */
class PageService implements PageServiceInterface
{
    /**
     * pageDao
     */
    private $pageDao;
    /**
     * Class Constructor
     * @param PageDaoInterface
     * @return
     */
    public function __construct(PageDaoInterface $pageDaoInterface)
    {
        $this->pageDao = $pageDaoInterface;
    }

    /**
     * getCategories function
     *
     * @return void
     */
    public function getCategories()
    {
        return $this->pageDao->getCategories();
    }

    /**
     * getPosts function
     *
     * @return void
     */
    public function getPosts()
    {
        return $this->pageDao->getPosts();
    }

    /**
     * getCars function
     *
     * @return void
     */
    public function getCars()
    {
        return $this->pageDao->getCars();
    }

    /**
     * getCarId function
     *
     * @param TravelPackage $travelPackage
     * @return void
     */
    public function getCarId(TravelPackage $travelPackage)
    {
        return $this->pageDao->getCarId($travelPackage);
    }

    /**
     * getCategoryId function
     *
     * @param TravelPackage $travelPackage
     * @return void
     */
    public function getCategoryId(TravelPackage $travelPackage)
    {
        return $this->pageDao->getCategoryId($travelPackage);
    }

    /**
     * getTravelPackages function
     *
     * @return void
     */
    public function getTravelPackages()
    {
        return $this->pageDao->getTravelPackages();
    }

    /**
     * getTravelPackageById function
     *
     * @param [type] $id
     * @return void
     */
    public function getTravelPackageById($id)
    {
        return $this->pageDao->getTravelPackageById($id);
    }

    /**
     * getPopPackages function
     *
     * @return void
     */
    public function getPopPackages()
    {
        return $this->pageDao->getPopPackages();
    }
}
