<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function indexForm(){
        return view('admin.registration.index');
    }

    public function pembayaranBerhasil(){
        return view('admin.registration.notification-registation-peserta.pembayaranBerhasil');
    }

    public function pembayaranGagal(){
        return view('admin.registration.notification-registation-peserta.pembayaranGagal');
    }
    
    public function scan(){
        return view('admin.registration.scan.index');
    }

    public function hasilScan(){
        return view('admin.registration.scan.notificationScan');
    }
}
