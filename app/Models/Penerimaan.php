<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    use HasFactory;
    protected $table = 'penerimaan';
    protected $primaryKey = 'id_penerimaan';
    
    protected function asal(){
        return $this->belongsTo(Asal::class);
    }
    protected function staff(){
        return $this->belongsTo(Staff::class);
    }
    protected function detail_penerimaan(){
        return $this->hasMany(DetailPenerimaan::class);
    }
    protected function Buku(){
        return $this->belongsToMany(Buku::class);
    }
    protected $fillable = [
        'tgl_penerimaan',
        'jumlah',
        'id_asal',
        'id_staff'
    ];
    public $incrementing = false;
    public $timestamps = false;
}
