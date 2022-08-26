<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Contracts\Dao\CustomerDaoInterface;
use App\Contracts\Services\CustomerServiceInterface;

/**
 * Service class for post.
 */
class CustomerService implements CustomerServiceInterface
{
  /**
   * commentDao
   */
  private $customerDao;
  /**
   * Class Constructor
   * @param PostDaoInterface
   * @return
   */
  public function __construct(CustomerDaoInterface $customerDaoInterface)
  {
    $this->customerDao = $customerDaoInterface;
  }

  public function getCustomerList(Request $request)
  {
    return $this->customerDao->getCustomerList($request);
  }

  public function getCustomerStore(Request $request)
  {
    return $this->customerDao->getCustomerStore($request);
  }

  public function getTravelPackage()
  {
    return $this->customerDao->getTravelPackage();
  }

  public function getCustomerComfirm($id)
  {
    return $this->customerDao->getCustomerComfirm($id);
  }
 
  public function getCustomerComfirmUpdate(Request $request, $id)
  {
    return $this->customerDao->getCustomerComfirmUpdate($request, $id);
  }

  public function getDeleteCustomerList($id)
  {
    return $this->customerDao->getDeleteCustomerList($id);
  }
 
}
