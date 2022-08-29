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

    /**
     * getCustomerList function
     *
     * @param Request $request
     * @return void
     */
    public function getCustomerList(Request $request)
    {
        return $this->customerDao->getCustomerList($request);
    }

    /**
     * getCustomerStore function
     *
     * @param Request $request
     * @return void
     */
    public function getCustomerStore(Request $request)
    {
        return $this->customerDao->getCustomerStore($request);
    }

    /**
     * getTravelPackage function
     *
     * @return void
     */
    public function getTravelPackage()
    {
        return $this->customerDao->getTravelPackage();
    }

    /**
     * getCustomerComfirm function
     *
     * @param [type] $id
     * @return void
     */
    public function getCustomerComfirm($id)
    {
        return $this->customerDao->getCustomerComfirm($id);
    }

    /**
     * getDeleteCustomerList function
     *
     * @param [type] $id
     * @return void
     */
    public function getDeleteCustomerList($id)
    {
        return $this->customerDao->getDeleteCustomerList($id);
    }
}
