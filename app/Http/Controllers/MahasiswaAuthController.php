<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

class MahasiswaAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'password' => 'required'
        ]);

        $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();

        if (!$mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'NIM tidak terdaftar'
            ], 404);
        }

        if (!Hash::check($request->password, $mahasiswa->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Kata sandi salah'
            ], 401);
        }

        // Hapus sesi Dosen jika ada, sebelum Mahasiswa login
        if (Auth::guard('dosen')->check()) {
            Auth::guard('dosen')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        // KITA KEMBALIKAN KE VERSI TANPA 'true' AGAR DATABASE TIDAK ERROR
        Auth::guard('mahasiswa')->login($mahasiswa);
        
        // Memaksa Laravel membuat Session ID baru
        $request->session()->regenerate();

        return response()->json([
            'success' => true,
            'redirect' => route('dashboard')
        ]);
    }

    public function register(Request $request) {
    $request->validate([
        'nama' => 'required',
        'nim' => 'required|unique:mahasiswas,nim',
        'password' => 'required|min:4'
    ]);

    \App\Models\Mahasiswa::create([
        'nama' => $request->nama,
        'nim' => $request->nim,
        'password' => \Illuminate\Support\Facades\Hash::make($request->password),
    ]);

    return response()->json(['success' => true]);
}
}