<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    function kapitalAwal($strings){
        $lower = strtolower($strings);
        $upperW = ucwords($lower);
        return $upperW;
    }
    
    public function indexProfile(){
        if(Auth::check() && Auth::user()){
            $kabId = Auth::user()->kabupaten;
            $kab = Regency::find($kabId);
            $namekab = $this->kapitalAwal($kab->name);
            return view('admin.menu.profile.index', compact('namekab'));
        }
        return view('admin.menu.profile.index');
    }

}
