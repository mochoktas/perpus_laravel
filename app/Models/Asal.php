<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asal extends Model
{
    // use HasFactory;
    protected $table = 'asal';
    protected $primaryKey = 'id_asal';
    
    protected function penerimaan(){
        return $this->hasMany(Penerimaan::class);
    }
    protected $fillable = [
        'nama_asal'
    ];
    public $timestamps = false;
}
