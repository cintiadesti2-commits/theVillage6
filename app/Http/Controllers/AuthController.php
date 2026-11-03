<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_awal' => 'required|string|max:100',
            'nama_akhir' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'no_hp' => 'required|string|max:20',
            'id_desa' => 'required|integer',
            'rt' => 'required|string|max:3',
            'rw' => 'required|string|max:3',
            'role' => 'required|in:USER,PENYELENGGARA',
        ]);

        User::create([
            'name' => $request->nama_awal . ' ' . $request->nama_akhir,
            'nama_awal' => $request->nama_awal,
            'nama_akhir' => $request->nama_akhir,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'id_desa' => $request->id_desa,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'role' => $request->role,
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau password salah.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // Membuat dan menyimpan api_token sesuai use case TheVillage
        $user->api_token = Str::random(60);
        $user->save();

        return redirect()->route('dashboard');
    }

    public function dashboard()
    {
        $user = Auth::user();

        if ($user->role === 'ADMIN') {
            $dashboard = 'Dashboard Admin';
        } elseif ($user->role === 'PENYELENGGARA') {
            $dashboard = 'Dashboard Penyelenggara';
        } else {
            $dashboard = 'Dashboard Warga';
        }

        return view('dashboard', compact('user', 'dashboard'));
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->api_token = null;
            $user->save();
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}