@extends('layout.main')

@section('title_page','Pengembalian')
@section('title','Pengembalian')
@section('content')
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Pengembalian Buku</h4>
              <form class="form-horizontal style-form" method="POST" action="/pengembalian/insertData">
              @csrf
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">ID Peminjaman</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_peminjaman" value="{{ $pjm->id_peminjaman }}" readonly>
                  </div>
                  <br><br><br>
                  <label class="col-sm-2 col-sm-2 control-label">ID Anggota</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_anggota" value="{{ $pjm->id_anggota }}" readonly>
                  </div>
                  <br><br><br>
                  <label class="col-sm-2 col-sm-2 control-label">Nama Anggota</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_anggota" value="{{ $pjm->anggota->nama_anggota }}" readonly>
                  </div>
                  <br><br><br>
                  <label class="col-sm-2 col-sm-2 control-label">ID Buku</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_buku" value="{{ $pjm->id_buku }}" readonly>
                  </div>
                  <br><br><br>
                  <label class="col-sm-2 col-sm-2 control-label">Judul Buku</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="judul_buku" value="{{ $pjm->eksemplar->buku->judul_buku }}" readonly>
                  </div>
                
                </div>
                <button type="submit" class="btn btn-theme" >Kembalikan Buku</button>
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
@endsection