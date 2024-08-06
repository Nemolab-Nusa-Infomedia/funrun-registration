<?php

namespace App\Http\Controllers;

use TCPDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function previewCertificate(){
        return view('admin.registration.preview-certificate.index');
    }

    public function certificate(){
        return view('admin.registration.certificate.index');
    }

    public function generate($name)
{
        $dompdf = new Dompdf();

    // Setel opsi
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);
    $dompdf->setOptions($options);

    // Muat HTML konten
    $html = view('admin.registration.certificate.index', [
        'name' => $name // Data yang akan dikirim ke view
    ])->render();
    
    // Muat HTML ke Dompdf
    $dompdf->loadHtml($html);

    // Set ukuran kertas dan orientasi
    $dompdf->setPaper('A4', 'landscape');

    // Render PDF
    $dompdf->render();

    // Output PDF (untuk download)
    return $dompdf->stream('document.pdf', ['Attachment' => 0]);
    }



}
