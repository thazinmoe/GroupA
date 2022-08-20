<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreTravelPackageRequest;

class TravelPackageController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:travelPackage-list|travelPackage-create|travelPackage-edit|travelPackage-delete', ['only' => ['index','show']]);
         $this->middleware('permission:travelPackage-create', ['only' => ['create','store']]);
         $this->middleware('permission:travelPackage-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:travelPackage-delete', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        $travelPackages = TravelPackage::get();

        return view('admin.travel-packages.index', compact('travelPackages'));
    }
    
    public function search(Request $request)
    {
        if($request->isMethod('post')){
            $search = $request->get('search');

            $travelPackages = TravelPackage::where('name','LIKE','%'.$search.'%')->orWhere('location','LIKE','%'.$search.'%')->orderBy('id','desc')->get();
        }       

        return view('admin.travel-packages.index',compact('travelPackages'));
    }

    public function create(): View
    {
        $categories = Category::get();
        $cars = Car::get();

        return view('admin.travel-packages.create', compact('categories','cars'));
    }

    public function store(StoreTravelPackageRequest $request): RedirectResponse
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/package', 'public'
        );
        $slug = Str::slug($request->name);
        TravelPackage::create($data + ["slug" => $slug]);
        return redirect()->route('admin.travel-packages.index')->with('message', 'Package Added Successfully !');
    }

    public function edit(TravelPackage $travelPackage): View
    {
        $categories = Category::get();
        $cars = Car::get();

        return view('admin.travel-packages.edit', compact('travelPackage', 'categories','cars'));
    }

    public function update(StoreTravelPackageRequest $request, TravelPackage $travelPackage): RedirectResponse
    {
        if ($request->image) {
            File::delete('storage/' . $travelPackage->image);
        }

        $data = $request->all();
        $data['image'] = $request->image ? $request->file('image')->store(
            'assets/package', 'public'
        ) : $travelPackage->image;

        $slug = Str::slug($request->name);
        $travelPackage->update($data + ["slug" => $slug]);

        return redirect()->route('admin.travel-packages.index')->with('message', 'Updated Successfully !');
    }

    public function destroy(TravelPackage $travelPackage): RedirectResponse
    {
        $destination = 'storage/' . $travelPackage->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $travelPackage->delete();

        return redirect()->route('admin.travel-packages.index')->with('message', 'Deleted Successfully');
    }
}
