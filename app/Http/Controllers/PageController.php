<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Post;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Mail\StoreContactMail;
use App\Models\Customer_comfirm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreEmailRequest;

class PageController extends Controller
{
    public function home() : View
    {
        $categories = Category::with('travel_packages')->get();
        $posts = Post::get();
        $car   = Car::get();
        return view('home', compact('categories','posts','car'));
    }

    public function detail(TravelPackage $travelPackage): View
    {
        $car = Car::find($travelPackage->car_id);
        $car_name = $car->name;
        $category = Category::find($travelPackage->category_id);
        $category_name = $category->title;
        return view('detail', compact('travelPackage','car_name','category_name'));
    }

    public function package(Request $request){
        $travelPackages = TravelPackage::orderBy('id','desc')->paginate(3);
        $categories = Category::all();

        if($request->ajax()) {
            return view('package_paginate',compact('travelPackages'));
        }

        $popu_packages = TravelPackage::leftJoin('customer_comfirms', 'package_id', '=', 'travel_packages.id')
        ->select('travel_packages.id','travel_packages.name','travel_packages.image','travel_packages.description','travel_packages.price','travel_packages.location','travel_packages.duration','travel_packages.slug', DB::raw("count('customer_comfirms.package_id') as customer_count"))
        ->groupBy('travel_packages.id')
        ->orderBy('customer_count','desc')
        ->having('customer_count','>',4)
        ->get();    
        
        return view('package', compact('travelPackages','categories','popu_packages'));
    }

    public function package_by_cat($id) {
        $categories = Category::all();
        $travelPackages = TravelPackage::where('category_id',$id)->get();

        $popu_packages = TravelPackage::leftJoin('customer_comfirms', 'package_id', '=', 'travel_packages.id')
        ->select('travel_packages.id','travel_packages.name','travel_packages.image','travel_packages.description','travel_packages.price','travel_packages.location','travel_packages.duration','travel_packages.slug', DB::raw("count('customer_comfirms.package_id') as customer_count"))
        ->groupBy('travel_packages.id')
        ->orderBy('customer_count','desc')
        ->having('customer_count','>',4)
        ->get();    

        return view('package',compact('travelPackages','categories','popu_packages'));
    }

    public function posts(){
        $posts = Post::get();

        return view('posts', compact('posts'));
    }

    public function detailPost(Post $post){
        $posts = Post::get();

        return view('posts-detail',compact('posts','post'));
    }

    public function contact(){
        return view('contact');
    }

    public function getEmail(StoreEmailRequest $request){
        $detail = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to('thazinmoe1097@gmail.com')->send(new StoreContactMail($detail));
        return back()->with('message', 'Mail sent successfully!');
    }
}
