<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    public function pasien(){
        return $this->hasMany('App\Models\Pasien', 'kelurahan_id');
    }
}
