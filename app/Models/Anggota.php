<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    // use HasFactory;
    protected $table = 'anggota';
    protected $primaryKey = 'id_anggota';
    
    protected function kelurahan(){
        return $this->belongsTo(Kelurahan::class,'subdis_id');
    }
    protected function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }
    public $incrementing = false;
    // protected $keyType = 'string';

    protected $fillable = [
        'nama_anggota',
        'alamat_anggota',
        'jenis_kelamin_anggota',
        'status_anggota',
        'status_peminjaman',
        'username',
        'password',
        'subdis_id'
    ];
    public $timestamps = false;
}
