<?php

namespace App\Http\Controllers;

use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
        // Atur opsi untuk Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');

        // Buat instance Dompdf dengan opsi
        $dompdf = new Dompdf($options);

        // Ambil data untuk dikirim ke view
        $data = [
            'name' => $name
        ];

        // Render view menjadi HTML
        $html = View::make('admin.registration.certificate.index', $data)->render();

        // Load HTML ke Dompdf
        $dompdf->loadHtml($html);

        // (Opsional) Atur ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'landscape');

        // Render PDF
        $dompdf->render();

        // Stream PDF ke browser
        return $dompdf->stream('certificate.pdf');
    }



}
