<?php

namespace App\Services;

use App\Contracts\Dao\CarDaoInterface;
use App\Contracts\Services\CarServiceInterface;
use App\Http\Requests\StoreCarRequest;
use App\Models\Car;

/**
 * Service class for post.
 */
class CarService implements CarServiceInterface
{
    /**
     * postDao
     */
    private $carDao;
    /**
     * Class Constructor
     * @param CarDaoInterface
     * @return
     */
    public function __construct(CarDaoInterface $carDaoInterface)
    {
        $this->carDao = $carDaoInterface;
    }

    /**
     * getCar function
     *
     * @return void
     */
    public function getCar()
    {
        return $this->carDao->getCar();
    }

    /**
     * getStoreCar function
     *
     * @param StoreCarRequest $request
     * @return void
     */
    public function getStoreCar(StoreCarRequest $request)
    {
        return $this->carDao->getStoreCar($request);
    }

    /**
     * getUpdateCar function
     *
     * @param StoreCarRequest $request
     * @param Car $car
     * @return void
     */
    public function getUpdateCar(StoreCarRequest $request, Car $car)
    {
        return $this->carDao->getUpdateCar($request, $car);
    }

    /**
     * getDeleteCar function
     *
     * @param Car $car
     * @return void
     */
    public function getDeleteCar(Car $car)
    {
        return $this->carDao->getDeleteCar($car);
    }

}
