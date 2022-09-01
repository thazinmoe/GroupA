<?php

namespace App\Dao;

use App\Contracts\Dao\CarDaoInterface;
use App\Http\Requests\StoreCarRequest;
use App\Models\Car;
use Illuminate\Support\Facades\File;

/**
 * Data accessing object for Car
 */
class CarDao implements CarDaoInterface
{
    /**
     * getCar function
     *
     * @return void
     */
    public function getCar()
    {
        $car = Car::get();
        return $car;
    }

    /**
     * getStoreCar function
     *
     * @param StoreCarRequest $request
     * @return void
     */
    public function getStoreCar(StoreCarRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/car', 'public'
        );

        Car::create($data);
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
        if ($request->image) {
            File::delete('storage/' . $car->image);
        }

        $data = $request->all();
        $data['image'] = $request->image ? $request->file('image')->store(
            'assets/car', 'public'
        ) : $car->image;

        $car->update($data);

    }

    /**
     * getDeleteCar function
     *
     * @param Car $car
     * @return void
     */
    public function getDeleteCar(Car $car)
    {
        $car->delete();

    }
}
