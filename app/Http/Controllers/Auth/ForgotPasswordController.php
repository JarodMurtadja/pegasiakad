<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    /**
     * Menampilkan form lupa password
     */
    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    /**
     * Proses kirim email reset password
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(64);

        // Simpan token ke database
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        // Kirim email
        Mail::send('email.forgetPassword', ['token' => $token, 'email' => $request->email], function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Reset Password - SIAKAD PEGA');
        });

        return back()->with('message', 'Link reset password sudah dikirim ke email kamu!');
    }

    /**
     * Tampilkan form ubah password dari link email
     */
    public function showResetPasswordForm($token)
    {
        // Ambil data reset berdasarkan token
        $reset = DB::table('password_resets')
                   ->where('token', $token)
                   ->first();

        if (!$reset) {
            return redirect()->route('login')->with('error', 'Token tidak valid atau sudah kadaluarsa.');
        }

        // Cek apakah token sudah kadaluarsa (opsional, 60 menit)
        if (Carbon::parse($reset->created_at)->addMinutes(60)->isPast()) {
            DB::table('password_resets')->where('token', $token)->delete();
            return redirect()->route('login')->with('error', 'Token sudah kadaluarsa. Silakan minta ulang.');
        }

        // Kirim token dan email ke view
        return view('auth.forgetPasswordLink', [
            'token' => $token,
            'email' => $reset->email
        ]);
    }

    /**
     * Proses update password
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $checkToken = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$checkToken) {
            return back()->withInput()->with('error', 'Token tidak valid atau sudah kadaluarsa!');
        }

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect('/login')->with('message', 'Password kamu berhasil diganti!');
    }
}