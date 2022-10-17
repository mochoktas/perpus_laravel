<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staff';
    protected $primaryKey = 'id_staff';
    
    protected function kelurahan(){
        return $this->belongsTo(Kelurahan::class,'subdis_id','subdis_id');
    }
    protected function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }
    protected function penerimaan(){
        return $this->hasMany(Penerimaan::class);
    }
    public $incrementing = false;
    // protected $keyType = 'string';

    protected $fillable = [
        'nama_staff',
        'alamat_staff',
        'jenis_kelamin_staff',
        'no_telp',
        'status_staff',
        'username',
        'password',
        'subdis_id'
    ];
    public $timestamps = false; 
}
