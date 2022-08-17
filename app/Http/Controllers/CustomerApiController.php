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
use App\Notifications\ComfirmEmailNotification;

class CustomerApiController extends Controller
{
    /**
     * Customer interface
     */
    private $CustomerInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }   
   
    public function index(Request $request)
    {
        $customer_name = $request->input('customer_name');       
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        $customers = DB::table('customer_comfirms')
            ->join('travel_packages','customer_comfirms.package_id', '=','travel_packages.id')               
            ->select('customer_comfirms.*','travel_packages.id as package_id','travel_packages.name as package_name');
                             
        if ($customer_name) {
            $customers =$customers->where('customer_comfirms.customer_name', 'LIKE', '%' . $customer_name . '%');
        }       
        if ($fromDate) {
            $customers =$customers->whereDate('customer_comfirms.created_at', '>=', $fromDate);
        }
        if ($toDate) {
            $customers = $customers->whereDate('customer_comfirms.created_at', '<=', $toDate);
        }
        $customers = $customers->orderBy('completed')
                    ->get(); 
    if($customers){          
            return view('customer.index')->with('customers',$customers);
        }
     }    
    
    public function create(TravelPackage $travelPackage): View
    {       
        return view('customer.create', compact('travelPackage'));      
    }
    
    public function store(Request $request)
    {
        $customer = new Customer_comfirm;
        $customer->customer_name = $request->customer_name;
        $customer->email = $request->email;
        $customer->phno = $request->phno;
        $customer->package_id = $request->package_id;     
        $customer->save();
        $customer->notify(new ComfirmEmailNotification($customer));
        if ($customer) {
            return back()->with('status', 'Customer Booking Added Successfully');
        }
    }
   
    public function edit($id)
    {
        $data = TravelPackage::all();
        $customer = Customer_comfirm::find($id);
        return view('customer.edit', [
            'customer' => $customer,
            'travelPackages' => $data,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $customer = Customer_comfirm::find($id);
        $customer->customer_name = $request->input('customer_name');
        $customer->email = $request->input('email');
        $customer->phno = $request->input('phno');
        $customer->package_id = $request->input('package_id');       
        $customer->update();
        if ($customer) {
            return back()->with('status', 'Customer Booking Updated Successfully');
        }
    }

    public function completed($id){
        $todo = Customer_comfirm::find($id);
        if ($todo->completed){
            $todo->update(['completed' => false]);
            return redirect()->back()->with('success', "TODO marked as incomplete!");
        }else {
            $todo->update(['completed' => true]);
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
        $customer = Customer_comfirm::find($id);     
        $customer->delete();
        if ($customer) {
            return redirect()->back()->with('status', 'Customer Booking Deleted Successfully');
        }
    }
    public function exportexcel(){
        return Excel::download(new ExportUser, 'customerBooking.xlsx');
    }
 
}