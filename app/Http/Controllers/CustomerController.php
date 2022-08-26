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
   
    public function index(Request $request)
    {
        $customers = $this->customerInterface->getCustomerList($request); 
    if($customers){          
            return view('customer.index')->with('customers',$customers);
        }
     }    
    
    public function create(TravelPackage $travelPackage): View
    {       
        return view('customer.create', compact('travelPackage'));      
    }
    
    public function store(StoreCustomerRequest $request)
    {
        $customer = $this->customerInterface->getCustomerStore($request); 
        if ($customer) {
            return back()->with('status', 'Customer Booking Added Successfully');
        }
    }
   
    public function edit($id)
    {
        $data = $this->customerInterface->getTravelPackage(); 
        $customer = $this->customerInterface->getCustomerComfirm($id); 
        return view('customer.edit', [
            'customer' => $customer,
            'travelPackages' => $data,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $customer = $this->customerInterface->getCustomerComfirmUpdate($request,$id); 
        if ($customer) {
            return back()->with('status', 'Customer Booking Updated Successfully');
        }
    }

    public function completed($id){
        $customer = $this->customerInterface->getCustomerComfirm($id);
        if ($customer->completed){
            $customer->update(['completed' => false]);
            return redirect()->back()->with('success', "TODO marked as incomplete!");
        }else {
            $customer->update(['completed' => true]);
            return redirect()->back()->with('success', "TODO marked as complete!");
        }
    }

    /**
     * To check post create form and redirect to confirm page.
     * @param PostCreateRequest $request Request form post create
     * @return View post create confirm
     */
    public function destroy($id)
    {
        $customer = $this->customerInterface->getDeleteCustomerList($id); 
        if ($customer) {
            return redirect()->back()->with('status', 'Customer Booking Deleted Successfully');
        }
    }
    public function exportexcel(){ 
        return Excel::download(new ExportUser, 'customerBooking.xlsx');
    }
 
}