<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface CustomerDaoInterface
{
    /**
     * getCustomerList function
     *
     * @param Request $request
     * @return void
     */
    public function getCustomerList(Request $request);

    /**
     * getCustomerStore function
     *
     * @param Request $request
     * @return void
     */
    public function getCustomerStore(Request $request);

    /**
     * getTravelPackage function
     *
     * @return void
     */
    public function getTravelPackage();

    /**
     * getCustomerComfirm function
     *
     * @param [type] $id
     * @return void
     */
    public function getCustomerComfirm($id);

    /**
     * getCustomerComfirmUpdate function
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function getCustomerComfirmUpdate(Request $request, $id);

    /**
     * getDeleteCustomerList function
     *
     * @param [type] $id
     * @return void
     */
    public function getDeleteCustomerList($id);
}
