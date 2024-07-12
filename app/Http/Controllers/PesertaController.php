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
        $users = User::with('kabupaten');
        foreach ($users as $key) {
            $kab = $key->kabupaten->name;
            dd($kab);
            $namekab = $this->kapitalAwal($kab->name);
        }
        return view('admin.menu.peserta.index', compact('users'));
    }
}
