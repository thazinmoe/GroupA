<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;

/**
 * Interface for Data Accessing Object of Post
 */
interface CategoryServiceInterface
{
    /**
     * getCategoryList function
     *
     * @return void
     */
    public function getCategoryList();

    /**
     * getStoreCategoryList function
     *
     * @param StoreCategoryRequest $request
     * @return void
     */
    public function getStoreCategoryList(StoreCategoryRequest $request);
}
