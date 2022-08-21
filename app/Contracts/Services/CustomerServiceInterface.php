<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

/**
 * Interface for post service
 */
interface CustomerServiceInterface
{
  public function getCustomerList(Request $request);
  public function getCustomerStore(Request $request);
  public function getTravelPackage();
  public function getCustomerComfirm($id);
  public function getCustomerComfirmUpdate(Request $request, $id);
  public function getDeleteCustomerList($id);
}
