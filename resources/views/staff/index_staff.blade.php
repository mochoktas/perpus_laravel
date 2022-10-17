@extends('layout.main')

@section('title_page','Staff')
@section('title','Staff')
@section('content')

              <h4><i class="fa fa-angle-right"></i> Basic Table</h4>
              <br>
              <a href="/staff">Tambah Staff</a>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Kelurahan</th>
                  </tr>
                </thead>
                <tbody>
                @forelse($staff as $data)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->nama_staff}}</td>
                    <td>{{$data->alamat_staff}}</td>
                    <td>{{$data->no_telp}}</td>
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