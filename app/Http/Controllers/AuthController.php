<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;


class AuthController extends Controller
{
    public function auth()
    {
        return view('auth');
    }

    public function register(Request $request)
    {
        $request->validate([
            'employee' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ], [
            'employee.required' => 'Employee harus diisi',
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        try {
            $user = User::create([
                'employee' => $request->employee,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            //SMTP
            Notification::send($user, new VerifyEmail());

            return redirect()->route('auth')->with('success', 'Registrasi Succes! Silahkan cek email anda  untuk verifikasi akun!');
        } catch (\Exception $e) {
            return redirect()->route('auth')->with('error', 'Registrasi gagal' . $e);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->email_verified_at) {
                if (Auth::user()->role === 'administrator') {
                    return redirect()->route('admin')->with('success', 'Selamat datang Administrator!');
                } else {
                    return redirect()->route('user')->with('success', 'Anda berhasil masuk!');
                }
            } else {
                Auth::logout();
                return back()->with('error', 'Harap verifikasi akun anda!');
            }
        }
        return redirect()->route('auth')->with('error', 'Email dan Password tidak sesuai!');
    }

    public function verify($id, $hash)
    {
        $user = User::findOrFail($id);

        if (sha1($user->getEmailForVerification()) !== $hash) {
            return redirect()->route('auth')->with('error', 'Link verifikasi tidak valid!');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('auth')->with('success', 'Akun anda sudah terverifikasi');
        }

        if ($user->markEmailAsVerified()) {
            return redirect()->route('auth')->with('success', 'Akun anda berhasil terverifikasi');
        }

        return redirect()->route('auth')->with('error', 'Gagal verikasi email!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
