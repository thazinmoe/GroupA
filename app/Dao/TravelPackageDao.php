<?php

namespace App\Dao;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use Illuminate\Support\Facades\File;
use App\Contracts\Dao\TravelPackageDaoInterface;
use App\Http\Requests\StoreTravelPackageRequest;

/**
 * Data accessing object for travelpackage
 */
class TravelPackageDao implements TravelPackageDaoInterface
{
    public function gettravelpackage() {
        $travelPackages = TravelPackage::orderBy('id','desc')->paginate(5);
        return $travelPackages;
    }

    public function getsearch(Request $request) {
        
        if($request->isMethod('post')){
            $search = $request->get('search');

            $travelPackages = TravelPackage::where('name','LIKE','%'.$search.'%')->orWhere('location','LIKE','%'.$search.'%')->orderBy('id','desc')->get();
        }
        return $travelPackages;
    }

    public function getcategory() {
        $categories = Category::get();
        return $categories;
    }

    public function getcar() {
        $cars = Car::get();
        return $cars;
    }

    public function packageStore(StoreTravelPackageRequest $request) {
        $data = $request->all();
        $carId = Car::find($request->car_id);
        $carOriginPrice = $carId->price;
        $car_price = $carOriginPrice;
        $pack_price = $data['price'];        
        $total = $car_price + $pack_price;        
        $data['price'] = $total;
        $data['image'] = $request->file('image')->store(
            'assets/package', 'public'
        );
        $slug = Str::slug($request->name);
        return TravelPackage::create($data + ["slug" => $slug]);
    }

    public function packageUpdate(StoreTravelPackageRequest $request,TravelPackage $travelPackage) {
        if ($request->image) {
            File::delete('storage/' . $travelPackage->image);
        }

        $data = $request->all();
        
        $carId = Car::find($request->car_id);
        $carOriginPrice = $carId->price;
        $car_price = $carOriginPrice; 
        $pack_price = $data['price'];        
        $total = $car_price + $pack_price;
        $data['price'] = $total;
        $data['image'] = $request->image ? $request->file('image')->store(
            'assets/package', 'public'
        ) : $travelPackage->image;

        $slug = Str::slug($request->name);
        return $travelPackage->update($data + ["slug" => $slug]);
    }
    
    public function packageDestroy(TravelPackage $travelPackage) {
        $destination = 'storage/' . $travelPackage->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        return $travelPackage->delete();
    }
}
