<?php

namespace App\Http\Controllers;

use Log;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function verifyQrCode(Request $request)
    {
        $user = User::where('tokens_account', $request->qr_code)->first();
        $nowInJakarta = Carbon::now('Asia/Jakarta');
        $date = Carbon::createFromFormat('Y-m-d H:i:s', '2024-07-02 12:00:00', 'Asia/Jakarta');
        if ($user->verification_admin == NULL) {
            $user->verification_admin = $nowInJakarta->toDateTimeString();
            $user->by_admin = Auth::guard('admin')->user()->name;
            $user->save();
            return response()->json([
                'message' => 'User is registered: ' . $user->name,
                'user' => $user
            ]);
        } else {
            return response()->json([
                'message' => "User sudah diverifikasi! \n Akun diverifikasi tanggal ". $user->verification_admin . "\n Diverifikasi oleh ". $user->by_admin,
            ], 404);
        }
        
        return response()->json(['message' => 'User tidak ditemukan !'], 404);
    }

    public function adminLogin(){
        return view('admin.auth.loginAdmin');
    }

    public function adminCek(Request $request){
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('profile');
        }
        return back();
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin-login');
    }
}
