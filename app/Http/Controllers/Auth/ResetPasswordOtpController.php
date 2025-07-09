<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class ResetPasswordOtpController extends Controller
{
    // Menampilkan halaman formulir untuk memasukkan OTP
    public function showVerifyForm()
    {
        // Pastikan ada email di session sebelum menampilkan halaman
        if (!session('email')) {
            return redirect()->route('password.request')->with('error', 'Sesi tidak valid. Silakan coba lagi.');
        }
        return view('auth.verify-otp');
    }

    // Memverifikasi OTP yang dimasukkan pengguna
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric|digits:6',
        ]);

        $otpData = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        // Cek jika OTP salah atau tidak ada
        if (!$otpData) {
            return back()->with('error', 'Kode OTP tidak valid.');
        }

        // Cek jika OTP sudah kedaluwarsa (misal: lebih dari 10 menit)
        if (Carbon::parse($otpData->created_at)->addMinutes(10)->isPast()) {
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            return redirect()->route('password.request')->with('error', 'Kode OTP sudah kedaluwarsa. Silakan minta yang baru.');
        }

        // Jika berhasil, simpan email ke session dan arahkan ke form reset password
        session(['email_for_reset' => $request->email]);
        return redirect()->route('password.reset.otp');
    }

    // Menampilkan halaman formulir untuk membuat password baru
    public function showResetForm()
    {
        if (!session('email_for_reset')) {
            return redirect()->route('password.request')->with('error', 'Sesi tidak valid. Silakan coba lagi.');
        }
        return view('auth.reset-password-otp');
    }

    // Menyimpan password baru
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan.');
        }

        // Update password pengguna
        $user->password = Hash::make($request->password);
        $user->save();

        // Hapus OTP dari database setelah berhasil digunakan
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('status', 'Password Anda berhasil diatur ulang. Silakan login.');
    }
}
