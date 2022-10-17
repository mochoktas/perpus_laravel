<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
class CStaff extends Controller
{
    
    public function index(){
        $staff = Staff::all();
        return view('staff.index_staff',compact('staff'));
    }
    public function tambah(){
        $provinsis = Provinsi::all();
        return view('staff.staff',compact('provinsis'));
    }
    // public function getKota(Request $request){
    //     $kota = Kota::where("prov_id",$request->provID)->pluck('city_id','city_name');
    //     return response()->json($kota);
    // }
    // public function getKecamatan(Request $request){
    //     $kecamatan = Kecamatan::where("city_id",$request->kotaID)->pluck('dis_id','dis_name');
    //     return response()->json($kecamatan);
    // }
    // public function getKelurahan(Request $request){
    //     $kelurahan = Kelurahan::where("dis_id",$request->kecID)->pluck('subdis_id','subdis_name');
    //     return response()->json($kelurahan);
    // }
    public function inserts(Request $request){
        $validatedData = $request->validate([
            'username' => 'required|unique:users|string|max:25'
        ]);
        Staff::create([ 
            
            'nama_staff' => $request->nama, 
            'alamat_staff' => $request->alamat,
            'jenis_kelamin_staff' => $request->optionsRadios, 
            'no_telp' => $request->no_telp,
            'username' => $request->username,
            'password' => Hash::make($request->pass),
            'status_staff' => 1,
            'subdis_id' => $request->kelurahan 
        ]); 
        User::create([
            'name' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 1
        ]);
        return redirect('/indexStaff');
    }
}
