<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelMahasiswa;
use App\Models\ModelAdmin;
use App\Models\ModelLog;

class KelolaMahasiswa extends Controller
{

    private $ModelMahasiswa;
    private $ModelAdmin;
    private $ModelLog;

    public function __construct()
    {
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelLog = new ModelLog();
    }

    public function index()
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'             => 'Data Mahasiswa',
            'subTitle'          => 'Daftar Mahasiswa',
            'daftarMahasiswa'   => $this->ModelMahasiswa->dataMahasiswa(),
            'user'              => $this->ModelAdmin->detail(Session()->get('id_admin')),
        ];

        return view('admin.kelolaMahasiswa.dataMahasiswa', $data);
    }

    public function tambah()
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Mahasiswa',
            'subTitle'  => 'Tambah Mahasiswa',
            'user'      => $this->ModelAdmin->detail(Session()->get('id_admin')),
            'form'      => 'Tambah',
        ];

        return view('admin.kelolaMahasiswa.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama_mahasiswa'    => 'required',
            'nim'               => 'required|numeric|unique:mahasiswa,nim',
            'email'             => 'required|unique:admin,email|unique:staff,email|unique:mahasiswa,email|email',
            'password'          => 'min:6|required',
            'foto_user'         => 'required|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama_mahasiswa.required'   => 'Nama lengkap harus diisi!',
            'nim.required'              => 'NIM harus diisi!',
            'nim.numeric'               => 'NIM harus angka!',
            'email.required'            => 'Email harus diisi!',
            'email.unique'              => 'Email sudah digunakan!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'nim.unique'                => 'NIM sudah digunakan!',
            'password.required'         => 'Password harus diisi!',
            'password.min'              => 'Password minimal 6 karakter!',
            'foto_user.required'        => 'Foto Anda harus diisi!',
            'foto_user.mimes'           => 'Format Foto Anda harus jpg/jpeg/png!',
            'foto_user.max'             => 'Ukuran Foto Anda maksimal 2 mb',
        ]);

        $file1 = Request()->foto_user;
        $fileUser = date('mdYHis') . ' ' . Request()->nama_mahasiswa . '.' . $file1->extension();
        $file1->move(public_path('foto_user'), $fileUser);

        $data = [
            'nama_mahasiswa'    => Request()->nama_mahasiswa,
            'nim'               => Request()->nim,
            'email'             => Request()->email,
            'foto_user'         => $fileUser,
            'password'          => Hash::make(Request()->password),
        ];

        // log
        $dataLog = [
            'id_admin'      => Session()->get('id_admin'),
            'keterangan'    => 'Melakukan tambah mahasiswa dengan NIM ' . Request()->nim,
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelMahasiswa->tambah($data);
        return redirect()->route('daftar-mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan !');
    }

    public function edit($id_mahasiswa)
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'         => 'Data Mahasiswa',
            'subTitle'      => 'Edit Mahasiswa',
            'form'          => 'Edit',
            'user'          => $this->ModelAdmin->detail(Session()->get('id_admin')),
            'detail'        => $this->ModelMahasiswa->detail($id_mahasiswa)
        ];

        return view('admin.kelolaMahasiswa.form', $data);
    }

    public function prosesEdit($id_mahasiswa)
    {
        Request()->validate([
            'nama_mahasiswa'    => 'required',
            'nim'               => 'required|numeric',
            'email'             => 'required|email',
            'foto_user'         => 'mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama_mahasiswa.required'   => 'Nama lengkap harus diisi!',
            'nim.required'              => 'Nim harus diisi!',
            'nim.numeric'               => 'Nim harus angka!',
            'email.required'            => 'Email harus diisi!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'foto_user.mimes'           => 'Format Foto Anda harus jpg/jpeg/png!',
            'foto_user.max'             => 'Ukuran Foto Anda maksimal 2 mb',
        ]);

        if (Request()->password) {

            $user = $this->ModelMahasiswa->detail($id_mahasiswa);

            if (Request()->foto_user <> "") {
                if ($user->foto_user <> "") {
                    unlink(public_path('foto_user') . '/' . $user->foto_user);
                }

                $file = Request()->foto_user;
                $fileUser = date('mdYHis') . Request()->nama_mahasiswa . '.' . $file->extension();
                $file->move(public_path('foto_user'), $fileUser);

                $data = [
                    'id_mahasiswa'      => $id_mahasiswa,
                    'nama_mahasiswa'    => Request()->nama_mahasiswa,
                    'nim'               => Request()->nim,
                    'email'             => Request()->email,
                    'foto_user'         => $fileUser,
                    'password'          => Hash::make(Request()->password),
                ];
                $this->ModelMahasiswa->edit($data);
            } else {
                $data = [
                    'id_mahasiswa'      => $id_mahasiswa,
                    'nama_mahasiswa'    => Request()->nama_mahasiswa,
                    'nim'               => Request()->nim,
                    'email'             => Request()->email,
                    'password'          => Hash::make(Request()->password),
                ];
                $this->ModelMahasiswa->edit($data);
            }
        } else {
            $user = $this->ModelMahasiswa->detail($id_mahasiswa);

            if (Request()->foto_user <> "") {
                if ($user->foto_user <> "") {
                    unlink(public_path('foto_user') . '/' . $user->foto_user);
                }

                $file = Request()->foto_user;
                $fileUser = date('mdYHis') . Request()->nama_mahasiswa . '.' . $file->extension();
                $file->move(public_path('foto_user'), $fileUser);

                $data = [
                    'id_mahasiswa'      => $id_mahasiswa,
                    'nama_mahasiswa'    => Request()->nama_mahasiswa,
                    'nim'               => Request()->nim,
                    'email'             => Request()->email,
                    'foto_user'         => $fileUser,
                ];
                $this->ModelMahasiswa->edit($data);
            } else {
                $data = [
                    'id_mahasiswa'      => $id_mahasiswa,
                    'nama_mahasiswa'    => Request()->nama_mahasiswa,
                    'nim'               => Request()->nim,
                    'email'             => Request()->email,
                ];
                $this->ModelMahasiswa->edit($data);
            }
        }

        // log
        $dataLog = [
            'id_admin'      => Session()->get('id_admin'),
            'keterangan'    => 'Melakukan edit mahasiswa dengan NIM ' . Request()->nim,
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        return redirect()->route('daftar-mahasiswa')->with('success', 'Data mahasiswa berhasil diedit!');
    }

    public function prosesHapus($id_mahasiswa)
    {
        $user = $this->ModelMahasiswa->detail($id_mahasiswa);

        if ($user->foto_user <> "") {
            unlink(public_path('foto_user') . '/' . $user->foto_user);
        }

        // log
        $dataLog = [
            'id_admin'      => Session()->get('id_admin'),
            'keterangan'    => 'Melakukan hapus mahasiswa dengan NIM ' . $user->nim,
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelMahasiswa->hapus($id_mahasiswa);
        return redirect()->route('daftar-mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus !');
    }

    // public function profil()
    // {
    //     if (!Session()->get('email')) {
    //         return redirect()->route('login');
    //     }

    //     $data = [
    //         'title'     => 'Profil',
    //         'user'      => $this->ModelMahasiswa->detail(Session()->get('id_member'))
    //     ];

    //     return view('user.profil.profil', $data);
    // }

    // public function editProfil($id_member)
    // {
    //     Request()->validate([
    //         'nama'              => 'required',
    //         'nomor_telepon'     => 'required|numeric',
    //         'alamat'            => 'required',
    //         'nama_perusahaan'   => 'required',
    //         'alamat_perusahaan' => 'required',
    //         'email'             => 'required|email',
    //         'foto_perusahaan'   => 'mimes:jpeg,png,jpg|max:2048',
    //         'foto_user'         => 'mimes:jpeg,png,jpg|max:2048',
    //     ], [
    //         'nama.required'             => 'Nama lengkap harus diisi!',
    //         'nomor_telepon.required'    => 'Nomor telepon harus diisi!',
    //         'nomor_telepon.numeric'     => 'Nomor telepon harus angka!',
    //         'alamat.required'           => 'Alamat harus diisi!',
    //         'nama_perusahaan.required'  => 'Nama perusahaan harus diisi!',
    //         'alamat_perusahaan.required' => 'Alamat perusahaan harus diisi!',
    //         'email.required'            => 'Email harus diisi!',
    //         'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
    //         'foto_perusahaan.mimes'     => 'Format Logo Perusahaan harus jpg/jpeg/png!',
    //         'foto_perusahaan.max'       => 'Ukuran Logo Perusahaan maksimal 2 mb',
    //         'foto_user.mimes'           => 'Format Foto Anda harus jpg/jpeg/png!',
    //         'foto_user.max'             => 'Ukuran Foto Anda maksimal 2 mb',
    //     ]);

    //     $user = $this->ModelMahasiswa->detail($id_member);

    //     if (Request()->foto_perusahaan <> "") {
    //         if ($user->foto_perusahaan <> "") {
    //             unlink(public_path('foto_perusahaan') . '/' . $user->foto_perusahaan);
    //         }

    //         $file1 = Request()->foto_perusahaan;
    //         $filePerusahaan = date('mdYHis') . Request()->nama_perusahaan . '.' . $file1->extension();
    //         $file1->move(public_path('foto_perusahaan'), $filePerusahaan);

    //         $data = [
    //             'id_member'         => $id_member,
    //             'nama'              => Request()->nama,
    //             'nomor_telepon'     => Request()->nomor_telepon,
    //             'alamat'            => Request()->alamat,
    //             'nama_perusahaan'   => Request()->nama_perusahaan,
    //             'alamat_perusahaan' => Request()->alamat_perusahaan,
    //             'email'             => Request()->email,
    //             'foto_perusahaan'   => $filePerusahaan
    //         ];
    //         $this->ModelMahasiswa->edit($data);
    //     } else {
    //         $data = [
    //             'id_member'         => $id_member,
    //             'nama'              => Request()->nama,
    //             'nomor_telepon'     => Request()->nomor_telepon,
    //             'alamat'            => Request()->alamat,
    //             'nama_perusahaan'   => Request()->nama_perusahaan,
    //             'alamat_perusahaan' => Request()->alamat_perusahaan,
    //             'email'             => Request()->email,
    //         ];
    //         $this->ModelMahasiswa->edit($data);
    //     }

    //     if (Request()->foto_user <> "") {
    //         if ($user->foto_user <> "") {
    //             unlink(public_path('foto_user') . '/' . $user->foto_user);
    //         }

    //         $file2 = Request()->foto_user;
    //         $fileUser = date('mdYHis') . Request()->nama_perusahaan . '.' . $file2->extension();
    //         $file2->move(public_path('foto_user'), $fileUser);

    //         $data = [
    //             'id_member'         => $id_member,
    //             'nama'              => Request()->nama,
    //             'nomor_telepon'     => Request()->nomor_telepon,
    //             'alamat'            => Request()->alamat,
    //             'nama_perusahaan'   => Request()->nama_perusahaan,
    //             'alamat_perusahaan' => Request()->alamat_perusahaan,
    //             'email'             => Request()->email,
    //             'foto_user'         => $fileUser
    //         ];
    //         $this->ModelMahasiswa->edit($data);
    //     } else {
    //         $data = [
    //             'id_member'         => $id_member,
    //             'nama'              => Request()->nama,
    //             'nomor_telepon'     => Request()->nomor_telepon,
    //             'alamat'            => Request()->alamat,
    //             'nama_perusahaan'   => Request()->nama_perusahaan,
    //             'alamat_perusahaan' => Request()->alamat_perusahaan,
    //             'email'             => Request()->email,
    //         ];
    //         $this->ModelMahasiswa->edit($data);
    //     }

    //     return redirect()->route('profil')->with('berhasil', 'Profil berhasil diedit !');
    // }

    // public function ubahPassword($id_member)
    // {
    //     if (!Session()->get('email')) {
    //         return redirect()->route('login');
    //     }


    //     $data = [
    //         'title'     => 'Ubah Password',
    //         'user'      => $this->ModelMahasiswa->detail($id_member)
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

    //     $user = $this->ModelMahasiswa->detail($id_member);

    //     if (Hash::check(Request()->password_lama, $user->password)) {
    //         $data = [
    //             'id_member'         => $id_member,
    //             'password'          => Hash::make(Request()->password_baru)
    //         ];

    //         $this->ModelMahasiswa->edit($data);
    //         return back()->with('berhasil', 'Password berhasil diedit !');
    //     } else {
    //         return back()->with('gagal', 'Password Lama tidak sesuai.');
    //     }
    // }
}
