<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelMahasiswa;
use App\Models\ModelUser;
use App\Models\ModelLog;
use App\Models\ModelPenentuanUKT;
use App\Models\ModelSetting;
use App\Models\ModelKriteria;
use App\Models\ModelNilaiKriteria;

class PenentuanUKT extends Controller
{

    private $ModelMahasiswa;
    private $ModelUser;
    private $ModelLog;
    private $ModelPenentuanUKT;
    private $ModelSetting;
    private $ModelKriteria;
    private $ModelNilaiKriteria;

    public function __construct()
    {
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelUser = new ModelUser();
        $this->ModelLog = new ModelLog();
        $this->ModelPenentuanUKT = new ModelPenentuanUKT();
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
        for ($i = $jumlahKriteria; $i > 0; $i--) {
            // id_kriteria
            $id_kriteria[$i] = Request()->{"id_kriteria" . $i};
            // bobot
            $bobot[$i] = Request()->{"bobot" . $i};
            // bobot
            $ideal[$i] = Request()->{"ideal" . $i};

            // Nilai Target
            $nilai_target[$i] = Request()->{"nilai_target" . $i};

            // Nilai Kriteria
            $nilai_kriteria[$i]   = $this->ModelNilaiKriteria->dataNilaiKriteriaBykriteria($id_kriteria[$i]);

            // hasil gap
            $gap = [];
            foreach ($nilai_kriteria[$i] as $item[$i]) {
                $gap[] = intval($item[$i]->ukt) - intval($nilai_target[$i]);
            }
            $hasil_gap[$i] = $gap;

            // nilai bobot dari hasil gap
            $bobot_hasil_gap = [];
            foreach ($hasil_gap[$i] as $row) {
                switch ($row) {
                    case 0:
                        $nilai_hasil = 8;
                        break;
                    case 1:
                        $nilai_hasil = 7.5;
                        break;
                    case -1:
                        $nilai_hasil = 7;
                        break;
                    case 2:
                        $nilai_hasil = 6.5;
                        break;
                    case -2:
                        $nilai_hasil = 6;
                        break;
                    case 3:
                        $nilai_hasil = 5.5;
                        break;
                    case -3:
                        $nilai_hasil = 5;
                        break;
                    case 4:
                        $nilai_hasil = 4.5;
                        break;
                    case -4:
                        $nilai_hasil = 4;
                        break;
                    case 5:
                        $nilai_hasil = 3.5;
                        break;
                    case -5:
                        $nilai_hasil = 3;
                        break;
                    case 6:
                        $nilai_hasil = 2.5;
                        break;
                    case -6:
                        $nilai_hasil = 2;
                        break;
                    case 7:
                        $nilai_hasil = 1.5;
                        break;
                    case -7:
                        $nilai_hasil = 1;
                        break;
                }

                $bobot_hasil_gap[] = $nilai_hasil;
            }
            $nilai_bobot_hasil_gap[$i] = $bobot_hasil_gap;

            // pembagi
            $pem = null;
            foreach ($nilai_bobot_hasil_gap[$i] as $row) {
                $pem = $pem + pow($row, 2);
            }
            $pembagi[$i] = sqrt($pem);

            // normalisasi keputusan
            $normalisasi = [];
            foreach ($nilai_bobot_hasil_gap[$i] as $row) {
                $normalisasi[] = $row / $pembagi[$i];
            }
            $normalisasi_keputusan[$i] = $normalisasi;

            // normalisasi bobot
            $bobot_normal = [];
            foreach ($normalisasi_keputusan[$i] as $row) {
                $bobot_normal[] = $row * $bobot[$i];
            }
            $normalisasi_bobot[$i] = $bobot_normal;

            // ideal positif negatif
            // $positif = max($normalisasi_bobot[$i]);
            $positif = [];
            $negatif = [];
            if ($ideal[$i] == 'Benefit') {
                $positif[] = max($normalisasi_bobot[$i]);
                $negatif[] = min($normalisasi_bobot[$i]);
            } else {
                $positif[] = min($normalisasi_bobot[$i]);
                $negatif[] = max($normalisasi_bobot[$i]);
            }
            $ideal_positif[$i] = $positif;
            $ideal_negatif[$i] = $negatif;
        }

        $jumlahNormalBobot = count($normalisasi_bobot[1]);

        // keputusan pemisahan = ideal positif = D+
        for ($i = 0; $i < $jumlahNormalBobot; $i++) {
            $d = 0;
            for ($j = $jumlahKriteria; $j > 0; $j--) {
                $d = $d + pow($ideal_positif[$j][0] - $normalisasi_bobot[$j][$i], 2);
            }
            $hasil_ideal_positif[] = sqrt($d);
        }

        // keputusan pemisahan = ideal positif = D+
        for ($i = 0; $i < $jumlahNormalBobot; $i++) {
            $d = 0;
            for ($j = $jumlahKriteria; $j > 0; $j--) {
                $d = $d + pow($ideal_negatif[$j][0] - $normalisasi_bobot[$j][$i], 2);
            }
            $hasil_ideal_negatif[] = sqrt($d);
        }

        // PREFERENSI
        $preferensi = [];
        for ($i = 0; $i < $jumlahNormalBobot; $i++) {
            $preferensi[] = $hasil_ideal_negatif[$i] / ($hasil_ideal_negatif[$i] + $hasil_ideal_positif[$i]);
        }
        $hasil_preferensi[] = $preferensi;

        $rank[] = $hasil_preferensi[0];

        $n = count($rank[0]);

        // RANKING
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($rank[0][$j] > $rank[0][$j + 1]) {
                    // Swap elements
                    $temp = $rank[0][$j];
                    $rank[0][$j] = $rank[0][$j + 1];
                    $rank[0][$j + 1] = $temp;
                }
            }
        }

        $ranking_ukt = null;
        for ($i = $jumlahNormalBobot - 1; $i > -1; $i--) {
            for ($j = 0; $j < $jumlahNormalBobot; $j++) {
                if ($hasil_preferensi[0][$j] == $rank[0][$i]) {
                    $ranking_ukt = $j;
                    break;
                }
            }
            $ranking[] = $ranking_ukt;
        }


        for ($i = 0; $i < $jumlahNormalBobot; $i++) {
            $ranking_final[$ranking[$i]] = $i;
        }

        for ($i = 0; $i < $jumlahNormalBobot; $i++) {
            $hasil[$i + 1]['Alternatif'] = $i + 1;
            $hasil[$i + 1]['Preferensi'] = $hasil_preferensi[0][$i];
            $hasil[$i + 1]['Ranking'] = $ranking_final[$i] + 1;
        }
    }

    public function kelolaPenentuanUKT()
    {
        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        $data = [
            'title'             => 'Penentuan UKT',
            'subTitle'          => 'Kelola Penentuan UKT',
            'user'              => $this->ModelUser->detail(Session()->get('id_user')),
            'setting'           => $this->ModelSetting->dataSetting(),
            'dataPenentuanUKT' => $this->ModelPenentuanUKT->dataPenentuanUKT(),
        ];

        return view('bagianKeuangan.penentuanUKT.kelola', $data);
    }
}
