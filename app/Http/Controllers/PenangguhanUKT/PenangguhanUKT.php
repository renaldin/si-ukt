<?php

namespace App\Http\Controllers\PenangguhanUKT;

use App\Http\Controllers\Controller;
use App\Models\ModelMahasiswa;
use App\Models\ModelLog;
use App\Models\ModelPenangguhanUKT;

class PenangguhanUKT extends Controller
{

    private $ModelMahasiswa;
    private $ModelLog;
    private $ModelPenangguhanUKT;

    public function __construct()
    {
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelLog = new ModelLog();
        $this->ModelPenangguhanUKT = new ModelPenangguhanUKT();
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
            'user'              => $this->ModelMahasiswa->detail(Session()->get('id_mahasiswa')),
        ];

        return view('mahasiswa.penangguhanUKT.formPengajuan', $data);
    }

    public function prosesPenangguhanUKT($id_penangguhan_ukt = null)
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
        ]);

        if ($id_penangguhan_ukt === null) {
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
                'tanggal_pengajuan'         => date('Y-m-d'),
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
        } else {
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
            return redirect()->route('riwayat-pengajuan-penangguhan-ukt')->with('success', 'Anda berhasil menambahkan pengajuan penangguhan UKT!');
        }
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
}
