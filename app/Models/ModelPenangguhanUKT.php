<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelPenangguhanUKT extends Model
{
    use HasFactory;

    public function dataPenangguhanUKT()
    {
        return DB::table('penangguhan_ukt')
            ->join('mahasiswa', 'mahasiswa.id_mahasiswa', '=', 'penangguhan_ukt.id_mahasiswa', 'left')
            ->orderBy('id_penangguhan_ukt', 'ASC')->get();
    }

    public function detail($id_penangguhan_ukt)
    {
        return DB::table('penangguhan_ukt')
            ->join('mahasiswa', 'mahasiswa.id_mahasiswa', '=', 'penangguhan_ukt.id_mahasiswa', 'left')
            ->where('id_penangguhan_ukt', $id_penangguhan_ukt)->first();
    }

    public function dataPenangguhanUKTByMahasiswa($id_mahasiswa)
    {
        return DB::table('penangguhan_ukt')
            ->join('mahasiswa', 'mahasiswa.id_mahasiswa', '=', 'penangguhan_ukt.id_mahasiswa', 'left')
            ->where('penangguhan_ukt.id_mahasiswa', $id_mahasiswa)
            ->orderBy('id_penangguhan_ukt', 'ASC')->get();
    }

    public function tambah($data)
    {
        DB::table('penangguhan_ukt')->insert($data);
    }

    public function edit($data)
    {
        DB::table('penangguhan_ukt')->where('id_penangguhan_ukt', $data['id_penangguhan_ukt'])->update($data);
    }

    public function hapus($id_penangguhan_ukt)
    {
        DB::table('penangguhan_ukt')->where('id_penangguhan_ukt', $id_penangguhan_ukt)->delete();
    }
}
