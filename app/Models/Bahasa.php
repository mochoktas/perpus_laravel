<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahasa extends Model
{
    // use HasFactory;
    protected $table = 'bahasa';
    protected $primaryKey = 'id_bahasa';
    
    protected function buku(){
        return $this->hasMany(Buku::class);
    }
    protected $fillable = [
        'nama_bahasa'
    ];
    public $timestamps = false;
}
