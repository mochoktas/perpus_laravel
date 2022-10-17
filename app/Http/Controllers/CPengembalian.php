<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\EksemplarBuku;
use App\Models\Peminjaman;

class CPengembalian extends Controller
{
    //
    function index(){
        $anggota = Anggota::all();
        return view('pengembalian.index_pengembalian',compact('anggota'));
    }
    function det_pengembalian($id){
        $pjm = Peminjaman::where('id_anggota',$id)->where('tgl_kembali',null)->first();
        return view('pengembalian.detail_pengembalian',compact('pjm'));
    }
    public function inserts(Request $request){
        
        $todayDate = date("Y-m-d");
        
        $anggota = Anggota::find($request->id_anggota);
        $anggota->status_peminjaman = '1';
        $anggota->save();
        $eksemplar = EksemplarBuku::find($request->id_buku);
        $eksemplar->status_eks_buku = '1';
        $eksemplar->save();
        $peminjaman = Peminjaman::find($request->id_peminjaman);
        $peminjaman->tgl_kembali = $todayDate;
        $peminjaman->save();
        return redirect('/pengembalian');
    }
}
