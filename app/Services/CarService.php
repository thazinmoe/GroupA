<?php

namespace App\Services;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Contracts\Dao\CarDaoInterface;
use App\Http\Requests\StoreCarRequest;
use App\Contracts\Services\CarServiceInterface;


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

  public function getCar()
  {
    return $this->carDao->getCar();
  }
  public function getStoreCar(StoreCarRequest $request)
  {
    return $this->carDao->getStoreCar($request);
  }
  public function getUpdateCar(StoreCarRequest $request, Car $car)
  {
    return $this->carDao->getUpdateCar($request ,$car);
  }
  public function getDeleteCar(Car $car)
  {
    return $this->carDao->getDeleteCar($car);
  }
 
}
