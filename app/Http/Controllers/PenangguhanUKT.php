<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelMahasiswa;
use App\Models\ModelUser;
use App\Models\ModelLog;
use App\Models\ModelPenangguhanUKT;
use App\Models\ModelSetting;

class PenangguhanUKT extends Controller
{

    private $ModelMahasiswa;
    private $ModelUser;
    private $ModelLog;
    private $ModelPenangguhanUKT;
    private $ModelSetting;

    public function __construct()
    {
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelUser = new ModelUser();
        $this->ModelLog = new ModelLog();
        $this->ModelPenangguhanUKT = new ModelPenangguhanUKT();
        $this->ModelSetting = new ModelSetting();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Penangguhan UKT',
            'subTitle'          => 'Pengajuan Penangguhan UKT',
            'form'              => 'Tambah',
            'setting'           => $this->ModelSetting->dataSetting(),
            'user'              => $this->ModelMahasiswa->detail(Session()->get('id_mahasiswa')),
        ];

        return view('mahasiswa.penangguhanUKT.formPengajuan', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama_orang_tua'            => 'required',
            'alamat_orang_tua'          => 'required',
            'nomor_telepon_orang_tua'   => 'required|numeric',
            'semester'                  => 'required|numeric',
            'alasan'                    => 'required',
            'angsuran_pertama'          => 'required|numeric',
            'tanggal_angsuran_pertama'  => 'required|date',
            'angsuran_kedua'            => 'required|numeric',
            'tanggal_angsuran_kedua'    => 'required|date',
            'jenis_wawancara'           => 'required',
        ], [
            'nama_orang_tua.required'           => 'Nama orang tua wajib diisi!',
            'alamat_orang_tua.required'         => 'Alamat orang tua wajib diisi!',
            'nomor_telepon_orang_tua.required'  => 'Nomor telepon orang tua wajib diisi!',
            'nomor_telepon_orang_tua.numeric'   => 'Nomor telepon orang tua wajib angka!',
            'semester.required'                 => 'Semester wajib diisi!',
            'semester.numeric'                  => 'Semester wajib angka!',
            'alasan.required'                   => 'Alasan wajib diisi!',
            'angsuran_pertama.required'         => 'Angsuran pertama wajib diisi!',
            'angsuran_pertama.numeric'          => 'Angsuran pertama wajib angka!',
            'tanggal_angsuran_pertama.required' => 'Tanggal angsuran pertama wajib diisi!',
            'tanggal_angsuran_pertama.date'     => 'Tanggal angsuran pertama wajib tanggal!',
            'angsuran_kedua.required'           => 'Angsuran kedua wajib diisi!',
            'angsuran_kedua.numeric'            => 'Angsuran kedua wajib angka!',
            'tanggal_angsuran_kedua.required'   => 'Tanggal angsuran kedua wajib diisi!',
            'tanggal_angsuran_kedua.date'       => 'Tanggal angsuran kedua wajib tanggal!',
            'jenis_wawancara.required'          => 'Jenis wawancara harus diisi!',
        ]);

        $setting = $this->ModelSetting->dataSetting();
        $currentDate = date('Y-m-d');
        $tambahHari = '+' . $setting->batas_tanggal_angsuran . ' days';
        $batasTanggalAngsuran  = date('Y-m-d', strtotime($tambahHari, strtotime($currentDate)));

        if (Request()->tanggal_angsuran_pertama > $batasTanggalAngsuran) {
            return redirect()->back()->with('fail', 'Tanggal angsuran pertama melebihi batas tanggal angsuran, mohon diperbaiki!');
        } elseif (Request()->tanggal_angsuran_kedua > $batasTanggalAngsuran) {
            return redirect()->back()->with('fail', 'Tanggal angsuran kedua melebihi batas tanggal angsuran, mohon diperbaiki!');
        } else {
            $data = [
                'id_mahasiswa'              => Session()->get('id_mahasiswa'),
                'nama_orang_tua'            => Request()->nama_orang_tua,
                'alamat_orang_tua'          => Request()->alamat_orang_tua,
                'nomor_telepon_orang_tua'   => Request()->nomor_telepon_orang_tua,
                'semester'                  => Request()->semester,
                'nominal_ukt'               => Request()->nominal_ukt,
                'denda'                     => Request()->denda,
                'alasan'                    => Request()->alasan,
                'angsuran_pertama'          => Request()->angsuran_pertama,
                'angsuran_kedua'            => Request()->angsuran_kedua,
                'tanggal_angsuran_pertama'  => Request()->tanggal_angsuran_pertama,
                'tanggal_angsuran_kedua'    => Request()->tanggal_angsuran_kedua,
                'jenis_wawancara'           => Request()->jenis_wawancara,
                'tanggal_pengajuan'         => date('Y-m-d H:i:s'),
                'status_penangguhan'        => 'Belum Dikirim',
            ];

            $dataMahasiswa = [
                'id_mahasiswa'      => Session()->get('id_mahasiswa'),
                'status_pengajuan'  => 'Penangguhan'
            ];
            $this->ModelMahasiswa->edit($dataMahasiswa);

            // log
            $dataLog = [
                'id_mahasiswa'  => Session()->get('id_mahasiswa'),
                'keterangan'    => 'Melakukan pengajuan penangguhan UKT ',
                'status_user'   => session()->get('status')
            ];
            $this->ModelLog->tambah($dataLog);
            // end log

            $this->ModelPenangguhanUKT->tambah($data);
            return redirect()->route('riwayat-pengajuan-penangguhan-ukt')->with('success', 'Anda berhasil menambahkan pengajuan penangguhan UKT!');
        }
    }

    public function edit($id_penangguhan_ukt)
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Penangguhan UKT',
            'subTitle'          => 'Edit Penangguhan UKT',
            'form'              => 'Edit',
            'setting'           => $this->ModelSetting->dataSetting(),
            'user'              => $this->ModelMahasiswa->detail(Session()->get('id_mahasiswa')),
            'detail'            => $this->ModelPenangguhanUKT->detail($id_penangguhan_ukt),
        ];

        return view('mahasiswa.penangguhanUKT.formPengajuan', $data);
    }

    public function prosesEdit($id_penangguhan_ukt)
    {
        Request()->validate([
            'nama_orang_tua'            => 'required',
            'alamat_orang_tua'          => 'required',
            'nomor_telepon_orang_tua'   => 'required|numeric',
            'semester'                  => 'required|numeric',
            'alasan'                    => 'required',
            'angsuran_pertama'          => 'required|numeric',
            'tanggal_angsuran_pertama'  => 'required|date',
            'angsuran_kedua'            => 'required|numeric',
            'tanggal_angsuran_kedua'    => 'required|date',
            'jenis_wawancara'           => 'required',
        ], [
            'nama_orang_tua.required'           => 'Nama orang tua wajib diisi!',
            'alamat_orang_tua.required'         => 'Alamat orang tua wajib diisi!',
            'nomor_telepon_orang_tua.required'  => 'Nomor telepon orang tua wajib diisi!',
            'nomor_telepon_orang_tua.numeric'   => 'Nomor telepon orang tua wajib angka!',
            'semester.required'                 => 'Semester wajib diisi!',
            'semester.numeric'                  => 'Semester wajib angka!',
            'alasan.required'                   => 'Alasan wajib diisi!',
            'angsuran_pertama.required'         => 'Angsuran pertama wajib diisi!',
            'angsuran_pertama.numeric'          => 'Angsuran pertama wajib angka!',
            'tanggal_angsuran_pertama.required' => 'Tanggal angsuran pertama wajib diisi!',
            'tanggal_angsuran_pertama.date'     => 'Tanggal angsuran pertama wajib tanggal!',
            'angsuran_kedua.required'           => 'Angsuran kedua wajib diisi!',
            'angsuran_kedua.numeric'            => 'Angsuran kedua wajib angka!',
            'tanggal_angsuran_kedua.required'   => 'Tanggal angsuran kedua wajib diisi!',
            'tanggal_angsuran_kedua.date'       => 'Tanggal angsuran kedua wajib tanggal!',
            'jenis_wawancara.required'          => 'Jenis wawancara harus diisi!',
        ]);

        $data = [
            'id_penangguhan_ukt'        => $id_penangguhan_ukt,
            'id_mahasiswa'              => Session()->get('id_mahasiswa'),
            'nama_orang_tua'            => Request()->nama_orang_tua,
            'alamat_orang_tua'          => Request()->alamat_orang_tua,
            'nomor_telepon_orang_tua'   => Request()->nomor_telepon_orang_tua,
            'semester'                  => Request()->semester,
            'nominal_ukt'               => Request()->nominal_ukt,
            'denda'                     => Request()->denda,
            'alasan'                    => Request()->alasan,
            'angsuran_pertama'          => Request()->angsuran_pertama,
            'angsuran_kedua'            => Request()->angsuran_kedua,
            'tanggal_angsuran_pertama'  => Request()->tanggal_angsuran_pertama,
            'tanggal_angsuran_kedua'    => Request()->tanggal_angsuran_kedua,
            'jenis_wawancara'           => Request()->jenis_wawancara,
        ];

        $dataMahasiswa = [
            'id_mahasiswa'      => Session()->get('id_mahasiswa'),
            'status_pengajuan'  => 'Penangguhan'
        ];
        $this->ModelMahasiswa->edit($dataMahasiswa);

        // log
        $dataLog = [
            'id_mahasiswa'  => Session()->get('id_mahasiswa'),
            'keterangan'    => 'Melakukan edit pengajuan penangguhan UKT ',
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelPenangguhanUKT->edit($data);
        return redirect()->route('riwayat-pengajuan-penangguhan-ukt')->with('success', 'Anda berhasil edit pengajuan penangguhan UKT!');
    }

    public function riwayat()
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Penangguhan UKT',
            'subTitle'          => 'Riwayat Penangguhan UKT',
            'user'              => $this->ModelMahasiswa->detail(Session()->get('id_mahasiswa')),
            'dataPenangguhanUKT' => $this->ModelPenangguhanUKT->dataPenangguhanUKTByMahasiswa(Session()->get('id_mahasiswa')),
        ];

        return view('mahasiswa.penangguhanUKT.riwayat', $data);
    }

    public function prosesHapus($id_penangguhan_ukt)
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        $dataMahasiswa = [
            'id_mahasiswa'      => Session()->get('id_mahasiswa'),
            'status_pengajuan'  => 'Tidak'
        ];
        $this->ModelMahasiswa->edit($dataMahasiswa);

        // log
        $dataLog = [
            'id_mahasiswa'  => Session()->get('id_mahasiswa'),
            'keterangan'    => 'Melakukan hapus data pengajuan',
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelPenangguhanUKT->hapus($id_penangguhan_ukt);
        return redirect()->route('riwayat-pengajuan-penangguhan-ukt')->with('success', 'Data pengajuan penangguhan UKT berhasil dihapus !');
    }

    public function prosesKirim($id_penangguhan_ukt)
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        $data = [
            'id_penangguhan_ukt'    => $id_penangguhan_ukt,
            'status_penangguhan'    => 'Proses di Bagian Keuangan',
        ];

        // log
        $dataLog = [
            'id_mahasiswa'  => Session()->get('id_mahasiswa'),
            'keterangan'    => 'Melakukan kirim data pengajuan',
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelPenangguhanUKT->edit($data);
        return redirect()->route('riwayat-pengajuan-penangguhan-ukt')->with('success', 'Data pengajuan penangguhan UKT berhasil dikirim !');
    }

    public function kelolaPenangguhanUKT()
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Penangguhan UKT',
            'subTitle'          => 'Kelola Penangguhan UKT',
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'dataPenangguhanUKT' => $this->ModelPenangguhanUKT->dataPenangguhanUKT(),
        ];

        return view('bagianKeuangan.penangguhanUKT.kelola', $data);
    }

    public function beriJadwal($id_penangguhan_ukt)
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        if (Request()->link_wawancara === null) {
            $data = [
                'id_penangguhan_ukt'    => $id_penangguhan_ukt,
                'tanggal_wawancara'     => Request()->tanggal_wawancara,
                'jam_wawancara'         => Request()->jam_wawancara,
            ];
        } else {
            $data = [
                'id_penangguhan_ukt'    => $id_penangguhan_ukt,
                'tanggal_wawancara'     => Request()->tanggal_wawancara,
                'jam_wawancara'         => Request()->jam_wawancara,
                'link_wawancara'        => Request()->link_wawancara,
            ];
        }

        // log
        $dataLog = [
            'id_user'      => Session()->get('id_user'),
            'keterangan'    => 'Memberi jadwal wawancara',
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelPenangguhanUKT->edit($data);
        return redirect()->route('kelola-penangguhan-ukt')->with('success', 'Anda berhasil memberikan jadwal wawancara !');
    }

    public function tidakSetuju($id_penangguhan_ukt)
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        $data = [
            'id_penangguhan_ukt'    => $id_penangguhan_ukt,
            'status_penangguhan'    => 'Tidak Setuju',
        ];

        $detail = $this->ModelPenangguhanUKT->detail($id_penangguhan_ukt);

        $dataMahasiswa = [
            'id_mahasiswa'          => $detail->id_mahasiswa,
            'status_pengajuan'      => 'Tidak',
        ];
        $this->ModelMahasiswa->edit($dataMahasiswa);

        // log
        $dataLog = [
            'id_user'      => Session()->get('id_user'),
            'keterangan'    => 'Memberi keputusan tidak setuju untuk pengajuan penangguhan UKT dari ' . $detail->nama_mahasiswa,
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        if (Session()->get('status') == 'Bagian Keuangan') {
            $route = 'kelola-penangguhan-ukt';
        } elseif (Session()->get('status') == 'Kabag Umum & Akademik') {
            $route = 'approve-penangguhan-ukt';
        }

        $this->ModelPenangguhanUKT->edit($data);
        return redirect()->route($route)->with('success', 'Anda berhasil memberikan keputusan tidak setuju !');
    }

    public function setujuBagianKeuangan($id_penangguhan_ukt)
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        $data = [
            'id_penangguhan_ukt'    => $id_penangguhan_ukt,
            'status_penangguhan'    => 'Proses di Kepala Bagian',
        ];

        $detail = $this->ModelPenangguhanUKT->detail($id_penangguhan_ukt);

        // log
        $dataLog = [
            'id_user'      => Session()->get('id_user'),
            'keterangan'    => 'Memberi keputusan setuju dan mengirim data pengajuan penangguhan UKT ke Kabag Umum & Akademik',
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelPenangguhanUKT->edit($data);
        return redirect()->route('kelola-penangguhan-ukt')->with('success', 'Anda berhasil memberikan keputusan setuju dan kirim data ke Kabag Umum & Akademik!');
    }

    public function laporanPenangguhanUKT()
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Penangguhan UKT',
            'subTitle'          => 'Laporan Penangguhan UKT',
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'dataPenangguhanUKT' => $this->ModelPenangguhanUKT->dataPenangguhanUKT(),
        ];

        return view('bagianKeuangan.penangguhanUKT.laporan', $data);
    }
}
