<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TravelPackage;
use App\Contracts\Services\DashboardServiceInterface;
use DB;
class DashboardController extends Controller
{   
    /**
     * Dashboard interface
     */
    private $dashboardInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DashboardServiceInterface $dashboardServiceInterface) {
        $this->dashboardInterface = $dashboardServiceInterface;
    }
    public function index(){
        $packages = $this->dashboardInterface->package();
        $categories = $this->dashboardInterface->category();
        $cars = $this->dashboardInterface->car();
        $posts = $this->dashboardInterface->post();

        $users = TravelPackage::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count', 'month_name');
        $package = $users->keys();
        $test = $users->values();

        return view('admin.dashboard.index',compact('packages','categories','cars','posts','package', 'test'));
    }
    
    
}
