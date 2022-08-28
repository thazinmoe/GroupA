<?php

namespace App\Dao;

use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Models\Customer_comfirm;
use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\CustomerDaoInterface;
use App\Notifications\ComfirmEmailNotification;

/**
 * Data accessing object for post
 */
class CustomerDao implements CustomerDaoInterface
{
    /**
     * getCustomerList function
     *
     * @param Request $request
     * @return void
     */
    public function getCustomerList(Request $request)
    {
        $customer_name = $request->input('customer_name');
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        $customers = DB::table('customer_comfirms')
            ->join('travel_packages', 'customer_comfirms.package_id', '=', 'travel_packages.id')
            ->select('customer_comfirms.*', 'travel_packages.id as package_id', 'travel_packages.name as package_name');

        if ($customer_name) {
            $customers = $customers->where('customer_comfirms.customer_name', 'LIKE', '%' . $customer_name . '%');
        }
        if ($fromDate) {
            $customers = $customers->whereDate('customer_comfirms.created_at', '>=', $fromDate);
        }
        if ($toDate) {
            $customers = $customers->whereDate('customer_comfirms.created_at', '<=', $toDate);
        }
        $customers = $customers->orderBy('completed')
            ->get();
        return $customers;
    }

    /**
     * getCustomerStore function
     *
     * @param Request $request
     * @return void
     */
    public function getCustomerStore(Request $request)
    {
        $customer = new Customer_comfirm;
        $customer->customer_name = $request->customer_name;
        $customer->email = $request->email;
        $customer->phno = $request->phno;
        $customer->package_price = $request->package_price * $request->package_count;
        $customer->package_count = $request->package_count;
        $customer->package_id = $request->package_id;
        $customer->save();
        // $customer->notify(new ComfirmEmailNotification($customer));
        return $customer;
    }

    /**
     * getTravelPackage function
     *
     * @return void
     */
    public function getTravelPackage()
    {
        $data = TravelPackage::all();
        return $data;
    }

    /**
     * getCustomerComfirm function
     *
     * @param [type] $id
     * @return void
     */
    public function getCustomerComfirm($id)
    {
        $customer = Customer_comfirm::find($id);
        return $customer;
    }

    /**
     * getCustomerComfirmUpdate function
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function getCustomerComfirmUpdate(Request $request, $id)
    {
        $customer = Customer_comfirm::find($id);
        $customer->customer_name = $request->input('customer_name');
        $customer->email = $request->input('email');
        $customer->phno = $request->input('phno');
        $customer->package_id = $request->input('package_id');
        $customer->update();
        return $customer;
    }

    /**
     * getDeleteCustomerList function
     *
     * @param [type] $id
     * @return void
     */
    public function getDeleteCustomerList($id)
    {
        $customer = Customer_comfirm::find($id);
        $customer->delete();
        return $customer;
    }
}
