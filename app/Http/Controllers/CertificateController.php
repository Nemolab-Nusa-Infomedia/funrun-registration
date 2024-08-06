<?php

namespace App\Http\Controllers;

use TCPDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\User;
use Dompdf\Adapter\CPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CertificateController extends Controller
{
    public function previewCertificate($name){
        return view('admin.registration.preview-certificate.index',[
            'name' => $name
        ]);
    }

    public function certificate(){
        return view('admin.registration.certificate.index');
    }

    public function generate($name){
        $options = new Options();
        $options->set('enabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isFontSubsettingEnabled', false);
        $options->set('pdfBackend', 'CPDF');
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        $html = View::make('admin.registration.certificate.index', ['name' => $name])->render();

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        return $dompdf->stream('certificate.pdf');
    }



}
