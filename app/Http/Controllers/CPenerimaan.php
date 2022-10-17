<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asal;
use App\Models\Penerimaan;
use App\Models\DetailPenerimaan;
use App\Models\Buku;
use App\Models\EksemplarBuku;
use App\Models\Staff;
use App\Models\Penerbit;
use App\Models\JenisBuku;
use App\Models\Bahasa;
use Auth;
class CPenerimaan extends Controller
{
    //
    function index(){
        $asal = Asal::all();
        return view('penerimaan.index_penerimaan',compact('asal'));
    }
    function tambah_penerimaan($id){
        $buku = Buku::all();
        $penerbit = Penerbit::all();
        $jenis = JenisBuku::all();
        $bhs = Bahasa::all();
        $todayDate = date("Y-m-d");
        $staff= Staff::where('username',Auth::user()->username)->first();
        $resultstaff = $staff->id_staff;
        $result = Penerimaan::where('id_asal',$id)->where('tgl_penerimaan',$todayDate)->first();
        if(Empty($result)){
            $penerimaan = Penerimaan::create([
                'tgl_penerimaan'=>$todayDate,
                'id_asal'=>$id,
                'jumlah'=>0,
                'id_staff' => $resultstaff ,
            ]);
            $result = Penerimaan::where('id_asal',$id)->where('tgl_penerimaan',$todayDate)->first();
            return view('penerimaan.tambah_penerimaan',compact('buku','result','penerbit','jenis','bhs'));
            // return redirect('/penerimaan');
        }else{
            return view('penerimaan.tambah_penerimaan',compact('buku','result','penerbit','jenis','bhs'));
            // return redirect('/');
        }
        
        
    }
    public function insertsAsal(Request $request){
        
        $asal = Asal::create([
            'nama_asal' => $request->nama_asal
        ]);
        // return redirect('/penerimaan');
        return back();
    }
    public function inserts(Request $request){
        $lop = $request->jumlah;
        $detpen = DetailPenerimaan::create([
            'id_penerimaan'=>$request->id_penerimaan,
            'no_isbn'=>$request->buku,
            'jumlah_eksemplar_buku'=>$request->jumlah
        ]);
        for($i=0;$i<$lop;$i++){
            $eks = EksemplarBuku::create([
                'status_eks_buku'=>1,
                'kondisi_eks_buku'=>1,
                'no_isbn'=>$request->buku
            ]);
        }
        $btn = $request->btn1;
        if($btn==1){
            return back();
        }else{
            return redirect('penerimaan');
        }
        
    }
    public function insertsBuku(Request $request){
        
        $buku = Buku::create([
            'no_isbn' => $request->isbn,
            'judul_buku' => $request->judul,
            'penulis' => $request->penulis,
            'tahun_terbit' => $request->tahun,
            'id_jenis_buku' => $request->jenis,
            'id_penerbit' => $request->penerbit,
            'id_bahasa' => $request->bahasa,
        ]);
        // return redirect('/penerimaan');
        return back();
    }
}
