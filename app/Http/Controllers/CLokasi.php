<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class CLokasi extends Controller
{
    //
    public function getKota(Request $request){
        $kota = Kota::where("prov_id",$request->provID)->pluck('city_id','city_name');
        return response()->json($kota);
    }
    public function getKecamatan(Request $request){
        $kecamatan = Kecamatan::where("city_id",$request->kotaID)->pluck('dis_id','dis_name');
        return response()->json($kecamatan);
    }
    public function getKelurahan(Request $request){
        $kelurahan = Kelurahan::where("dis_id",$request->kecID)->pluck('subdis_id','subdis_name');
        return response()->json($kelurahan);
    }
}
