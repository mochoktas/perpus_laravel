<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EksemplarBuku extends Model
{
    use HasFactory;
    protected $table = 'eksemplar_buku';
    protected $primaryKey = 'id_buku';
    protected function buku(){
        return $this->belongsTo(Buku::class,'no_isbn');
    }
    protected function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }
    protected $fillable = [
        'status_eks_buku',
        'kondisi_eks_buku',
        'no_isbn'
    ];
    public $timestamps = false;
}
