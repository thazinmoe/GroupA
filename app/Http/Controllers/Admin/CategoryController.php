<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreCategoryRequest;
use App\Contracts\Services\CategoryServiceInterface;

class CategoryController extends Controller
{
     /**
     * Category interface
     */
    private $categoryInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function __construct(CategoryServiceInterface $categoryServiceInterface)
    {
         $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','show']]);
         $this->middleware('permission:category-create', ['only' => ['create','store']]);
         $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:category-delete', ['only' => ['destroy']]);
         $this->categoryInterface = $categoryServiceInterface;
    }
    public function index() : View
    {
        $categories = $this->categoryInterface->getCategoryList(); 
        return view('admin.categories.index', compact('categories'));
    }

    public function create() : View
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request) : RedirectResponse
    {
        $categories = $this->categoryInterface->getStoreCategoryList($request);
        return redirect()->route('admin.categories.index')->with('message', 'Added Successfully !');
    }

    public function edit(Category $category) : View
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(StoreCategoryRequest $request,Category $category) : RedirectResponse
    {
        $category->update($request->validated());
        return redirect()->route('admin.categories.index')->with('message', 'Updated Successfully !');
    }

    public function destroy(Category $category) : RedirectResponse
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('message', 'Deleted Successfully !');
    }
}
