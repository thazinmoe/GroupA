<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:dashboard-list|dashboard-create|dashboard-edit|dashboard-delete', ['only' => ['index','show']]);
         $this->middleware('permission:dashboard-create', ['only' => ['create','store']]);
         $this->middleware('permission:dashboard-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:dashboard-delete', ['only' => ['destroy']]);
    }
    public function index(){
        return view('admin.dashboard.index');
    }
}
