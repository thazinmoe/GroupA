<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;

/**
 * Interface for Data Accessing Object of Post
 */
interface CategoryDaoInterface
{
    public function getCategoryList();
    public function getStoreCategoryList(StoreCategoryRequest $request);
}
