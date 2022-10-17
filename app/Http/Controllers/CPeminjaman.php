<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Staff;
use App\Models\Buku;
use App\Models\EksemplarBuku;
use App\Models\Peminjaman;
use Auth;
class CPeminjaman extends Controller
{
    //
    function index(){
        $anggota = Anggota::all();
        return view('peminjaman.index_peminjaman',compact('anggota'));
    }
    public function tambah_peminjaman($id){
        
        $data = Anggota::where('id_anggota', $id)->first(); 
        $buku   = Buku::all();
        return view('peminjaman.peminjaman',compact('data','buku') ); 
    }
    // public function getEksemplar(Request $request){
    //     $eksemplar = EksemplarBuku::where("no_isbn",$request->isbn)->pluck('id_buku');
    //     return response()->json($eksemplar);
    // }
    public function inserts(Request $request){
        $validatedData = $request->validate([
            'id_buku' => 'required|exists:eksemplar_buku|integer|max:11'
        ]);
        $todayDate = date("Y-m-d");
        $besokDate = date("Y-m-d",strtotime( "$todayDate +1 day" ));
        $staff= Staff::where('username',Auth::user()->username)->first();
        Peminjaman::create([ 
            'tgl_peminjaman' => $todayDate,
            'tgl_harus_kembali' => $besokDate, 
            'tgl_kembali' => null,
            'id_anggota' => $request->id_anggota,
            'id_staff' => $staff->id_staff,
            'id_buku' => $request->id_buku 
        ]);
        $anggota = Anggota::find($request->id_anggota);
        $anggota->status_peminjaman = '0';
        $anggota->save();
        $eksemplar = EksemplarBuku::find($request->id_buku);
        $eksemplar->status_eks_buku = '0';
        $eksemplar->save();
        return redirect('/peminjaman');
    }
    function index_anggota(){
        $anggota= Anggota::where('username',Auth::user()->username)->first();
        $pmjn = Peminjaman::where('id_anggota',$anggota->id_anggota)->where('tgl_kembali',null)->first();
        return view('peminjaman.index_anggota_peminjaman',compact('pmjn'));
    }
}
