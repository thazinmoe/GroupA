<?php

namespace App\Exports;

use App\Models\Customer_comfirm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class ExportUser implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('customer_comfirms')       
        ->join('travel_packages','customer_comfirms.package_id', '=','travel_packages.id')               
        ->select('customer_comfirms.*','travel_packages.id as package_id','travel_packages.name as package_name')
        ->orderBy('completed')
        ->get(); 
    }
}
