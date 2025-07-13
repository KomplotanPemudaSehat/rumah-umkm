<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\AdminNotification;
use App\Events\OtpRequested; // Import event baru
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordOtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return back()->with('error_message', 'Email yang Anda masukkan tidak terdaftar.');
        }

        $email = $request->email;
        
        $user = User::where('email', $email)->first();
        $whatsapp_number = $user->whatsapp_number ?? 'Tidak ada';

        DB::table('password_reset_tokens')->where('email', $email)->delete();
        $otp = rand(100000, 999999);

        DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'otp' => $otp,
            'created_at' => Carbon::now()
        ]);

        $notificationMessage = "Permintaan OTP untuk Email: {$email} (No. WA: {$whatsapp_number}). Kodenya adalah: {$otp}";

        // Simpan notifikasi ke database seperti biasa
        AdminNotification::create([
            'message' => $notificationMessage
        ]);

        // PERUBAHAN: Siarkan event ke Pusher
        event(new OtpRequested($notificationMessage));

        return redirect()->route('otp.verify.form')->with('email', $email)
                         ->with('status', 'Kode OTP telah dibuat. Notifikasi telah dikirim ke admin.');
    }
}
