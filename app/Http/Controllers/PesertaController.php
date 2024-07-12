<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Regency;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    function kapitalAwal($strings){
        $lower = strtolower($strings);
        $upperW = ucwords($lower);
        return $upperW;
    }
    public function indexPeserta(){
        $users = User::all();
        foreach ($users as $key) {
            $kabId = $key->kabupaten;
            $kab = Regency::find($kabId);
            var_dump($kab->name);
            // $namekab = $this->kapitalAwal($kab->name);
        }
        return view('admin.menu.peserta.index', compact('users','namekab'));
    }
}
