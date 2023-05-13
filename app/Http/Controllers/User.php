<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelLog;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{

    private $ModelUser;
    private $ModelLog;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelLog = new ModelLog();
    }

    public function index()
    {
    }

    public function profil()
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Profil',
            'subTitle'  => 'Edit Profil',
            'user'      => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('profil.dataProfil', $data);
    }

    public function prosesEditProfil($id_user)
    {
        Request()->validate([
            'nama_user'         => 'required',
            'nik'               => 'required|numeric',
            'email'             => 'required|unique:admin,email|unique:mahasiswa,email|email',
            'foto_user'         => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama_user.required'        => 'Nama lengkap harus diisi!',
            'nik.required'              => 'NIP/NIK harus diisi!',
            'nik.numeric'               => 'NIP/NIK harus angka!',
            'email.required'            => 'Email harus diisi!',
            'email.unique'              => 'Email sudah digunakan!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'foto_user.mimes'           => 'Format Foto Anda harus jpg/jpeg/png!',
            'foto_user.max'             => 'Ukuran Foto Anda maksimal 2 mb',
        ]);

        if (Request()->foto_user <> "") {
            $staff = $this->ModelUser->detail($id_user);
            if ($staff->foto_user <> "") {
                unlink(public_path('foto_user') . '/' . $staff->foto_user);
            }

            $file = Request()->foto_user;
            $fileName = date('mdYHis') . Request()->nama_user . '.' . $file->extension();
            $file->move(public_path('foto_user'), $fileName);

            $data = [
                'id_user'          => $id_user,
                'nama_user'        => Request()->nama_user,
                'nik'               => Request()->nik,
                'email'             => Request()->email,
                'foto_user'         => $fileName,
            ];
        } else {
            $data = [
                'id_user'          => $id_user,
                'nama_user'        => Request()->nama_user,
                'nik'               => Request()->nik,
                'email'             => Request()->email,
            ];
        }

        // log
        $dataLog = [
            'id_user'       => Session()->get('id_user'),
            'keterangan'    => 'Melakukan edit profil',
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelUser->edit($data);
        return redirect()->route('profil')->with('success', 'Profil berhasil diedit !');
    }

    public function ubahPassword()
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Profil',
            'subTitle'  => 'Ubah Password',
            'user'      => $this->ModelUser->detail(Session()->get('id_user'))
        ];

        return view('profil.ubahPassword', $data);
    }

    public function prosesUbahPassword($id_user)
    {
        Request()->validate([
            'password_lama'     => 'required|min:6',
            'password_baru'     => 'required|min:6',
        ], [
            'password_lama.required'    => 'Password Lama harus diisi!',
            'password_lama.min'         => 'Password Lama minimal 6 karakter!',
            'password_baru.required'    => 'Passwofd Baru harus diisi!',
            'password_baru.min'         => 'Password Lama minimal 6 karakter!',
        ]);

        $user = $this->ModelUser->detail($id_user);

        if (Hash::check(Request()->password_lama, $user->password)) {
            $data = [
                'id_user'         => $id_user,
                'password'         => Hash::make(Request()->password_baru)
            ];

            $this->ModelUser->edit($data);
            return back()->with('success', 'Password berhasil diubah !');
        } else {
            return back()->with('fail', 'Password Lama tidak sesuai.');
        }
    }
}
