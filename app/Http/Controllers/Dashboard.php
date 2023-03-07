<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Models\ModelAdmin;
use App\Models\ModelUser;

class Dashboard extends Controller
{

    private $ModelAdmin;
    private $ModelUser;

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {

        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'                 => null,
            'user'                  => $this->ModelUser->detail(Session()->get('id_user')),
            'subTitle'              => 'Dashboard',
        ];
        return view('user.dashboard', $data);
    }

    public function admin()
    {

        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'                 => null,
            'user'                  => $this->ModelAdmin->detail(Session()->get('id_admin')),
            'subTitle'              => 'Dashboard',
        ];
        return view('admin.dashboard', $data);
    }
}
