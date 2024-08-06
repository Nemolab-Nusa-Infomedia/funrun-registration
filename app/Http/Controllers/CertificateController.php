<?php

namespace App\Http\Controllers;

use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\User;
use Dompdf\Adapter\CPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CertificateController extends Controller
{
    public function previewCertificate($id){
        $user = User::find($id);
        return view('admin.registration.preview-certificate.index', compact('user'));
    }

    public function certificate(){
        return view('admin.registration.certificate.index');
    }

    public function generate($id){
        $options = new Options();
        $options->set('enabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isFontSubsettingEnabled', false);
        $options->set('pdfBackend', 'CPDF');
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        $user = User::find($id);

        if (!$user) {
            abort(404, 'User not found');
        }

        $html = View::make('admin.registration.certificate.index', ['user' => $user])->render();

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        return $dompdf->stream('certificate.pdf');
    }



}
