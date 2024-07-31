<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function indexPeserta(){
        $users = User::with(['kabupaten','kecamatan'])->get()->toArray();
        return view('admin.menu.peserta.index', compact('users'));
    }
}
