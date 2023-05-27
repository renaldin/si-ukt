<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelSetting extends Model
{
    use HasFactory;

    public function dataSetting()
    {
        return DB::table('setting')->where('id_setting', 1)->first();
    }
}
