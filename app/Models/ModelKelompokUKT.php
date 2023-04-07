<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelKelompokUKT extends Model
{
    use HasFactory;

    public function dataKelompokUKT()
    {
        return DB::table('kelompok_ukt')->orderBy('id_kelompok_ukt', 'ASC')->get();
    }

    public function detail($id_kelompok_ukt)
    {
        return DB::table('kelompok_ukt')->where('id_kelompok_ukt', $id_kelompok_ukt)->first();
    }

    public function tambah($data)
    {
        DB::table('kelompok_ukt')->insert($data);
    }

    public function edit($data)
    {
        DB::table('kelompok_ukt')->where('id_kelompok_ukt', $data['id_kelompok_ukt'])->update($data);
    }

    public function hapus($id_kelompok_ukt)
    {
        DB::table('kelompok_ukt')->where('id_kelompok_ukt', $id_kelompok_ukt)->delete();
    }
}
