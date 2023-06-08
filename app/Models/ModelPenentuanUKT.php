<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelPenentuanUKT extends Model
{
    use HasFactory;

    public function dataPenentuanUKT()
    {
        return DB::table('penentuan_ukt')
            ->join('mahasiswa', 'mahasiswa.id_mahasiswa', '=', 'penentuan_ukt.id_mahasiswa', 'left')
            ->join('kelompok_ukt', 'kelompok_ukt.id_kelompok_ukt', '=', 'mahasiswa.id_kelompok_ukt', 'left')
            ->orderBy('id_penentuan_ukt', 'ASC')->get();
    }
}
