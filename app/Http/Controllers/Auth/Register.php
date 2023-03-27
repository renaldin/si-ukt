<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelAuth;

class Register extends Controller
{

    private $ModelAuth;

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        if (Session()->get('email')) {
            if (Session()->get('status') === 'User') {
                return redirect()->route('dashboardUser');
            } else {
                return redirect()->route('dashboardAdmin');
            }
        }

        $data = [
            'title' => 'Register'
        ];

        return view('auth.register', $data);
    }

    public function registerProcess()
    {
        Request()->validate([
            'nama'              => 'required',
            'nomor_telepon'     => 'required|numeric',
            'email'             => 'required|unique:user,email|email',
            'password'          => 'required|min:6',
            'confirm_password'   => 'required|min:6|same:password'
        ], [
            'nama.required'             => 'Nama lengkap harus diisi!',
            'nomor_telepon.required'    => 'Nomor telepon harus diisi!',
            'nomor_telepon.numeric'     => 'Nomor telepon harus angka!',
            'email.required'            => 'Email harus diisi!',
            'email.unique'              => 'Email sudah digunakan!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'password.required'         => 'Password harus diisi!',
            'password.min'              => 'Password minimal 6 karakter!',
            'confirm_password.same'     => 'Ulangi Password  harus sama dengan Password!',
            'confirm_password.required'  => 'Ulangi Password harus diisi!',
            'confirm_password.min'       => 'Ulangi Password  minimal 6 karakter!',
        ]);

        $data = [
            'nama'              => Request()->nama,
            'nomor_telepon'     => Request()->nomor_telepon,
            'email'             => Request()->email,
            'password'          => Hash::make(Request()->password),
        ];

        $this->ModelAuth->register($data);
        return redirect()->route('login')->with('success', 'Anda berhasil membuat akun!');
    }
}
