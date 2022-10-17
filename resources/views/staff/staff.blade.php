@extends('layout.main')

@section('title_page','Staff')
@section('title','Staff')
@section('content')
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Tambah Staff</h4>
              <form class="form-horizontal style-form" method="POST" action="/staff/insertData">
              @csrf
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" placeholder="@error('username'){{$message}}@enderror">
                  </div>
                  
                  <br><br><br>
                  <label class="col-sm-2 col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password">
                  </div>
                  <br><br><br>
                  <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama">
                  </div>
                  <br><br><br>
                  <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat">
                  </div>
                  <br><br><br>
                  <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="0">
                          Perempuan
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="1">
                          Laki-Laki
                      </label>
                    </div>
                  </div>
                  <br><br><br>
                  <label class="col-sm-2 col-sm-2 control-label">Nomor Telepon</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_telp">
                  </div>
                  <br><br><br>
                  <label class="col-sm-2 col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="provinsi" name="provinsi">
                        <option selected>---Pilih Provinsi---</option>
                        @foreach ($provinsis as $data)
                            <option value="{{$data->prov_id}}">{{$data->prov_name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <br><br><br>
                  <label class="col-sm-2 col-sm-2 control-label">Kota</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="kota" name="kota">
                        <option selected>---Pilih Kota---</option>
                    </select>
                  </div>
                  <br><br><br>
                  <label class="col-sm-2 col-sm-2 control-label">Kecamatan</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="kecamatan" name="kecamatan">
                        <option selected>---Pilih Kecamatan---</option>
                    </select>
                  </div>
                  <br><br><br>
                  <label class="col-sm-2 col-sm-2 control-label">Kelurahan</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="kelurahan" name="kelurahan">
                        <option selected>---Pilih Kelurahan---</option>
                    </select>
                  </div>
                </div>
                
                <button type="submit" class="btn btn-theme" >Simpan Data</button>
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <!-- /row -->
@endsection
@section('js_custom')
<!-- <script src= "{{ asset('assets/jquery/jquery.js') }}" ></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script> -->
<!-- <script src= "{{ asset('assets/jquery/wilayah.js') }}"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
<script>
$('#provinsi').change(function(){
    var provID = $(this).val();    
    if(provID){
        $.ajax({
           type:"GET",
           url:"/getKota?provID="+provID,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#kota").empty();
                $("#kecamatan").empty();
                $("#kelurahan").empty();
                $("#kota").append('<option>---Pilih Kota---</option>');
                $("#kecamatan").append('<option>---Pilih Kecamatan---</option>');
                $("#kelurahan").append('<option>---Pilih Kelurahan---</option>');
                $.each(res,function(nama,kode){
                    $("#kota").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kota").empty();
               $("#kecamatan").empty();
               $("#kelurahan").empty();
            }
           }
        });
    }else{
        $("#kota").empty();
        $("#kecamatan").empty();
        $("#kelurahan").empty();
    }      
});

$('#kota').change(function(){
    var kotaID = $(this).val();    
    if(kotaID){
        $.ajax({
           type:"GET",
           url:"/getKec?kotaID="+kotaID,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#kecamatan").empty();
                $("#kelurahan").empty();
                $("#kecamatan").append('<option>---Pilih Kecamatan---</option>');
                $("#kelurahan").append('<option>---Pilih Kelurahan---</option>');
                $.each(res,function(nama,kode){
                    $("#kecamatan").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kecamatan").empty();
               $("#kelurahan").empty();
            }
           }
        });
    }else{
        $("#kecamatan").empty();
        $("#kelurahan").empty();
    }      
});
 
$('#kecamatan').change(function(){
    var kecID = $(this).val();    
    if(kecID){
        $.ajax({
           type:"GET",
           url:"getKel?kecID="+kecID,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#kelurahan").empty();
                $("#kelurahan").append('<option>---Pilih Kelurahan---</option>');
                $.each(res,function(nama,kode){
                    $("#kelurahan").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kelurahan").empty();
            }
           }
        });
    }else{
        $("#kelurahan").empty();
    }      
});
</script>
@endsection