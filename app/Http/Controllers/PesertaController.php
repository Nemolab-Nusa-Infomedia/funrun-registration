<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function indexPeserta(){
        return view('admin.menu.peserta.index');
    }
}
