<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = 'ec_subdistricts';
    protected $primaryKey = 'subdis_id';
    protected function staff(){
        return $this->hasMany(Staff::class);
    }
    protected function anggota(){
        return $this->hasMany(Anggota::class);
    }
    protected function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
}
