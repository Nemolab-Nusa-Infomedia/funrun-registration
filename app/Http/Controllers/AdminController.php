<?php

namespace App\Http\Controllers;

use Log;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function resetPassword(){
        return view('admin.auth.resetPassword-st');
    }
    public function checkephone(Request $request){
        $validator = $request->validate([
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        $checkephone = User::where('email', $validator['email'])->where('phone', $validator['phone'])->first();
        if($checkephone){
            session(['userid' => $checkephone->id]);
            return redirect()->route('reset-password-nd')->with('user');
        } else {
            return redirect()->back()->withErrors(['msg' => 'Email atau Phone tidak cocok'])->withInput();
        }
    }
    public function resetPasswordnd(){
        return view('admin.auth.resetPassword-nd');
    }
    public function updatePasswordnd(Request $request){
        $validator = $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);
        $userId = session('userid');
        if ($userId) {
            $user = User::find($userId);
            if ($user) {
                $user->update([
                    'password' => Hash::make($validator['password'])
                ]);
                session()->forget('userid');
                return redirect()->route('login');
            }
        }
        return redirect()->back()->withErrors(['msg' => 'User tidak ditemukan']);
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin-login');
    }

    public function getusers(Request $request) {
    if ($request->ajax()) {
        $data = User::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('asal', function($row) {
                return $row->kecamatan . ', ' . $row->kabupaten;
            })
            ->addColumn('status', function($row) {
                return $row->status === 'settlement' ? 'Lunas' : 'Pending';
            })
            ->rawColumns(['asal','status'])
            ->make(true);
    }
}

}
