<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Buat pengguna baru dalam database
        $user = User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Lakukan tindakan lanjutan setelah pendaftaran sukses, seperti autentikasi pengguna
        // atau mengirim email verifikasi, sesuai dengan kebutuhan Anda.

        // Redirect pengguna ke halaman sukses pendaftaran atau halaman lain yang sesuai
        return redirect('/')->with('success', 'Pendaftaran berhasil. Silakan masuk ke akun Anda.');
    }
}