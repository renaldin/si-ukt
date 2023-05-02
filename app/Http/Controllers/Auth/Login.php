<?php

namespace App\Http\Controllers\Auth;

use App\Mail\kirimEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelAuth;
use App\Models\ModelMahasiswa;
use App\Models\ModelAdmin;
use App\Models\ModelStaff;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Mail;

class Login extends Controller
{

    private $ModelAuth;
    private $ModelAdmin;
    private $ModelMahasiswa;
    private $ModelStaff;

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelStaff = new ModelStaff();
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
                return back()->with('fail', 'Login gagal! NIK belum terdaftar.');
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
            return redirect()->route('staff')->with('success', 'Logout berhasil!');
        }
    }

    public function lupaPasswordMahasiswa()
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
            'title' => 'Lupa Password'
        ];

        return view('auth.lupaPasswordMahasiswa', $data);
    }

    public function lupaPasswordAdmin()
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
            'title' => 'Lupa Password'
        ];

        return view('auth.lupaPasswordAdmin', $data);
    }

    public function lupaPasswordStaff()
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
            'title' => 'Lupa Password'
        ];

        return view('auth.lupaPasswordStaff', $data);
    }

    public function prosesLupaPassword()
    {
        $email = Request()->email;

        if (Request()->status === "Mahasiswa") {
            $user = $this->ModelAuth->cekEmailMahasiswa($email);
            if (!$user) {
                return back()->with('fail', 'Email tidak terdaftar.');
            }
            $id_user = $user->id_mahasiswa;
            $urlReset = 'http://127.0.0.1:8000/reset-password/' . $id_user;
            $route = 'login';
        } elseif (Request()->status === "Staff") {
            $user = $this->ModelAuth->cekEmailStaff($email);
            if (!$user) {
                return back()->with('fail', 'Email tidak terdaftar.');
            }
            $id_user = $user->id_staff;
            $urlReset = 'http://127.0.0.1:8000/reset-password-staff/' . $id_user;
            $route = 'staff';
        } elseif (Request()->status === "Admin") {
            $user = $this->ModelAuth->cekEmailAdmin($email);
            if (!$user) {
                return back()->with('fail', 'Email tidak terdaftar.');
            }
            $id_user = $user->id_admin;
            $urlReset = 'http://127.0.0.1:8000/reset-password-admin/' . $id_user;
            $route = 'admin';
        }

        if ($user) {
            $data_email = [
                'subject'       => 'Lupa Password',
                'sender_name'   => 'renaldinoviandi1@gmail.com',
                'urlUtama'      => 'http://127.0.0.1:8000',
                'urlReset'      => $urlReset,
                'dataUser'      => $user,
            ];

            Mail::to($user->email)->send(new kirimEmail($data_email));
            return redirect()->route($route)->with('success', 'Kami sudah kirim pesan ke email Anda. Silahkan cek email Anda!');
        } else {
            return back()->with('fail', 'Email tidak terdaftar.');
        }
    }

    public function resetPasswordMahasiswa($id_mahasiswa)
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
            'title' => 'Reset Password',
            'user'  => $this->ModelMahasiswa->detail($id_mahasiswa),
        ];

        return view('auth.resetPassword', $data);
    }

    public function resetPasswordAdmin($id_admin)
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
            'title' => 'Reset Password',
            'user'  => $this->ModelAdmin->detail($id_admin),
        ];

        return view('auth.resetPassword', $data);
    }

    public function resetPasswordStaff($id_staff)
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
            'title' => 'Reset Password',
            'user'  => $this->ModelStaff->detail($id_staff),
        ];

        return view('auth.resetPassword', $data);
    }

    public function prosesResetPassword($id_user)
    {
        Request()->validate([
            'password' => 'min:6|required|confirmed',
        ], [
            'password.required'    => 'Password baru harus diisi!',
            'password.min'         => 'Password baru minimal 6 karakter!',
            'password.confirmed'   => 'Password baru tidak sama!',
        ]);

        $status = Request()->status;
        if ($status === 'Mahasiswa') {
            $data = [
                'id_mahasiswa'  => $id_user,
                'password'      => Hash::make(Request()->password)
            ];

            $route = 'login';

            $this->ModelMahasiswa->edit($data);
        } elseif ($status === 'Admin') {
            $data = [
                'id_admin'      => $id_user,
                'password'      => Hash::make(Request()->password)
            ];

            $route = 'admin';

            $this->ModelAdmin->edit($data);
        } elseif ($status === 'Staff') {
            $data = [
                'id_staff'      => $id_user,
                'password'      => Hash::make(Request()->password)
            ];

            $route = 'staff';

            $this->ModelStaff->edit($data);
        }

        return redirect()->route($route)->with('success', 'Anda baru saja merubah password. Silahkan login!');
    }
}
