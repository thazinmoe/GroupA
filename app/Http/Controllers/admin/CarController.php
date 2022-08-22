<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreCarRequest;
use App\Contracts\Services\CarServiceInterface;

class CarController extends Controller
{
    /**
     * Post interface
     */
    private $carInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function __construct(CarServiceInterface $carServiceInterface)
    {
         $this->middleware('permission:car-list|car-create|car-edit|car-delete', ['only' => ['index','show']]);
         $this->middleware('permission:car-create', ['only' => ['create','store']]);
         $this->middleware('permission:car-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:car-delete', ['only' => ['destroy']]);
         $this->carInterface = $carServiceInterface;
    }
    public function index() : View
    {
        $cars = $this->carInterface->getCar();

        return view('admin.cars.index', compact('cars'));
    }

    public function create() : View
    {
        return view('admin.cars.create');
    }

    public function store(StoreCarRequest $request) : RedirectResponse
    {
//        $data = $request->all();
//        $data['image'] = $request->file('image')->store(
//            'assets/car', 'public'
//        );
//
//        Car::create($data);
         $data = $this->carInterface->getStoreCar($request);
        return redirect()->route('admin.cars.index')->with('message', 'Added Successfully !');
    }

    public function edit(Car $car) : View
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(StoreCarRequest $request, Car $car)
    {
//        if($request->image){
//            File::delete('storage/' . $car->image);
//        }
//        
//        $data = $request->all();
//        $data['image'] = $request->image ? $request->file('image')->store(
//            'assets/car', 'public'
//        ) : $car->image;
//
//        $car->update($data);
           $data = $this->carInterface->getUpdateCar($request , $car);

        return redirect()->route('admin.cars.index')->with('message', 'Updated Successfully !');
    }

    public function destroy(Car $car)
    {
        //$car->delete();
        $car = $this->carInterface->getDeleteCar($car);

        return redirect()->route('admin.cars.index')->with('message', 'Deleted Successfully !');
    }
}
