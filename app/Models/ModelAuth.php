<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelAuth extends Model
{
    use HasFactory;

    public function cekNimMahasiswa($nim)
    {
        return DB::table('mahasiswa')->where('nim', $nim)->first();
    }

    public function cekEmailAdmin($email)
    {
        return DB::table('admin')->where('email', $email)->first();
    }

    public function cekNikStaff($nik)
    {
        return DB::table('staff')->where('nik', $nik)->first();
    }
}
