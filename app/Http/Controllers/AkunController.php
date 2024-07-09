<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function indexAkun(){
        return view('admin.menu.akun.index');
    }

    public function tambahAkun(){
        return view('admin.menu.akun.tambah');
    }

    public function editAkun(){
        return view('admin.menu.akun.edit');
    }
}
