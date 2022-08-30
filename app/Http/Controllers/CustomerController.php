<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\View\View;
use App\Exports\ExportUser;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Models\Customer_comfirm;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCustomerRequest;
use App\Notifications\ComfirmEmailNotification;
use App\Contracts\Services\CustomerServiceInterface;

class CustomerController extends Controller
{
    /**
     * Customer interface
     */
    private $customerInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CustomerServiceInterface $customerServiceInterface)
    {
        $this->customerInterface = $customerServiceInterface;
    }

    /**
     * index function
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $customers = $this->customerInterface->getCustomerList($request);
        if ($customers) {
            return view('customer.index')->with('customers', $customers);
        }
    }

    /**
     * create function
     *
     * @param TravelPackage $travelPackage
     * @return View
     */
    public function create(TravelPackage $travelPackage): View
    {
        return view('customer.create', compact('travelPackage'));
    }

    /**
     * store function
     *
     * @param StoreCustomerRequest $request
     * @return void
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = $this->customerInterface->getCustomerStore($request);
        if ($customer) {
            return back()->with('status', 'Customer Booking Added Successfully');
        }
    }

    /**
     * completed function
     *
     * @param [type] $id
     * @return void
     */
    public function completed($id)
    {
        $customer = $this->customerInterface->getCustomerComfirm($id);
        if ($customer->completed) {
            $customer->update(['completed' => false]);
            return redirect()->back();
        } else {
            $customer->update(['completed' => true]);
            return redirect()->back();
        }
    }

    /**
     * destroy function
     *
     * @param [type] $id
     * @return void
     */
    public function destroy($id)
    {
        $customer = $this->customerInterface->getDeleteCustomerList($id);
        if ($customer) {
            return redirect()->back()->with('status', 'Customer Booking Deleted Successfully');
        }
    }

    /**
     * exportexcel function
     *
     * @return void
     */
    public function exportexcel()
    {
        return Excel::download(new ExportUser, 'customerBooking.xlsx');
    }
}
