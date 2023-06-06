<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelMahasiswa;
use App\Models\ModelUser;
use App\Models\ModelLog;
use App\Models\ModelPenurunanUKT;
use App\Models\ModelSetting;
use App\Models\ModelKriteria;
use App\Models\ModelNilaiKriteria;

class PenentuanUKT extends Controller
{

    private $ModelMahasiswa;
    private $ModelUser;
    private $ModelLog;
    private $ModelPenurunanUKT;
    private $ModelSetting;
    private $ModelKriteria;
    private $ModelNilaiKriteria;

    public function __construct()
    {
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelUser = new ModelUser();
        $this->ModelLog = new ModelLog();
        $this->ModelPenurunanUKT = new ModelPenurunanUKT();
        $this->ModelSetting = new ModelSetting();
        $this->ModelKriteria = new ModelKriteria();
        $this->ModelNilaiKriteria = new ModelNilaiKriteria();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Penentuan UKT',
            'subTitle'          => 'Proses Penentuan UKT',
            'form'              => 'Tambah',
            'setting'           => $this->ModelSetting->dataSetting(),
            'kriteria'          => $this->ModelKriteria->dataKriteria(),
            'nilaiKriteria'     => $this->ModelNilaiKriteria->dataNilaiKriteria(),
            'user'              => $this->ModelMahasiswa->detail(Session()->get('id_mahasiswa')),
        ];

        return view('mahasiswa.penentuanUKT.formPenentuan', $data);
    }

    public function prosesPenentuan()
    {
        $jumlahKriteria = $this->ModelKriteria->jumlahKriteria();
        for ($i = 1; $i < $jumlahKriteria + 1; $i++) {
            $data[$i] = Request()->{"data" . $i};
        }
    }
}
