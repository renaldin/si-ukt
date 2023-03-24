<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelStaff extends Model
{
    use HasFactory;

    public function dataStaff()
    {
        return DB::table('staff')->orderBy('id_staff', 'DESC')->get();
    }

    public function detail($id_staff)
    {
        return DB::table('staff')->where('id_staff', $id_staff)->first();
    }

    public function tambah($data)
    {
        DB::table('staff')->insert($data);
    }

    public function edit($data)
    {
        DB::table('staff')->where('id_staff', $data['id_staff'])->update($data);
    }

    public function hapus($id_staff)
    {
        DB::table('staff')->where('id_staff', $id_staff)->delete();
    }

    public function jumlahStaff()
    {
        return DB::table('staff')->count();
    }
}
