<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\ModelAuth;

class Login extends Controller
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
            'title' => 'Login'
        ];

        return view('auth.login', $data);
    }

    public function admin()
    {
        if (Session()->get('email')) {
            if (Session()->get('status') === 'User') {
                return redirect()->route('dashboard-user');
            } else {
                return redirect()->route('dashboard-admin');
            }
        }

        $data = [
            'title' => 'Login Admin'
        ];

        return view('auth.loginAdmin', $data);
    }

    public function loginProcess()
    {
        Request()->validate([
            'email'             => 'required|email',
            'password'          => 'min:6|required',
        ], [
            'email.required'            => 'Email harus diisi!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'password.required'         => 'Password harus diisi!',
            'password.min'              => 'Password minimal 6 karakter!',
        ]);

        if (Request()->status === "User") {
            $cekEmail = $this->ModelAuth->cekEmailUser(Request()->email);

            if ($cekEmail) {
                if (Hash::check(Request()->password, $cekEmail->password)) {
                    Session()->put('id_user', $cekEmail->id_user);
                    Session()->put('email', $cekEmail->email);
                    Session()->put('status', $cekEmail->status);
                    Session()->put('log', true);

                    return redirect()->route('dashboard-user');
                } else {
                    return back()->with('fail', 'Login gagal! Password tidak sesuai.');
                }
            } else {
                return back()->with('fail', 'Login gagal! Email belum terdaftar.');
            }
        } else if (Request()->status === "Admin") {
            $cekEmail = $this->ModelAuth->cekEmailAdmin(Request()->email);

            if ($cekEmail) {
                if (Hash::check(Request()->password, $cekEmail->password)) {
                    Session()->put('id_admin', $cekEmail->id_admin);
                    Session()->put('email', $cekEmail->email);
                    Session()->put('status', $cekEmail->status);
                    Session()->put('log', true);

                    return redirect()->route('dashboard-admin');
                } else {
                    return back()->with('fail', 'Login gagal! Password tidak sesuai.');
                }
            } else {
                return back()->with('fail', 'Login gagal! Email belum terdaftar.');
            }
        }
    }

    public function logout()
    {
        if (Session()->get('status') === "User") {
            Session()->forget('id_user');
            Session()->forget('email');
            Session()->forget('status');
            Session()->forget('log');
            return redirect()->route('login')->with('success', 'Logout berhasil!');
        } else if (Session()->get('status') === 'Admin') {
            Session()->forget('id_admin');
            Session()->forget('email');
            Session()->forget('status');
            Session()->forget('log');
            return redirect()->route('admin')->with('success', 'Logout berhasil!');
        }
    }
}
