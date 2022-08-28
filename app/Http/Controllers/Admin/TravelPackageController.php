<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Contracts\Services\TravelPackageServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreTravelPackageRequest;

class TravelPackageController extends Controller
{
    /**
     * TravelPackage interface
     */
    private $travelpackageInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function __construct(TravelPackageServiceInterface $travelpackageServiceInterface)
    {
         $this->middleware('permission:travelPackage-list|travelPackage-create|travelPackage-edit|travelPackage-delete', ['only' => ['index','show']]);
         $this->middleware('permission:travelPackage-create', ['only' => ['create','store']]);
         $this->middleware('permission:travelPackage-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:travelPackage-delete', ['only' => ['destroy']]);
         $this->travelpackageInterface = $travelpackageServiceInterface;
    }

    public function index()
    {
        $travelPackages = $this->travelpackageInterface->gettravelpackage();

        return view('admin.travel-packages.index', compact('travelPackages'));
    }
    
    public function search(Request $request)
    {      
        $travelPackages = $this->travelpackageInterface->getsearch($request);
        return view('admin.travel-packages.index',compact('travelPackages'));
    }

    public function create()
    {
        $categories = $this->travelpackageInterface->getcategory();
        $cars = $this->travelpackageInterface->getcar();
        return view('admin.travel-packages.create', compact('categories','cars'));
    }

    public function store(StoreTravelPackageRequest $request)
    {
        $this->travelpackageInterface->packageStore($request);
        return redirect()->route('admin.travel-packages.index')->with('message', 'Package Added Successfully !');
    }

    public function edit(TravelPackage $travelPackage)
    {
        $categories = Category::get();
        $cars = Car::get();     
        $car_id = Car::find($travelPackage->car_id);
        $car_price = $car_id->price;
        $categories = $this->travelpackageInterface->getcategory();
        $cars = $this->travelpackageInterface->getcar();
        return view('admin.travel-packages.edit', compact('travelPackage', 'categories','cars','car_price'));
    }

    public function update(StoreTravelPackageRequest $request, TravelPackage $travelPackage)
    {
        $this->travelpackageInterface->packageUpdate($request,$travelPackage);
        return redirect()->route('admin.travel-packages.index')->with('message', 'Updated Successfully !');
    }

    public function destroy(TravelPackage $travelPackage)
    {
        $this->travelpackageInterface->packageDestroy($travelPackage);
        return redirect()->route('admin.travel-packages.index')->with('message', 'Deleted Successfully');
    }
}
