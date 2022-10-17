@extends('layout.main')

@section('title_page','Penerimaan')
@section('title','Penerimaan')
@section('content')
            <a data-toggle="modal" data-target="#myModal"'>
              <button> Tambah Data Buku </button> 
            </a>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Penerimaan Buku</h4>
              <form class="form-horizontal style-form" method="POST" action="/penerimaan/insertData">
              @csrf
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">ID Penerimaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_penerimaan" value="{{ $result->id_penerimaan }}" readonly>
                  </div>
                  <br><br><br>
                  <label class="col-sm-2 col-sm-2 control-label">Buku</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="buku" name="buku">
                        <option selected>---Pilih Buku---</option>
                        @foreach ($buku as $data)
                            <option value="{{$data->no_isbn}}">{{$data->judul_buku}}</option>
                        @endforeach
                    </select>
                  </div>
                  <br><br><br>
                  <label class="col-sm-2 col-sm-2 control-label">Jumlah Buku</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="jumlah">
                  </div>
                
                </div>
                <button type="submit" class="btn btn-theme" name="btn1" value="1">Simpan dan Tambah Data Lagi</button>
                <button type="submit" class="btn btn-theme" name="btn1" value="0">Simpan dan Keluar</button>
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data Buku</h4>
              </div>
              <div class="modal-body">
                <form action="/penerimaan/insertBuku" method="post">
                  @csrf
                <label>Nomor ISBN</label>
                <input type="text" name="isbn" autocomplete="off" class="form-control placeholder-no-fix">
                <br>
                <label>Judul Buku</label>
                <input type="text" name="judul" autocomplete="off" class="form-control placeholder-no-fix">
                <br>
                <label>Penulis</label>
                <input type="text" name="penulis" autocomplete="off" class="form-control placeholder-no-fix">
                <br>
                <label>Tahun Terbit</label>
                <input type="number" name="tahun" autocomplete="off" class="form-control placeholder-no-fix">
                <br>
                <label>Jenis Buku</label>
                <select class="form-control" id="jenis" name="jenis">
                    <option selected>---Pilih Jenis Buku---</option>
                        @foreach ($jenis as $jns)
                            <option value="{{$jns->id_jenis_buku}}">{{$jns->nama_jenis_buku}}</option>
                        @endforeach
                </select>
                <br>
                <label>Penerbit</label>
                <select class="form-control" id="penerbit" name="penerbit">
                    <option selected>---Pilih Penerbit---</option>
                        @foreach ($penerbit as $pn)
                            <option value="{{$pn->id_penerbit}}">{{$pn->nama_penerbit}}</option>
                        @endforeach
                </select>
                <br>
                <label>Bahasa</label>
                <select class="form-control" id="bahasa" name="bahasa">
                    <option selected>---Pilih Bahasa---</option>
                        @foreach ($bhs as $bhs)
                            <option value="{{$bhs->id_bahasa}}">{{$bhs->nama_bahasa}}</option>
                        @endforeach
                </select>
                 
              </div>
              <div class="modal-footer">
                
                <button class="btn btn-theme" type="submit">Submit</button>
                </form>
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
              </div>
            </div>
          </div>
        </div>
@endsection