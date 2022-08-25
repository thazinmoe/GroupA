<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\DashboardServiceInterface;

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

        return view('admin.dashboard.index',compact('packages','categories','cars','posts'));
    }
}