<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Provinsi;
use App\Models\User;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
class CAnggota extends Controller
{
    //
    public function index(){
        $anggota = Anggota::all();
        return view('anggota.index_anggota',compact('anggota'));
    }
    public function tambah(){
        $provinsis = Provinsi::all();
        return view('anggota.tambah_anggota',compact('provinsis'));
    }
    public function inserts(Request $request){
        $validatedData = $request->validate([
            'username' => 'required|unique:users|string|max:25'
        ]);
        Anggota::create([ 
            
            'nama_anggota' => $request->nama, 
            'alamat_anggota' => $request->alamat,
            'jenis_kelamin_anggota' => $request->optionsRadios,
            'username' => $request->username,
            'password' => Hash::make($request->pass),
            'status_anggota' => 1,
            'status_peminjaman' => 1,
            'subdis_id' => $request->kelurahan 
        ]); 
        User::create([
            'name' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 0
        ]);
        return redirect('/anggota');
    }
}
