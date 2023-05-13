<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelStaff;
use App\Models\ModelAdmin;
use App\Models\ModelLog;

class KelolaStaff extends Controller
{

    private $ModelStaff;
    private $ModelAdmin;
    private $ModelLog;

    public function __construct()
    {
        $this->ModelStaff = new ModelStaff();
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelLog = new ModelLog();
    }

    public function index()
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'             => 'Data Staff',
            'subTitle'          => 'Daftar Staff',
            'daftarStaff'       => $this->ModelStaff->dataStaff(),
            'user'              => $this->ModelAdmin->detail(Session()->get('id_admin')),
        ];

        return view('admin.kelolaStaff.dataStaff', $data);
    }

    public function tambah()
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Staff',
            'subTitle'  => 'Tambah Staff',
            'user'      => $this->ModelAdmin->detail(Session()->get('id_admin')),
            'form'      => 'Tambah',
        ];

        return view('admin.kelolaStaff.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama_staff'        => 'required',
            'nik'               => 'required|unique:staff,nik|numeric',
            'email'             => 'required|unique:admin,email|unique:staff,email|unique:mahasiswa,email|email',
            'password'          => 'min:6|required',
            'foto_user'         => 'required|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama_staff.required'       => 'Nama lengkap harus diisi!',
            'nik.required'              => 'NIP/NIK harus diisi!',
            'nik.numeric'               => 'NIP/NIK harus angka!',
            'email.unique'              => 'Email sudah digunakan!',
            'email.required'            => 'Email harus diisi!',
            'nik.unique'                => 'NIP/NIK sudah digunakan!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'password.required'         => 'Password harus diisi!',
            'password.min'              => 'Password minimal 6 karakter!',
            'foto_user.required'        => 'Foto Anda harus diisi!',
            'foto_user.mimes'           => 'Format Foto Anda harus jpg/jpeg/png!',
            'foto_user.max'             => 'Ukuran Foto Anda maksimal 2 mb',
        ]);

        $file1 = Request()->foto_user;
        $fileUser = date('mdYHis') . ' ' . Request()->nama_staff . '.' . $file1->extension();
        $file1->move(public_path('foto_user'), $fileUser);

        $data = [
            'nama_staff'        => Request()->nama_staff,
            'nik'               => Request()->nik,
            'email'             => Request()->email,
            'foto_user'         => $fileUser,
            'password'          => Hash::make(Request()->password),
        ];

        // log
        $dataLog = [
            'id_admin'      => Session()->get('id_admin'),
            'keterangan'    => 'Melakukan tambah staff dengan NIK/NIP ' . Request()->nik,
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelStaff->tambah($data);
        return redirect()->route('daftar-staff')->with('success', 'Data staff berhasil ditambahkan !');
    }

    public function edit($id_staff)
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'         => 'Data Staff',
            'subTitle'      => 'Edit Staff',
            'form'          => 'Edit',
            'user'          => $this->ModelAdmin->detail(Session()->get('id_admin')),
            'detail'        => $this->ModelStaff->detail($id_staff)
        ];

        return view('admin.kelolaStaff.form', $data);
    }

    public function prosesEdit($id_staff)
    {
        Request()->validate([
            'nama_staff'        => 'required',
            'nik'               => 'required|numeric',
            'email'             => 'required|email',
            'foto_user'         => 'mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama_staff.required'       => 'Nama lengkap harus diisi!',
            'nik.required'              => 'NIP/NIK harus diisi!',
            'nik.numeric'               => 'NIP/NIK harus angka!',
            'email.required'            => 'Email harus diisi!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'foto_user.mimes'           => 'Format Foto Anda harus jpg/jpeg/png!',
            'foto_user.max'             => 'Ukuran Foto Anda maksimal 2 mb',
        ]);

        if (Request()->password) {

            $user = $this->ModelStaff->detail($id_staff);

            if (Request()->foto_user <> "") {
                if ($user->foto_user <> "") {
                    unlink(public_path('foto_user') . '/' . $user->foto_user);
                }

                $file = Request()->foto_user;
                $fileUser = date('mdYHis') . Request()->nama_staff . '.' . $file->extension();
                $file->move(public_path('foto_user'), $fileUser);

                $data = [
                    'id_staff'          => $id_staff,
                    'nama_staff'        => Request()->nama_staff,
                    'nik'               => Request()->nik,
                    'email'             => Request()->email,
                    'foto_user'         => $fileUser,
                    'password'          => Hash::make(Request()->password),
                ];
                $this->ModelStaff->edit($data);
            } else {
                $data = [
                    'id_staff'          => $id_staff,
                    'nama_staff'        => Request()->nama_staff,
                    'nik'               => Request()->nik,
                    'email'             => Request()->email,
                    'password'          => Hash::make(Request()->password),
                ];
                $this->ModelStaff->edit($data);
            }
        } else {
            $user = $this->ModelStaff->detail($id_staff);

            if (Request()->foto_user <> "") {
                if ($user->foto_user <> "") {
                    unlink(public_path('foto_user') . '/' . $user->foto_user);
                }

                $file = Request()->foto_user;
                $fileUser = date('mdYHis') . Request()->nama_staff . '.' . $file->extension();
                $file->move(public_path('foto_user'), $fileUser);

                $data = [
                    'id_staff'          => $id_staff,
                    'nama_staff'        => Request()->nama_staff,
                    'nik'               => Request()->nik,
                    'email'             => Request()->email,
                    'foto_user'         => $fileUser,
                ];
                $this->ModelStaff->edit($data);
            } else {
                $data = [
                    'id_staff'          => $id_staff,
                    'nama_staff'        => Request()->nama_staff,
                    'nik'               => Request()->nik,
                    'email'             => Request()->email,
                ];
                $this->ModelStaff->edit($data);
            }
        }

        // log
        $dataLog = [
            'id_admin'      => Session()->get('id_admin'),
            'keterangan'    => 'Melakukan edit staff dengan NIK/NIP ' . Request()->nik,
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        return redirect()->route('daftar-staff')->with('success', 'Data staff berhasil diedit!');
    }

    public function prosesHapus($id_staff)
    {
        $user = $this->ModelStaff->detail($id_staff);

        if ($user->foto_user <> "") {
            unlink(public_path('foto_user') . '/' . $user->foto_user);
        }

        // log
        $dataLog = [
            'id_admin'      => Session()->get('id_admin'),
            'keterangan'    => 'Melakukan hapus staff dengan NIK/NIP ' . $user->nik,
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelStaff->hapus($id_staff);
        return redirect()->route('daftar-staff')->with('success', 'Data staff berhasil dihapus !');
    }

    public function profil()
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Profil',
            'subTitle'  => 'Edit Profil',
            'user'      => $this->ModelStaff->detail(Session()->get('id_staff'))
        ];

        return view('staff.profil.dataProfil', $data);
    }

    public function prosesEditProfil($id_staff)
    {
        Request()->validate([
            'nama_staff'        => 'required',
            'nik'               => 'required|numeric',
            'email'             => 'required|unique:admin,email|unique:mahasiswa,email|email',
            'foto_user'         => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama_staff.required'       => 'Nama lengkap harus diisi!',
            'nik.required'              => 'NIP/NIK harus diisi!',
            'nik.numeric'               => 'NIP/NIK harus angka!',
            'email.required'            => 'Email harus diisi!',
            'email.unique'              => 'Email sudah digunakan!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'foto_user.mimes'           => 'Format Foto Anda harus jpg/jpeg/png!',
            'foto_user.max'             => 'Ukuran Foto Anda maksimal 2 mb',
        ]);

        if (Request()->foto_user <> "") {
            $staff = $this->ModelStaff->detail($id_staff);
            if ($staff->foto_user <> "") {
                unlink(public_path('foto_user') . '/' . $staff->foto_user);
            }

            $file = Request()->foto_user;
            $fileName = date('mdYHis') . Request()->nama_staff . '.' . $file->extension();
            $file->move(public_path('foto_user'), $fileName);

            $data = [
                'id_staff'          => $id_staff,
                'nama_staff'        => Request()->nama_staff,
                'nik'               => Request()->nik,
                'email'             => Request()->email,
                'foto_user'         => $fileName,
            ];
        } else {
            $data = [
                'id_staff'          => $id_staff,
                'nama_staff'        => Request()->nama_staff,
                'nik'               => Request()->nik,
                'email'             => Request()->email,
            ];
        }

        // log
        $dataLog = [
            'id_staff'      => Session()->get('id_staff'),
            'keterangan'    => 'Melakukan edit profil',
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelStaff->edit($data);
        return redirect()->route('profil-staff')->with('success', 'Profil berhasil diedit !');
    }

    // public function ubahPassword($id_member)
    // {
    //     if (!Session()->get('email')) {
    //         return redirect()->route('login');
    //     }


    //     $data = [
    //         'title'     => 'Ubah Password',
    //         'user'      => $this->ModelStaff->detail($id_member)
    //     ];

    //     return view('user.profil.ubahPassword', $data);
    // }

    // public function prosesUbahPassword($id_member)
    // {
    //     Request()->validate([
    //         'password_lama'     => 'required|min:6',
    //         'password_baru'     => 'required|min:6',
    //     ], [
    //         'password_lama.required'    => 'Password Lama harus diisi!',
    //         'password_lama.min'         => 'Password Lama minimal 6 karakter!',
    //         'password_baru.required'    => 'Passwofd Baru harus diisi!',
    //         'password_baru.min'         => 'Password Lama minimal 6 karakter!',
    //     ]);

    //     $user = $this->ModelStaff->detail($id_member);

    //     if (Hash::check(Request()->password_lama, $user->password)) {
    //         $data = [
    //             'id_member'         => $id_member,
    //             'password'          => Hash::make(Request()->password_baru)
    //         ];

    //         $this->ModelStaff->edit($data);
    //         return back()->with('berhasil', 'Password berhasil diedit !');
    //     } else {
    //         return back()->with('gagal', 'Password Lama tidak sesuai.');
    //     }
    // }
}
