<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function previewCertificate(){
        return view('admin.registration.preview-certificate.index');
    }

    public function certificate(){
        return view('admin.registration.certificate.index');
    }
}
