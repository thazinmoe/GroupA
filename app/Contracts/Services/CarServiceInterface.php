<?php

namespace App\Contracts\Services;

use App\Http\Requests\StoreCarRequest;
use App\Models\Car;

/**
 * Interface for Data Accessing Object of Post
 */
interface CarServiceInterface
{
    /**
     * getCar function
     *
     * @return void
     */
    public function getCar();

    /**
     * getStoreCar function
     *
     * @param StoreCarRequest $request
     * @return void
     */
    public function getStoreCar(StoreCarRequest $request);

    /**
     * getUpdateCar function
     *
     * @param StoreCarRequest $request
     * @param Car $car
     * @return void
     */
    public function getUpdateCar(StoreCarRequest $request, Car $car);

    /**
     * getDeleteCar function
     *
     * @param Car $car
     * @return void
     */
    public function getDeleteCar(Car $car);
}
