<?php

namespace App\Dao;

use App\Models\Category;
use App\Contracts\Dao\CategoryDaoInterface;
use App\Http\Requests\StoreCategoryRequest;

/**
 * Data accessing object for Category
 */
class CategoryDao implements CategoryDaoInterface
{
    /**
     * getCategoryList function
     *
     * @return void
     */
    public function getCategoryList()
    {
        $categories = Category::get();
        return $categories;
    }

    /**
     * getStoreCategoryList function
     *
     * @param StoreCategoryRequest $request
     * @return void
     */
    public function getStoreCategoryList(StoreCategoryRequest $request)
    {
        return Category::create($request->validated());
    }
}
