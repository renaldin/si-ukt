<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelUser;
use App\Models\ModelMahasiswa;

class Dashboard extends Controller
{

    private $ModelMahasiswa;
    private $ModelUser;

    public function __construct()
    {
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelUser = new ModelUser();
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
        } elseif ($status === 'Mahasiswa') {
            $route = 'mahasiswa.dashboard';
            $user = $this->ModelMahasiswa->detail(Session()->get('id_mahasiswa'));
        }

        $data = [
            'title'                 => null,
            'user'                  => $user,
            'subTitle'              => 'Dashboard',
        ];
        return view($route, $data);
    }
}
