<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    public function kelurahan(){
        return $this->belongsTo('App\Models\kelurahan', 'kelurahan_id');
    }
}
