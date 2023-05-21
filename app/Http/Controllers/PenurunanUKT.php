<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelMahasiswa;
use App\Models\ModelUser;
use App\Models\ModelLog;
use App\Models\ModelPenurunanUKT;

class PenurunanUKT extends Controller
{

    private $ModelMahasiswa;
    private $ModelUser;
    private $ModelLog;
    private $ModelPenurunanUKT;

    public function __construct()
    {
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelUser = new ModelUser();
        $this->ModelLog = new ModelLog();
        $this->ModelPenurunanUKT = new ModelPenurunanUKT();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Penurunan UKT',
            'subTitle'          => 'Pengajuan Penurunan UKT',
            'form'              => 'Tambah',
            'dataPenurunanUKT'  => $this->ModelPenurunanUKT->detailByMahasiswa(Session()->get('id_mahasiswa')),
            'user'              => $this->ModelMahasiswa->detail(Session()->get('id_mahasiswa')),
        ];

        return view('mahasiswa.penurunanUKT.formPengajuan', $data);
    }

    public function prosesTambah()
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        Request()->validate([
            'sktm'           => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'khs'            => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'struk_listrik'  => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'foto_rumah'     => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'slip_gaji'      => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'surat_pengajuan' => 'mimes:jpeg,png,jpg,pdf|max:2048',
        ], [
            'sktm.mimes'            => 'Format SKTM harus jpg/jpeg/png/pdf!',
            'sktm.max'              => 'Ukuran SKTM maksimal 2 mb',
            'khs.mimes'             => 'Format KHS harus jpg/jpeg/png/pdf!',
            'khs.max'               => 'Ukuran KHS maksimal 2 mb',
            'struk_listrik.mimes'   => 'Format Struk Listrik harus jpg/jpeg/png/pdf!',
            'struk_listrik.max'     => 'Ukuran Struk Listrik maksimal 2 mb',
            'foto_rumah.mimes'      => 'Format Foto Rumah harus jpg/jpeg/png/pdf!',
            'foto_rumah.max'        => 'Ukuran Foto Rumah maksimal 2 mb',
            'slip_gaji.mimes'       => 'Format Slip Gaji harus jpg/jpeg/png/pdf!',
            'slip_gaji.max'         => 'Ukuran Slip Gaji maksimal 2 mb',
            'surat_pengajuan.mimes' => 'Format Surat Pengajuan harus jpg/jpeg/png/pdf!',
            'surat_pengajuan.max'   => 'Ukuran Surat Pengajuan maksimal 2 mb',
        ]);

        $mahasiswa = $this->ModelMahasiswa->detail(Session()->get('id_mahasiswa'));

        // Dokumen
        $fileSuratPengajuan = Request()->surat_pengajuan;
        $fileNameSuratPengajuan = date('mdYHis') . ' Surat Pengajuan ' . $mahasiswa->nama_mahasiswa . '.' . $fileSuratPengajuan->extension();
        $fileSuratPengajuan->move(public_path('dokumen_penurunan_ukt/surat_pengajuan'), $fileNameSuratPengajuan);

        $fileSKTM = Request()->sktm;
        $fileNameSKTM = date('mdYHis') . ' SKTM ' . $mahasiswa->nama_mahasiswa . '.' . $fileSKTM->extension();
        $fileSKTM->move(public_path('dokumen_penurunan_ukt/sktm'), $fileNameSKTM);

        $fileKHS = Request()->khs;
        $fileNameKHS = date('mdYHis') . ' KHS ' . $mahasiswa->nama_mahasiswa . '.' . $fileKHS->extension();
        $fileKHS->move(public_path('dokumen_penurunan_ukt/khs'), $fileNameKHS);

        $fileStrukListrik = Request()->struk_listrik;
        $fileNameStrukListrik = date('mdYHis') . ' Struk Listrik ' . $mahasiswa->nama_mahasiswa . '.' . $fileStrukListrik->extension();
        $fileStrukListrik->move(public_path('dokumen_penurunan_ukt/struk_listrik'), $fileNameStrukListrik);

        $fileFotoRumah = Request()->foto_rumah;
        $fileNameFotoRumah = date('mdYHis') . ' Foto Rumah ' . $mahasiswa->nama_mahasiswa . '.' . $fileFotoRumah->extension();
        $fileFotoRumah->move(public_path('dokumen_penurunan_ukt/foto_rumah'), $fileNameFotoRumah);

        $fileSlipGaji = Request()->slip_gaji;
        $fileNameSlipGaji = date('mdYHis') . ' Slip Gaji ' . $mahasiswa->nama_mahasiswa . '.' . $fileSlipGaji->extension();
        $fileSlipGaji->move(public_path('dokumen_penurunan_ukt/slip_gaji'), $fileNameSlipGaji);

        // Tutup Dokumen

        $data = [
            'id_mahasiswa'              => Session()->get('id_mahasiswa'),
            'semester'                  => Request()->semester,
            'surat_pengajuan'           => $fileNameSuratPengajuan,
            'sktm'                      => $fileNameSKTM,
            'khs'                       => $fileNameKHS,
            'struk_listrik'             => $fileNameStrukListrik,
            'foto_rumah'                => $fileNameFotoRumah,
            'slip_gaji'                 => $fileNameSlipGaji,
            'tanggal_pengajuan'         => date('Y-m-d H:i:s'),
            'status_penurunan'          => 'Belum Dikirim',
        ];

        $dataMahasiswa = [
            'id_mahasiswa'      => Session()->get('id_mahasiswa'),
            'status_pengajuan'  => 'Penurunan'
        ];
        $this->ModelMahasiswa->edit($dataMahasiswa);

        // log
        $dataLog = [
            'id_mahasiswa'  => Session()->get('id_mahasiswa'),
            'keterangan'    => 'Melakukan pengajuan penurunan UKT ',
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelPenurunanUKT->tambah($data);
        $dataPenurunanUKT = $this->ModelPenurunanUKT->dataTerakhir();
        return redirect('informasi-pengajuan-penurunan-ukt/' . $dataPenurunanUKT->id_penurunan_ukt)->with('success', 'Anda berhasil menambahkan pengajuan penurunan UKT!');
    }

    public function informasiPenurunanUKT($id_penurunan_ukt)
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Penurunan UKT',
            'subTitle'          => 'Informasi Pengajuan Penurunan UKT',
            'detail'            => $this->ModelPenurunanUKT->detail($id_penurunan_ukt),
            'user'              => $this->ModelMahasiswa->detail(Session()->get('id_mahasiswa')),
        ];

        return view('mahasiswa.penurunanUKT.informasi', $data);
    }

    public function edit($id_penurunan_ukt)
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Penurunan UKT',
            'subTitle'          => 'Edit Pengajuan Penurunan UKT',
            'form'              => 'Edit',
            'dataPenurunanUKT'  => $this->ModelPenurunanUKT->detailByMahasiswa(Session()->get('id_mahasiswa')),
            'detail'            => $this->ModelPenurunanUKT->detail($id_penurunan_ukt),
            'user'              => $this->ModelMahasiswa->detail(Session()->get('id_mahasiswa')),
        ];

        return view('mahasiswa.penurunanUKT.formPengajuan', $data);
    }

    public function prosesEdit($id_penurunan_ukt)
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        Request()->validate([
            'sktm'           => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'khs'            => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'struk_listrik'  => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'foto_rumah'     => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'slip_gaji'      => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'surat_pengajuan' => 'mimes:jpeg,png,jpg,pdf|max:2048',
        ], [
            'sktm.mimes'            => 'Format SKTM harus jpg/jpeg/png/pdf!',
            'sktm.max'              => 'Ukuran SKTM maksimal 2 mb',
            'khs.mimes'             => 'Format KHS harus jpg/jpeg/png/pdf!',
            'khs.max'               => 'Ukuran KHS maksimal 2 mb',
            'struk_listrik.mimes'   => 'Format Struk Listrik harus jpg/jpeg/png/pdf!',
            'struk_listrik.max'     => 'Ukuran Struk Listrik maksimal 2 mb',
            'foto_rumah.mimes'      => 'Format Foto Rumah harus jpg/jpeg/png/pdf!',
            'foto_rumah.max'        => 'Ukuran Foto Rumah maksimal 2 mb',
            'slip_gaji.mimes'       => 'Format Slip Gaji harus jpg/jpeg/png/pdf!',
            'slip_gaji.max'         => 'Ukuran Slip Gaji maksimal 2 mb',
            'surat_pengajuan.mimes' => 'Format Surat Pengajuan harus jpg/jpeg/png/pdf!',
            'surat_pengajuan.max'   => 'Ukuran Surat Pengajuan maksimal 2 mb',
        ]);

        $mahasiswa = $this->ModelMahasiswa->detail(Session()->get('id_mahasiswa'));

        // Dokumen
        $detail = $this->ModelPenurunanUKT->detail($id_penurunan_ukt);

        if ($detail->surat_pengajuan <> "") {
            unlink(public_path('dokumen_penurunan_ukt/surat_pengajuan') . '/' . $detail->surat_pengajuan);
        }
        $fileSuratPengajuan = Request()->surat_pengajuan;
        $fileNameSuratPengajuan = date('mdYHis') . ' Surat Pengajuan ' . $mahasiswa->nama_mahasiswa . '.' . $fileSuratPengajuan->extension();
        $fileSuratPengajuan->move(public_path('dokumen_penurunan_ukt/surat_pengajuan'), $fileNameSuratPengajuan);

        if ($detail->sktm <> "") {
            unlink(public_path('dokumen_penurunan_ukt/sktm') . '/' . $detail->sktm);
        }
        $fileSKTM = Request()->sktm;
        $fileNameSKTM = date('mdYHis') . ' SKTM ' . $mahasiswa->nama_mahasiswa . '.' . $fileSKTM->extension();
        $fileSKTM->move(public_path('dokumen_penurunan_ukt/sktm'), $fileNameSKTM);

        if ($detail->khs <> "") {
            unlink(public_path('dokumen_penurunan_ukt/khs') . '/' . $detail->khs);
        }
        $fileKHS = Request()->khs;
        $fileNameKHS = date('mdYHis') . ' KHS ' . $mahasiswa->nama_mahasiswa . '.' . $fileKHS->extension();
        $fileKHS->move(public_path('dokumen_penurunan_ukt/khs'), $fileNameKHS);

        if ($detail->struk_listrik <> "") {
            unlink(public_path('dokumen_penurunan_ukt/struk_listrik') . '/' . $detail->struk_listrik);
        }
        $fileStrukListrik = Request()->struk_listrik;
        $fileNameStrukListrik = date('mdYHis') . ' Struk Listrik ' . $mahasiswa->nama_mahasiswa . '.' . $fileStrukListrik->extension();
        $fileStrukListrik->move(public_path('dokumen_penurunan_ukt/struk_listrik'), $fileNameStrukListrik);

        if ($detail->foto_rumah <> "") {
            unlink(public_path('dokumen_penurunan_ukt/foto_rumah') . '/' . $detail->foto_rumah);
        }
        $fileFotoRumah = Request()->foto_rumah;
        $fileNameFotoRumah = date('mdYHis') . ' Foto Rumah ' . $mahasiswa->nama_mahasiswa . '.' . $fileFotoRumah->extension();
        $fileFotoRumah->move(public_path('dokumen_penurunan_ukt/foto_rumah'), $fileNameFotoRumah);

        if ($detail->slip_gaji <> "") {
            unlink(public_path('dokumen_penurunan_ukt/slip_gaji') . '/' . $detail->slip_gaji);
        }
        $fileSlipGaji = Request()->slip_gaji;
        $fileNameSlipGaji = date('mdYHis') . ' Slip Gaji ' . $mahasiswa->nama_mahasiswa . '.' . $fileSlipGaji->extension();
        $fileSlipGaji->move(public_path('dokumen_penurunan_ukt/slip_gaji'), $fileNameSlipGaji);

        // Tutup Dokumen

        $data = [
            'id_penurunan_ukt'          => $id_penurunan_ukt,
            'id_mahasiswa'              => Session()->get('id_mahasiswa'),
            'semester'                  => Request()->semester,
            'surat_pengajuan'           => $fileNameSuratPengajuan,
            'sktm'                      => $fileNameSKTM,
            'khs'                       => $fileNameKHS,
            'struk_listrik'             => $fileNameStrukListrik,
            'foto_rumah'                => $fileNameFotoRumah,
            'slip_gaji'                 => $fileNameSlipGaji,
        ];

        $dataMahasiswa = [
            'id_mahasiswa'      => Session()->get('id_mahasiswa'),
            'status_pengajuan'  => 'Penurunan'
        ];
        $this->ModelMahasiswa->edit($dataMahasiswa);

        // log
        $dataLog = [
            'id_mahasiswa'  => Session()->get('id_mahasiswa'),
            'keterangan'    => 'Melakukan edit pengajuan penurunan UKT ',
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelPenurunanUKT->edit($data);
        return redirect('informasi-pengajuan-penurunan-ukt/' . $id_penurunan_ukt)->with('success', 'Anda berhasil edit pengajuan penurunan UKT!');
    }

    public function prosesKirim($id_penurunan_ukt)
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        $data = [
            'id_penurunan_ukt'  => $id_penurunan_ukt,
            'tanggal_pengajuan' => date('Y-m-d H:i:s'),
            'status_penurunan'  => 'Proses',
        ];

        // log
        $dataLog = [
            'id_mahasiswa'  => Session()->get('id_mahasiswa'),
            'keterangan'    => 'Melakukan kirim pengajuan penurunan UKT ',
            'status_user'   => session()->get('status')
        ];
        $this->ModelLog->tambah($dataLog);
        // end log

        $this->ModelPenurunanUKT->edit($data);
        return redirect('informasi-pengajuan-penurunan-ukt/' . $id_penurunan_ukt)->with('success', 'Anda berhasil kirim pengajuan penurunan UKT!');
    }
}
