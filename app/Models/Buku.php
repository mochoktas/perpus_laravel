<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primaryKey = 'no_isbn';
    
    protected function jenis_buku(){
        return $this->belongsTo(JenisBuku::class);
    }
    protected function penerbit(){
        return $this->belongsTo(Penerbit::class);
    }
    protected function bahasa(){
        return $this->belongsTo(Bahasa::class);
    }
    protected function detail_penerimaan(){
        return $this->hasMany(DetailPenerimaan::class);
    }
    protected function eksemplar(){
        return $this->hasMany(EksemplarBuku::class);
    }
    protected function penerimaan(){
        return $this->belongsToMany(Penerimaan::class);
    }
    protected $fillable = [
        'no_isbn',
        'judul_buku',
        'penulis',
        'tahun_terbit',
        'jumlah',
        'id_jenis_buku',
        'id_bahasa',
        'id_penerbit'
    ];
    public $incrementing = false;
    public $timestamps = false;
}
