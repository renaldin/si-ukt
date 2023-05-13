<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelKelompokUKT;
use App\Models\ModelAdmin;
use App\Models\ModelLog;

class KelompokUKT extends Controller
{

    private $ModelKelompokUKT;
    private $ModelAdmin;
    private $ModelLog;

    public function __construct()
    {
        $this->ModelKelompokUKT = new ModelKelompokUKT();
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelLog = new ModelLog();
    }

    public function index()
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'             => 'Data Kelompok UKT',
            'subTitle'          => 'Daftar Kelompok UKT',
            'daftarKelompokUKT' => $this->ModelKelompokUKT->dataKelompokUKT(),
            'user'              => $this->ModelAdmin->detail(Session()->get('id_admin')),
        ];

        return view('admin.kelompokUKT.dataKelompokUKT', $data);
    }

    public function tambah()
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Kelompok UKT',
            'subTitle'  => 'Tambah Kelompok UKT',
            'user'      => $this->ModelAdmin->detail(Session()->get('id_admin')),
            'form'      => 'Tambah',
        ];

        return view('admin.kelompokUKT.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'kelompok_ukt'      => 'required|numeric',
            'program_studi'     => 'required',
            'nominal'           => 'required|numeric',
        ], [
            'kelompok_ukt.required'     => 'Kelompok UKT harus diisi!',
            'kelompok_ukt.numeric'      => 'Kelompok UKT harus angka!',
            'program_studi.required'    => 'Program Studi harus diisi!',
            'nominal.required'          => 'Nominal harus diisi!',
            'nominal.numeric'           => 'Nominal harus angka!',
        ]);

        $data = [
            'kelompok_ukt'      => Request()->kelompok_ukt,
            'program_studi'     => Request()->program_studi,
            'nominal'           => Request()->nominal,
        ];

        // log
        $dataLog = [
            'id_admin'      => Session()->get('id_admin'),
            'keterangan'    => 'Melakukan tambah Kelompok UKT ' . Request()->kelompok_ukt . ' dengan nominal Rp ' . number_format(Request()->nominal, 0, ',', '.'),
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelKelompokUKT->tambah($data);
        return redirect()->route('daftar-kelompok-ukt')->with('success', 'Data kelompok UKT berhasil ditambahkan !');
    }

    public function edit($id_kelompok_ukt)
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'         => 'Data Kelompok UKT',
            'subTitle'      => 'Edit Kelompok UKT',
            'form'          => 'Edit',
            'user'          => $this->ModelAdmin->detail(Session()->get('id_admin')),
            'detail'        => $this->ModelKelompokUKT->detail($id_kelompok_ukt)
        ];

        return view('admin.kelompokUKT.form', $data);
    }

    public function prosesEdit($id_kelompok_ukt)
    {
        Request()->validate([
            'kelompok_ukt'      => 'required|numeric',
            'program_studi'     => 'required',
            'nominal'           => 'required|numeric',
        ], [
            'kelompok_ukt.required'     => 'Kelompok UKT harus diisi!',
            'kelompok_ukt.numeric'      => 'Kelompok UKT harus angka!',
            'kelompok_ukt.unique'       => 'Kelompok UKT sudah digunakan!',
            'program_studi.required'    => 'Program Studi harus diisi!',
            'nominal.required'          => 'Nominal harus diisi!',
            'nominal.numeric'           => 'Nominal harus angka!',
        ]);

        $data = [
            'id_kelompok_ukt'   => $id_kelompok_ukt,
            'kelompok_ukt'      => Request()->kelompok_ukt,
            'nominal'           => Request()->nominal,
        ];

        $this->ModelKelompokUKT->edit($data);

        // log
        $dataLog = [
            'id_admin'      => Session()->get('id_admin'),
            'keterangan'    => 'Melakukan edit Kelompok UKT ' . Request()->kelompok_ukt . ' dengan nominal Rp ' . number_format(Request()->nominal, 0, ',', '.'),
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        return redirect()->route('daftar-kelompok-ukt')->with('success', 'Data kelompok UKT berhasil diedit!');
    }

    public function prosesHapus($id_kelompok_ukt)
    {

        // log
        $dataLog = [
            'id_admin'      => Session()->get('id_admin'),
            'keterangan'    => 'Melakukan hapus Kelompok UKT ' . Request()->kelompok_ukt . ' dengan nominal Rp ' . number_format(Request()->nominal, 0, ',', '.'),
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelKelompokUKT->hapus($id_kelompok_ukt);
        return redirect()->route('daftar-kelompok-ukt')->with('success', 'Data kelompok UKT berhasil dihapus !');
    }
}
