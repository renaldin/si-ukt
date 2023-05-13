<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelAdmin;
use App\Models\ModelLog;

class Log extends Controller
{

    private $ModelAdmin;
    private $ModelLog;

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelLog = new ModelLog();
    }

    public function index()
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'             => 'Data Log',
            'subTitle'          => 'Daftar Log',
            'daftarLog'         => $this->ModelLog->dataLog(),
            'user'              => $this->ModelAdmin->detail(Session()->get('id_admin')),
        ];
        // dd($data);

        return view('admin.log.dataLog', $data);
    }
}
