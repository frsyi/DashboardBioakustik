<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    private $baseURL;

    public function __construct()
    {
        $this->baseURL = env('API_BASE_URL', 'http://localhost:3000/api');
    }

    // Login
    public function login(Request $request)
    {
        $response = Http::post("{$this->baseURL}/auth/login", [
            'username' => $request->username,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $token = $response->json('access_token');
            session(['access_token' => $token]);

            return redirect('/dashboard')->with('success', 'Login berhasil');
        }

        return back()->withErrors(['login' => 'Username atau password salah']);
    }

    // Logout
    public function logout()
    {
        session()->forget('access_token');
        return redirect('/login')->with('success', 'Logout berhasil');
    }

    // Ambil Data Menggunakan Token
    public function fetchData()
    {
        $token = session('access_token');
        if (!$token) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu']);
        }

        $response = Http::withToken($token)->get("{$this->baseURL}/auth/user");
        if ($response->successful()) {
            return view('dashboard', ['data' => $response->json()]);
        }

        return redirect('/login')->withErrors(['fetch' => 'Gagal mengambil data']);
    }
}
