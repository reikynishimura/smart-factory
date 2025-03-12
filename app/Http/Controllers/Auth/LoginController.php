<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        // Validasi input
        $request->validate([
            'nip' => 'required|string|exists:users,nip',
            'password' => 'required|string',
        ], [
            'nip.required' => 'NIP wajib diisi.',
            'nip.exists' => 'NIP tidak terdaftar.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Coba login
        if (Auth::attempt(['nip' => $request->nip, 'password' => $request->password])) {
            return redirect()->route('home')->with('success', 'Login berhasil!');
        }

        // Jika password salah, kirim error hanya untuk password
        return back()->withErrors(['password' => 'Password salah.'])->withInput($request->only('nip'));
    }
}
