<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Contracts\Dao\CategoryDaoInterface;
use App\Http\Requests\StoreCategoryRequest;
use App\Contracts\Services\CategoryServiceInterface;


/**
 * Service class for post.
 */
class CategoryService implements CategoryServiceInterface
{
  /**
   * categoryDao
   */
  private $categoryDao;
  /**
   * Class Constructor
   * @param PostDaoInterface
   * @return
   */
  public function __construct(CategoryDaoInterface $categoryDaoInterface)
  {
    $this->categoryDao = $categoryDaoInterface;
  }

  public function getCategoryList()
  {
    return $this->categoryDao->getCategoryList();
  }
  public function getStoreCategoryList(StoreCategoryRequest $request)
  {
    return $this->categoryDao->getStoreCategoryList($request);
  }
 
}
