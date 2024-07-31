<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\District;
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
            $kecId = Auth::user()->kecamatan;
            $kec = District::find($kecId);
            $kab = Regency::find($kabId);
            $namekab = $this->kapitalAwal($kab->name);
            $namekec = $this->kapitalAwal($kec->name);
            return view('admin.menu.profile.index', compact('namekab','namekec'));
        }
        return view('admin.menu.profile.index');
    }

}
