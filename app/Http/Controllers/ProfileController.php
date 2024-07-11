<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function indexProfile(){
        $admin = Auth::guard('admin')->user();
        return view('admin.menu.profile.index', compact('admin'));
    }
}
