<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\SendOtpMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log; // Import Log facade

class ForgotPasswordOtpController extends Controller
{
    /**
     * Mengirimkan OTP ke email pengguna.
     */
    public function sendOtp(Request $request)
    {
        // 1. Validasi manual untuk debugging
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        // 2. Jika validasi gagal, kembali dengan pesan error yang jelas
        if ($validator->fails()) {
            return back()->with('error_message', 'Email yang Anda masukkan tidak terdaftar di sistem kami.');
        }

        // Jika validasi berhasil, lanjutkan proses
        $email = $request->email;

        // 3. Hapus OTP lama jika ada
        DB::table('password_reset_tokens')->where('email', $email)->delete();

        // 4. Buat OTP baru (6 digit angka acak)
        $otp = rand(100000, 999999);

        // 5. Simpan OTP ke database
        DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'otp' => $otp,
            'created_at' => Carbon::now()
        ]);

        // 6. Kirim email yang berisi OTP
        try {
            Mail::to($email)->send(new SendOtpMail($otp));

            // Log jika proses pengiriman berhasil (belum tentu email sampai)
            Log::info('Email OTP successfully dispatched for: ' . $email);

        } catch (\Exception $e) {
            // PERUBAHAN: Log error ke file dan kembali dengan pesan
            Log::error('Failed to send OTP email to ' . $email . ': ' . $e->getMessage());
            
            return back()->with('error_message', 'Terjadi kesalahan saat mengirim email. Silakan periksa file log untuk detailnya.');
        }

        // 7. Arahkan pengguna ke halaman untuk memasukkan OTP
        return redirect()->route('otp.verify.form')->with('email', $email);
    }
}
