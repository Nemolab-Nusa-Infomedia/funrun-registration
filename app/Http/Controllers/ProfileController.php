<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function indexProfile(){
        if(Auth::check() && is_null(Auth::user()->name)){
            return view('admin.menu.profile.index');
        }
        if(Auth::check() && Auth::user()){
            return view('admin.menu.profile.index');
        }
        return view('admin.menu.profile.index');
    }

}
