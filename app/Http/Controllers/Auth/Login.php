<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
            if (Session()->get('status') === 'Mahasiswa') {
                return redirect()->route('dashboard-mahasiswa');
            } elseif (Session()->get('status') === 'Admin') {
                return redirect()->route('dashboard-admin');
            } elseif (Session()->get('status') === 'Staff') {
                return redirect()->route('dashboard-staff');
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
            if (Session()->get('status') === 'Mahasiswa') {
                return redirect()->route('dashboard-mahasiswa');
            } elseif (Session()->get('status') === 'Admin') {
                return redirect()->route('dashboard-admin');
            } elseif (Session()->get('status') === 'Staff') {
                return redirect()->route('dashboard-staff');
            }
        }

        $data = [
            'title' => 'Login Admin'
        ];

        return view('auth.loginAdmin', $data);
    }

    public function staff()
    {
        if (Session()->get('email')) {
            if (Session()->get('status') === 'Mahasiswa') {
                return redirect()->route('dashboard-mahasiswa');
            } elseif (Session()->get('status') === 'Admin') {
                return redirect()->route('dashboard-admin');
            } elseif (Session()->get('status') === 'Staff') {
                return redirect()->route('dashboard-staff');
            }
        }

        $data = [
            'title' => 'Login Staff'
        ];

        return view('auth.loginStaff', $data);
    }

    public function loginProcess()
    {
        if (Request()->status === "Mahasiswa") {
            Request()->validate([
                'nim'             => 'required|numeric',
                'password'        => 'min:6|required',
            ], [
                'nim.required'              => 'NIM harus diisi!',
                'nim.numeric'               => 'Format NIM harus angka!',
                'password.required'         => 'Password harus diisi!',
                'password.min'              => 'Password minimal 6 karakter!',
            ]);

            $cekNim = $this->ModelAuth->cekNimMahasiswa(Request()->nim);

            if ($cekNim) {
                if (Hash::check(Request()->password, $cekNim->password)) {
                    Session()->put('id_mahasiswa', $cekNim->id_mahasiswa);
                    Session()->put('nim', $cekNim->nim);
                    Session()->put('email', $cekNim->email);
                    Session()->put('status', $cekNim->status);
                    Session()->put('log', true);

                    return redirect()->route('dashboard-mahasiswa');
                } else {
                    return back()->with('fail', 'Login gagal! Password tidak sesuai.');
                }
            } else {
                return back()->with('fail', 'Login gagal! NIM belum terdaftar.');
            }
        } else if (Request()->status === "Admin") {
            Request()->validate([
                'email'           => 'required|email',
                'password'        => 'min:6|required',
            ], [
                'email.required'            => 'Email harus diisi!',
                'email.email'               => 'Format Email salah! Contoh: contoh@gmail.com',
                'password.required'         => 'Password harus diisi!',
                'password.min'              => 'Password minimal 6 karakter!',
            ]);

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
        } else if (Request()->status === "Staff") {
            Request()->validate([
                'nik'             => 'required|numeric',
                'password'        => 'min:6|required',
            ], [
                'nik.required'              => 'NIK harus diisi!',
                'nik.numeric'               => 'Format NIK harus angka!',
                'password.required'         => 'Password harus diisi!',
                'password.min'              => 'Password minimal 6 karakter!',
            ]);

            $cekNik = $this->ModelAuth->cekNikStaff(Request()->nik);

            if ($cekNik) {
                if (Hash::check(Request()->password, $cekNik->password)) {
                    Session()->put('id_staff', $cekNik->id_staff);
                    Session()->put('nik', $cekNik->nik);
                    Session()->put('email', $cekNik->email);
                    Session()->put('status', $cekNik->status);
                    Session()->put('log', true);

                    return redirect()->route('dashboard-staff');
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
        if (Session()->get('status') === "Mahasiswa") {
            Session()->forget('id_mahasiswa');
            Session()->forget('nim');
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
        } else if (Session()->get('status') === 'Staff') {
            Session()->forget('id_admin');
            Session()->forget('nik');
            Session()->forget('email');
            Session()->forget('status');
            Session()->forget('log');
            return redirect()->route('admin')->with('success', 'Logout berhasil!');
        }
    }
}
