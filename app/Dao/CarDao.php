<?php

namespace App\Dao;

use App\Models\Car;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Contracts\Dao\CarDaoInterface;
use App\Http\Requests\StoreCarRequest;

/**
 * Data accessing object for post
 */
class CarDao implements CarDaoInterface
{
  public function getCar()
  {
    $car = Car::get();
    return $car;
  }
  public function getStoreCar(StoreCarRequest $request)
  {
       $data = $request->all();
       $data['image'] = $request->file('image')->store(
        'assets/car', 'public'
       );

       Car::create($data);
    
  }
  public function getUpdateCar(StoreCarRequest $request, Car $car)
  {
         if($request->image){
         File::delete('storage/' . $car->image);
         }
  
        $data = $request->all();
        $data['image'] = $request->image ? $request->file('image')->store(
         'assets/car', 'public'
      ) : $car->image;

        $car->update($data);
    
  }
  public function getDeleteCar(Car $car)
  {
    $car->delete();
    
  }
}
