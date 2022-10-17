<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    
    protected function eksemplar(){
        return $this->belongsTo(EksemplarBuku::class,'id_buku');
    }
    protected function staff(){
        return $this->belongsTo(Staff::class,'id_staff');
    }
    protected function anggota(){
        return $this->belongsTo(Anggota::class,'id_anggota');
    }
    
    protected $fillable = [
        'tgl_peminjaman',
        'tgl_harus_kembali',
        'tgl_kembali',
        'id_anggota',
        'id_buku',
        'id_staff'
    ];
    public $incrementing = false;
    public $timestamps = false;
}
