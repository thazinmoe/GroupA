<?php

namespace App\Contracts\Dao;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCarRequest;

/**
 * Interface for Data Accessing Object of Car
 */
interface CarDaoInterface
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
