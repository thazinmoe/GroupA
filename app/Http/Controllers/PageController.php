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
use App\Contracts\Services\PageServiceInterface;

class PageController extends Controller
{
    /**
     * Page interface
     */
    private $pageInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PageServiceInterface $pageServiceInterface)
    {
        $this->pageInterface = $pageServiceInterface;
    }

    /**
     * home function
     *
     * @return View
     */
    public function home(): View
    {
        $categories = $this->pageInterface->getCategories();
        $posts = $this->pageInterface->getPosts();
        $car = $this->pageInterface->getCars();
        return view('home', compact('categories', 'posts', 'car'));
    }

    /**
     * detail function
     *
     * @param TravelPackage $travelPackage
     * @return View
     */
    public function detail(TravelPackage $travelPackage): View
    {
        $car = $this->pageInterface->getCarId($travelPackage);
        $car_name = $car->name;
        $category = $this->pageInterface->getCategoryId($travelPackage);
        $category_name = $category->title;
        return view('detail', compact('travelPackage', 'car_name', 'category_name'));
    }

    /**
     * package function
     *
     * @param Request $request
     * @return void
     */
    public function package(Request $request)
    {
        $categories = $this->pageInterface->getCategories();
        $travelPackages = $this->pageInterface->getTravelPackages();
        if ($request->ajax()) {
            return view('package_paginate', compact('travelPackages'));
        }
        $popu_packages = $this->pageInterface->getPopPackages();
        return view('package', compact('travelPackages', 'categories', 'popu_packages'));
    }

    /**
     * package_by_cat function
     *
     * @param [type] $id
     * @return void
     */
    public function package_by_cat($id)
    {
        $categories = $this->pageInterface->getCategories();
        $travelPackages = $this->pageInterface->getTravelPackageById($id);
        $popu_packages = $this->pageInterface->getPopPackages();
        return view('package', compact('travelPackages', 'categories', 'popu_packages'));
    }

    /**
     * posts function
     *
     * @return void
     */
    public function posts()
    {
        $posts = $this->pageInterface->getPosts();
        return view('posts', compact('posts'));
    }

    /**
     * detailPost function
     *
     * @param Post $post
     * @return void
     */
    public function detailPost(Post $post)
    {
        $posts = $this->pageInterface->getPosts();
        return view('posts-detail', compact('posts', 'post'));
    }

    /**
     * contact function
     *
     * @return void
     */
    public function contact()
    {
        return view('contact');
    }


    /**
     * getEmail function
     *
     * @param StoreEmailRequest $request
     * @return void
     */
    public function getEmail(StoreEmailRequest $request)
    {
        $detail = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to('thazinmoe1097@gmail.com')->send(new StoreContactMail($detail));
        return back()->with('message', 'Mail sent successfully!');
    }
}
