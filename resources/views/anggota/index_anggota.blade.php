@extends('layout.main')

@section('title_page','Anggota')
@section('title','Anggota')
@section('content')

              <h4><i class="fa fa-angle-right"></i> Basic Table</h4>
              <br>
              <a href="/tambahAnggota">Tambah Anggota</a>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kelurahan</th>
                  </tr>
                </thead>
                <tbody>
                @forelse($anggota as $data)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->nama_anggota}}</td>
                    <td>{{$data->alamat_anggota}}</td>
                    <td>{{$data->kelurahan->subdis_name}}</td>
                  </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Barang belum Tersedia.
                    </div>
                @endforelse  
                </tbody>
              </table>
@endsection