<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ModelAdmin;
use App\Models\ModelMahasiswa;
use App\Models\ModelStaff;

class Dashboard extends Controller
{

    private $ModelAdmin;
    private $ModelMahasiswa;
    private $ModelStaff;

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelStaff = new ModelStaff();
    }

    public function index()
    {

        if (!Session()->get('status')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                 => null,
            'user'                  => $this->ModelMahasiswa->detail(Session()->get('id_mahasiswa')),
            'subTitle'              => 'Dashboard',
        ];
        return view('mahasiswa.dashboard', $data);
    }

    public function admin()
    {

        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'                 => null,
            'user'                  => $this->ModelAdmin->detail(Session()->get('id_admin')),
            'subTitle'              => 'Dashboard',
        ];
        return view('admin.dashboard', $data);
    }

    public function staff()
    {

        if (!Session()->get('status')) {
            return redirect()->route('staff');
        }

        $data = [
            'title'                 => null,
            'user'                  => $this->ModelStaff->detail(Session()->get('id_staff')),
            'subTitle'              => 'Dashboard',
        ];
        return view('staff.dashboard', $data);
    }
}
