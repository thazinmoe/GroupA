<?php

namespace App\Contracts\Dao;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCarRequest;

/**
 * Interface for Data Accessing Object of Post
 */
interface CarDaoInterface
{
    public function getCar();
    public function getStoreCar(StoreCarRequest $request);
    public function getUpdateCar(StoreCarRequest $request, Car $car);
    public function getDeleteCar(Car $car);
}
