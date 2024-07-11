<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\User;
use Midtrans\Config;
use App\GenerateRandom;
use App\Models\Province;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegistrationController extends Controller
{
    public function indexForm(){
        $provinces = Province::distinct()->get(['id', 'name']);
        return view('admin.registration.index', compact('provinces'));
    }

    // Create users and get snap token for payment 
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'gender' => 'required',
            'domisili' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'size' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'phone_urgent' => 'required',
            'contant_urgent' => 'required',
            'community' => 'required',
            'goldar' => 'required',
            'r_penyakit' => 'required',
        ]);

        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
        }
        $id_user = Auth::user()->id;
        $user = User::find($id_user);
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
        $paymentType = $request->input('payment_type');
        $adminFee = $this->getAdminFee($paymentType);
        $ticketPrice = 150000;
        $grossAmount = $ticketPrice + $adminFee;

        $params = array(
            'transaction_details' => array(
                'order_id' => Str::uuid(),
                'gross_amount' => $grossAmount,
            ),
            'customer_details' => array(
                'first_name' => $request->name,
                'email' => $user->email,
            ),
            'enabled_payments' => $this->getEnabledPayments($paymentType),
        );
         $numberRand = new GenerateRandom();
        $tokenAcc = $numberRand->generateRandomString(10);
        $cekParticipant = User::orderBy('participant_number', 'desc')->first();
        if($cekParticipant){
            $lastNumber = intval($cekParticipant->participant_number);
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '0001';
        }

         if ($request->name_commnunity) {
            $user->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'domisili' => $request->domisili,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'phone' => $request->phone,
            'size' => $request->size,
            'tokens_account' => $tokenAcc,
            'participant_number' => $newNumber,
            'age' => $request->age,
            'status' => 'pending',
            'phone_urgent' => $request->phone_urgent,
            'contant_urgent' => $request->contant_urgent,
            'relation_urgent' => $request->relation_urgent,
            'community' => $request->community,
            'name_community' => $request->name_community,
            'payment_type' => $request->payment_type,
            'participant_number' => $newNumber,
            'goldar' => $request->goldar,
            'r_penyakit' => $request->r_penyakit,
            'kode_pay' => $params['transaction_details']['order_id'],
        ]);
        }
        $user->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'domisili' => $request->domisili,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'phone' => $request->phone,
            'size' => $request->size,
            'tokens_account' => $tokenAcc,
            'participant_number' => $newNumber,
            'age' => $request->age,
            'status' => 'pending',
            'phone_urgent' => $request->phone_urgent,
            'contant_urgent' => $request->contant_urgent,
            'relation_urgent' => $request->relation_urgent,
            'community' => $request->community,
            'payment_type' => $request->payment_type,
            'participant_number' => $newNumber,
            'goldar' => $request->goldar,
            'r_penyakit' => $request->r_penyakit,
            'kode_pay' => $params['transaction_details']['order_id'],
        ]);
       
        $snapToken = Snap::getSnapToken($params);
        return view('admin.registration.payment', ['snapToken' => $snapToken]);
    }

    // Payment handler

    public function paymentHandler(Request $request){
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.env('MIDTRANS_SERVER_KEY')); 
        if($hashed == $request->signature_key){
        if ($request->transaction_status == 'settlement' || $request->transaction_status == 'capture') {
                $user = User::where('kode_pay', $request->order_id)->first();
                $user->update(['status'=>'settlement']);
                // Kirim email ke user
                $qrCode = QrCode::format('png')->size(300)->generate($user->tokens_account);
                $qrCodePath = public_path('qrcodes/' . $user->id . '.png');
                file_put_contents($qrCodePath, $qrCode);
                // Send the email with the QR code attachment
                Mail::send('admin.registration.notification-registation-peserta.email.index', ['user' => $user], function ($message) use ($user, $qrCodePath) {
                    $message->to($user->email);
                    $message->subject('Your Registration QR Code');
            });
        } else if ($request->transaction_status == 'cancel' || $request->transaction_status == 'deny' || $request->transaction_status == 'expire') {
            return "Pembayaran Gagal !";
        }
        }
    }

     private function getAdminFee($paymentType)
    {
        switch ($paymentType) {
            case 'gopay':
                return 3000;
            case 'shopeepay':
                return 3000;
            case 'other_qris':
                return 1050;
            case 'bank_merchant':
                return 4000;
            case 'credit_card':
                return 6350;
            default:
                return 0; // Default, jika tidak ada jenis pembayaran yang cocok
        }
    }

    // Fungsi untuk mendapatkan metode pembayaran yang diaktifkan berdasarkan jenis pembayaran
    private function getEnabledPayments($paymentType)
    {
        switch ($paymentType) {
            case 'gopay':
                return ['gopay'];
            case 'shopeepay':
                return ['shopeepay'];
            case 'other_qris':
                return ['other_qris'];
            case 'bank_merchant':
                return ['bank_transfer']; // Bank Transfer untuk bank merchant
            case 'credit_card':
                return ['credit_card'];
            default:
                // Default, aktifkan semua metode pembayaran yang didukung oleh Midtrans
                return ['credit_card', 'gopay', 'bank_transfer', 'echannel'];
        }
    }

    public function pembayaranBerhasil(){
        return view('admin.registration.notification-registation-peserta.pembayaranBerhasil');
    }

    public function pembayaranGagal(){
        return view('admin.registration.notification-registation-peserta.pembayaranGagal');
    }
    
    public function scan(){
        return view('admin.registration.scan.index');
    }

    public function hasilScan($id){
        $user = User::find($id);
        $domilisi = Province::where('id');
        return view('admin.registration.scan.notificationScan', compact('user'));
    }
    public function registrationEmail(){
        return view('admin.auth.register');
    }
    public function emailValidation(Request $request){
        $validator = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);
        $user = User::create([
            'email' => $validator['email'],
            'password' => Hash::make($validator['password'])
        ]);
        event(new Registered($user));
        Auth::login($user);
        return redirect()->route('verification.notice');
    }

    public function checking(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect()->route('profile');
        }
        return back();
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
