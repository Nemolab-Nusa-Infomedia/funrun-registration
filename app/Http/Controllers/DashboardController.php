<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexDashboard(){
        return view('admin.menu.dashboard.index');
    }
}
