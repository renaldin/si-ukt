<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelAdmin;
use App\Models\ModelLog;

class KelolaAdmin extends Controller
{

    private $ModelAdmin;
    private $ModelLog;

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelLog = new ModelLog();
    }

    public function index()
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'         => 'Data Admin',
            'subTitle'      => 'Daftar Admin',
            'daftarAdmin'   => $this->ModelAdmin->dataAdmin(),
            'user'          => $this->ModelAdmin->detail(Session()->get('id_admin')),
        ];

        return view('admin.kelolaAdmin.dataAdmin', $data);
    }

    public function tambah()
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Admin',
            'subTitle'  => 'Tambah Admin',
            'user'      => $this->ModelAdmin->detail(Session()->get('id_admin')),
            'form'      => 'Tambah',
        ];

        return view('admin.kelolaAdmin.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama_admin'        => 'required',
            'email'             => 'required|unique:admin,email|unique:staff,email|unique:mahasiswa,email|email',
            'password'          => 'min:6|required',
            'foto_user'         => 'required|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama_admin.required'       => 'Nama lengkap harus diisi!',
            'email.required'            => 'Email harus diisi!',
            'email.unique'              => 'Email sudah digunakan!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'password.required'         => 'Password harus diisi!',
            'password.min'              => 'Password minimal 6 karakter!',
            'foto_user.required'        => 'Foto harus diisi!',
            'foto_user.mimes'           => 'Format Foto harus jpg/jpeg/png/bmp!',
            'foto_user.max'             => 'Ukuran Foto maksimal 2 mb',
        ]);

        $file = Request()->foto_user;
        $fileName = date('mdYHis') . Request()->nama_admin . '.' . $file->extension();
        $file->move(public_path('foto_user'), $fileName);

        $data = [
            'nama_admin'        => Request()->nama_admin,
            'email'             => Request()->email,
            'password'          => Hash::make(Request()->password),
            'foto_user'         => $fileName,
        ];

        // log
        $dataLog = [
            'id_admin'      => Session()->get('id_admin'),
            'keterangan'    => 'Melakukan tambah admin dengan Email ' . Request()->email,
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelAdmin->tambah($data);
        return redirect()->route('daftar-admin')->with('success', 'Data admin berhasil ditambahkan !');
    }

    public function edit($id_admin)
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Admin',
            'subTitle'  => 'Edit Admin',
            'form'      => 'Edit',
            'user'      => $this->ModelAdmin->detail(Session()->get('id_admin')),
            'detail'    => $this->ModelAdmin->detail($id_admin)
        ];

        return view('admin.kelolaAdmin.form', $data);
    }

    public function prosesEdit($id_admin)
    {
        Request()->validate([
            'nama_admin'        => 'required',
            'email'             => 'required|unique:staff,email|unique:mahasiswa,email|email',
            'foto_user'         => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama_admin.required'       => 'Nama lengkap harus diisi!',
            'email.required'            => 'Email harus diisi!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'email.unique'              => 'Email sudah digunakan!',
            'foto_user.mimes'           => 'Format Foto harus jpg/jpeg/png/bmp!',
            'foto_user.max'             => 'Ukuran Foto maksimal 2 mb',
        ]);

        if (Request()->foto_user <> "") {
            $admin = $this->ModelAdmin->detail($id_admin);
            if ($admin->foto_user <> "") {
                unlink(public_path('foto_user') . '/' . $admin->foto_user);
            }

            $file = Request()->foto_user;
            $fileName = date('mdYHis') . Request()->nama_admin . '.' . $file->extension();
            $file->move(public_path('foto_user'), $fileName);

            if (Request()->password) {
                $data = [
                    'id_admin'          => $id_admin,
                    'nama_admin'        => Request()->nama_admin,
                    'email'             => Request()->email,
                    'password'          => Hash::make(Request()->password),
                    'foto_user'         => $fileName
                ];
            } else {
                $data = [
                    'id_admin'          => $id_admin,
                    'nama_admin'        => Request()->nama_admin,
                    'email'             => Request()->email,
                    'foto_user'         => $fileName
                ];
            }
        } else {
            if (Request()->password) {
                $data = [
                    'id_admin'          => $id_admin,
                    'nama_admin'        => Request()->nama_admin,
                    'email'             => Request()->email,
                    'password'          => Hash::make(Request()->password),
                ];
            } else {
                $data = [
                    'id_admin'          => $id_admin,
                    'nama_admin'        => Request()->nama_admin,
                    'email'             => Request()->email,
                ];
            }
        }

        // log
        $dataLog = [
            'id_admin'      => Session()->get('id_admin'),
            'keterangan'    => 'Melakukan edit admin dengan Email ' . Request()->email,
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelAdmin->edit($data);
        return redirect()->route('daftar-admin')->with('success', 'Data admin berhasil diedit !');
    }

    public function prosesHapus($id_admin)
    {
        $admin = $this->ModelAdmin->detail($id_admin);
        if ($admin->foto_user <> "") {
            unlink(public_path('foto_user') . '/' . $admin->foto_user);
        }

        // log
        $dataLog = [
            'id_admin'      => Session()->get('id_admin'),
            'keterangan'    => 'Melakukan hapus admin dengan Email ' . $admin->email,
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelAdmin->hapus($id_admin);
        return redirect()->route('daftar-admin')->with('success', 'Data admin berhasil dihapus !');
    }

    public function profil()
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Profil',
            'subTitle'  => 'Edit Profil',
            'user'      => $this->ModelAdmin->detail(Session()->get('id_admin'))
        ];

        return view('admin.profil.dataProfil', $data);
    }

    public function prosesEditProfil($id_admin)
    {
        Request()->validate([
            'nama_admin'        => 'required',
            'email'             => 'required|unique:staff,email|unique:mahasiswa,email|email',
            'foto_user'              => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama_admin.required'       => 'Nama lengkap harus diisi!',
            'email.required'            => 'Email harus diisi!',
            'email.unique'              => 'Email sudah digunakan!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'foto.mimes'                => 'Format Foto harus jpg/jpeg/png/bmp!',
            'foto.max'                  => 'Ukuran Foto maksimal 2 mb',
        ]);

        if (Request()->foto_user <> "") {
            $admin = $this->ModelAdmin->detail($id_admin);
            if ($admin->foto_user <> "") {
                unlink(public_path('foto_user') . '/' . $admin->foto_user);
            }

            $file = Request()->foto_user;
            $fileName = date('mdYHis') . Request()->nama_admin . '.' . $file->extension();
            $file->move(public_path('foto_user'), $fileName);

            $data = [
                'id_admin'          => $id_admin,
                'nama_admin'        => Request()->nama_admin,
                'email'             => Request()->email,
                'foto_user'              => $fileName
            ];
        } else {
            $data = [
                'id_admin'          => $id_admin,
                'nama_admin'        => Request()->nama_admin,
                'email'             => Request()->email,
            ];
        }

        // log
        $dataLog = [
            'id_admin'      => Session()->get('id_admin'),
            'keterangan'    => 'Melakukan edit profil',
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelAdmin->edit($data);
        return redirect()->route('profil-admin')->with('success', 'Profil berhasil diedit !');
    }

    public function ubahPassword($id_admin)
    {
        Request()->validate([
            'passwordLama'  => 'required|min:6',
            'passwordBaru'  => 'required|min:6',
        ], [
            'passwordLama.required' => 'Password Lama harus diisi!',
            'passwordLama.min'      => 'Password Lama minimal 6 karakter!',
            'passwordBaru.required' => 'Password Baru harus diisi!',
            'passwordBaru.min'      => 'Password Baru minimal 6 karakter!',
        ]);

        $admin = $this->ModelAdmin->detail($id_admin);

        if (Hash::check(Request()->passwordLama, $admin->password)) {
            $data = [
                'id_admin'          => $id_admin,
                'password'          => Hash::make(Request()->passwordBaru)
            ];

            $this->ModelAdmin->edit($data);
            return redirect()->route('profil-admin')->with('berhasil', 'Profil berhasil diedit !');
        } else {
            return back()->with('gagal', 'Password Lama tidak sesuai.');
        }
    }
}
