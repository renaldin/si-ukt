<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelMahasiswa;
use App\Models\ModelPenurunanUKT;

class Dashboard extends Controller
{

    private $ModelMahasiswa;
    private $ModelUser;
    private $ModelPenurunanUKT;

    public function __construct()
    {
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelUser = new ModelUser();
        $this->ModelPenurunanUKT = new ModelPenurunanUKT();
    }

    public function index()
    {

        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $status = Session()->get('status');

        if ($status === 'Bagian Keuangan') {
            $route = 'bagianKeuangan.dashboard';
            $user = $this->ModelUser->detail(Session()->get('id_user'));

            $data = [
                'title'                 => null,
                'user'                  => $user,
                'subTitle'              => 'Dashboard',
            ];
        } elseif ($status === 'Mahasiswa') {
            $route = 'mahasiswa.dashboard';
            $user = $this->ModelMahasiswa->detail(Session()->get('id_mahasiswa'));

            $data = [
                'title'                 => null,
                'user'                  => $user,
                'detailPenurunanUKT'    => $this->ModelPenurunanUKT->detailByMahasiswa(Session()->get('id_mahasiswa')),
                'subTitle'              => 'Dashboard',
            ];
        } elseif ($status === 'Akademik') {
            $route = 'akademik.dashboard';
            $user = $this->ModelUser->detail(Session()->get('id_user'));

            $data = [
                'title'                 => null,
                'user'                  => $user,
                'subTitle'              => 'Dashboard',
            ];
        } elseif ($status === 'Kabag Umum & Akademik') {
            $route = 'kepalaBagian.dashboard';
            $user = $this->ModelUser->detail(Session()->get('id_user'));

            $data = [
                'title'                 => null,
                'user'                  => $user,
                'subTitle'              => 'Dashboard',
            ];
        }

        return view($route, $data);
    }
}
