<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;

/**
 * Interface for Data Accessing Object of Post
 */
interface CategoryServiceInterface
{
  public function getCategoryList();
  public function getStoreCategoryList(StoreCategoryRequest $request);
}
