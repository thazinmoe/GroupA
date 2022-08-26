<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface CustomerDaoInterface
{
    public function getCustomerList(Request $request);
    public function getCustomerStore(Request $request);
    public function getTravelPackage();
    public function getCustomerComfirm($id);
    public function getCustomerComfirmUpdate(Request $request, $id);
    public function getDeleteCustomerList($id);
}
