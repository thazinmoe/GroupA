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
    /**
     * gettravelpackage function
     *
     * @return void
     */
    public function gettravelpackage() {
        $travelPackages = TravelPackage::orderBy('id','desc')->paginate(5);
        return $travelPackages;
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function getsearch(Request $request) {
        
        if($request->isMethod('post')){
            $search = $request->get('search');

            $travelPackages = TravelPackage::where('name','LIKE','%'.$search.'%')->orWhere('location','LIKE','%'.$search.'%')->orderBy('id','desc')->get();
        }
        return $travelPackages;
    }

    /**
     * getcategory function
     *
     * @return void
     */
    public function getcategory() {
        $categories = Category::get();
        return $categories;
    }

    /**
     * getcar function
     *
     * @return void
     */
    public function getcar() {
        $cars = Car::get();
        return $cars;
    }

    /**
     * packageStore function
     *
     * @param StoreTravelPackageRequest $request
     * @return void
     */
    public function packageStore(StoreTravelPackageRequest $request) {
        $data = $request->all();

        $car_price = $data['car_id'];

        $pack_price = $data['price'];
        
        $total = $car_price + $pack_price;
        
        $data['price'] = $total;
        $data['image'] = $request->file('image')->store(
            'assets/package', 'public'
        );
        $slug = Str::slug($request->name);
        return TravelPackage::create($data + ["slug" => $slug]);
    }

    /**
     * packageUpdate function
     *
     * @param StoreTravelPackageRequest $request
     * @param TravelPackage $travelPackage
     * @return void
     */
    public function packageUpdate(StoreTravelPackageRequest $request,TravelPackage $travelPackage) {
        if ($request->image) {
            File::delete('storage/' . $travelPackage->image);
        }

        $data = $request->all();
        
        $car_price = $data['car_id'];

        $pack_price = $data['price'];
        
        $total = $car_price + $pack_price;

        $data['price'] = $total;

        if(request()->hasFile('image') && request('image') != ''){
            $imagePath = public_path('storage/'.$travelPackage->image);
            if(File::exists($imagePath)){
                unlink($imagePath);
            }
            $image = request()->file('image')->store('assets/package', 'public');
            $data['image'] = $image;
        }

        $slug = Str::slug($request->name);
        return $travelPackage->update($data + ["slug" => $slug]);
    }

    /**
     * packageDestroy function
     *
     * @param TravelPackage $travelPackage
     * @return void
     */
    public function packageDestroy(TravelPackage $travelPackage) {
        $destination = 'storage/' . $travelPackage->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        return $travelPackage->delete();
    }
}
