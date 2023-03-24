<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelMahasiswa extends Model
{
    use HasFactory;

    public function dataMahasiswa()
    {
        return DB::table('mahasiswa')->orderBy('id_mahasiswa', 'DESC')->get();
    }

    public function detail($id_mahasiswa)
    {
        return DB::table('mahasiswa')->where('id_mahasiswa', $id_mahasiswa)->first();
    }

    public function tambah($data)
    {
        DB::table('mahasiswa')->insert($data);
    }

    public function edit($data)
    {
        DB::table('mahasiswa')->where('id_mahasiswa', $data['id_mahasiswa'])->update($data);
    }

    public function hapus($id_mahasiswa)
    {
        DB::table('mahasiswa')->where('id_mahasiswa', $id_mahasiswa)->delete();
    }

    public function jumlahMahasiswa()
    {
        return DB::table('mahasiswa')->count();
    }
}
