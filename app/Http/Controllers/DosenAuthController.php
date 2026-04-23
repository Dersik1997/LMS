<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dosen;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DosenAuthController extends Controller
{
    // =======================================================
    // 1. LOGIN MANUAL (BISA EMAIL ATAU NIDN)
    // =======================================================
    public function login(Request $request)
    {
        $loginId = $request->input('login_id'); 
        $password = $request->input('password');

        $fieldType = filter_var($loginId, FILTER_VALIDATE_EMAIL) ? 'email' : 'nidn';

        // [KEAMANAN] Hapus sesi Mahasiswa jika ada, sebelum Dosen login
        if (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        if (Auth::guard('dosen')->attempt([$fieldType => $loginId, 'password' => $password])) {
            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'redirect' => route('dosen.dashboard')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Email/NIDN atau password salah'
        ], 401);
    }

    // =======================================================
    // 2. REDIRECT KE HALAMAN GOOGLE
    // =======================================================
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // =======================================================
    // 3. PROSES DATA BALIKAN DARI GOOGLE
    // =======================================================
    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            $dosen = Dosen::where('email', $googleUser->getEmail())->first();

            if ($dosen) {
                if (!$dosen->google_id) {
                    $dosen->update(['google_id' => $googleUser->getId()]);
                }
                
                // [KEAMANAN] Pastikan sesi mahasiswa terhapus saat login Google
                if (Auth::guard('mahasiswa')->check()) {
                    Auth::guard('mahasiswa')->logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                }

                Auth::guard('dosen')->login($dosen);
                return redirect()->route('dosen.dashboard');
            } else {
                return redirect()->route('login.dosen')->with('error', 'Email tidak terdaftar sebagai Dosen. Hubungi Admin.');
            }
        } catch (\Exception $e) {
            return redirect()->route('login.dosen')->with('error', 'Gagal login dengan Google.');
        }
    }

    public function showLoginForm() {
        return view('dosen_login');
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nidn' => 'required|numeric|unique:dosens,nidn',
            'email' => 'required|email|unique:dosens,email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        }

        Dosen::create([
            'nama' => $request->nama,
            'nidn' => $request->nidn,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['success' => true, 'message' => 'Registrasi Berhasil!']);
    }
}