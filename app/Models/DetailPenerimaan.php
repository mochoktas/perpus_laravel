<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenerimaan extends Model
{
    use HasFactory;
    protected $table = 'detail_penerimaan';
    
    protected function penerimaan(){
        return $this->belongsTo(Penerimaan::class);
    }
    
    protected function Buku(){
        return $this->belongsTo(Buku::class);
    }
    protected $fillable = [
        'id_penerimaan',
        'no_isbn',
        'jumlah_eksemplar_buku'
    ];
    public $incrementing = false;
    public $timestamps = false;
}
