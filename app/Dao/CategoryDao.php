<?php

namespace App\Dao;

use App\Models\Category;
use App\Contracts\Dao\CategoryDaoInterface;
use App\Http\Requests\StoreCategoryRequest;

/**
 * Data accessing object for post
 */
class CategoryDao implements CategoryDaoInterface
{
  public function getCategoryList()
  {
    $categories = Category::get();
    return $categories;
  }
  public function getStoreCategoryList(StoreCategoryRequest $request)
  {
    return Category::create($request->validated());
  }
}
