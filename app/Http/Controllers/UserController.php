<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\news;
// use sweetalert
use SweetAlert2\Laravel\Swal;
// use auth
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display users
        return view('home');
    }
    public function store(Request $request)
    {
        try {
            // Validasi data (confirmed sudah otomatis cek password confirmation)
            $validateData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // Cek IP dari X-Forwarded-For atau fallback ke IP standar
            $ip = $request->headers->get('X-Forwarded-For') ?? $request->ip();

            // Siapkan data untuk disimpan
            $userData = [
                'fullname' => $validateData['first_name'] . ' ' . $validateData['last_name'],
                'first_name' => $validateData['first_name'],
                'last_name' => $validateData['last_name'],
                'email' => $validateData['email'],
                'password' => Hash::make($validateData['password']),
                'ip_address' => $ip,
            ];

            // Simpan user
            $user = User::create($userData);

            return redirect('/')->with('success', 'Registration successful! Welcome, ' . $user->first_name . '!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangkap validation errors
            $errors = $e->validator->errors();

            if ($errors->has('password')) {
                return back()->with('error', 'Password confirmation does not match.');
            }

            if ($errors->has('email')) {
                return back()->with('error', 'Email already exists.');
            }

            return back()->with('error', 'Validation failed. Please check your input.');

        } catch (\Exception $e) {
            return back()->with('error', 'Registration failed: ' . $e->getMessage());
        }
    }

    public function loginAuth(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt login
        if (auth()->attempt($credentials)) {
            // Regenerate session untuk security
            $request->session()->regenerate();

            return redirect('/')->with('success', 'Login successful! Welcome back!');
        }

        // Jika login gagal
        return back()->with('error', 'Invalid email or password.');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }

    // nampilin dashboard
    public function dashboard($id)
    {
        $user = User::find($id);
        // Pastikan untuk menggunakan `get()` untuk mendapatkan data
        $news = News::where('user_id', $user->id)->get(); // Menambahkan `get()` untuk mendapatkan data

        return view('dashboard', compact('user', 'news'));
    }

}
