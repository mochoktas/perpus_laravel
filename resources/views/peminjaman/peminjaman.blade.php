@extends('layout.main')

@section('title_page','Peminjaman')
@section('title','Peminjaman')
@section('content')
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Tambah Peminjaman</h4>
              <form class="form-horizontal style-form" method="POST" action="/peminjaman/insertData">
              @csrf
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">ID Anggota</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_anggota" value="{{ $data->id_anggota }}" readonly>
                  </div>
                  <br><br><br>
                  <label class="col-sm-2 col-sm-2 control-label">ID Buku</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="id_buku" placeholder="@error('id_buku'){{$message}}@enderror">
                  </div>
                  
                
                
                </div>
                <button type="submit" class="btn btn-theme" >Simpan Data</button>
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
@endsection
@section('js_custom')

@endsection