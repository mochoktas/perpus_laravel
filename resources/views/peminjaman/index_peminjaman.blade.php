@extends('layout.main')

@section('title_page','Peminjaman')
@section('title','Peminjaman')
@section('content')
            <div class="content-panel">
              <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Status Anggota</th>
                    <th>Status Peminjaman</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @forelse($anggota as $data)
                  <tr class="
                    @if ($data->status_peminjaman==0)
                      gradeX
                    @else
                      gradeA
                    @endif
                  ">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->nama_anggota}}</td>
                    <td>{{$data->alamat_anggota}}</td>
                    <td>
                      @if ($data->status_anggota==0)
                        tidak aktif
                      @else
                        aktif
                      @endif
                    </td>
                    <td>
                      @if ($data->status_peminjaman==0)
                        masih meminjam
                      @else
                        tidak meminjam
                      @endif
                    </td>
                    <td>
                      @if ($data->status_peminjaman==0)
                        <a href='/peminjaman/tambahPeminjaman/{{$data->id_anggota}}'>
                          <button disabled> pinjam buku </button> 
                        </a>
                      @else
                        <a href='/peminjaman/tambahPeminjaman/{{$data->id_anggota}}'>
                          <button> pinjam buku </button> 
                        </a>
                      @endif
                        
                    </td>
                  </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Barang belum Tersedia.
                    </div>
                @endforelse
                </tbody>
              </table>
              </div>
            </div>
@endsection
@section('js_custom')
<script src="{{asset('assets/lib/jquery/jquery.min.js')}}"></script>
  <script type="text/javascript" language="javascript" src="{{asset('assets/lib/advanced-datatable/js/jquery.js')}}"></script>
  <script src="{{asset('assets/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{asset('assets/lib/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{asset('assets/lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('assets/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="{{asset('assets/lib/advanced-datatable/js/jquery.dataTables.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/lib/advanced-datatable/js/DT_bootstrap.js')}}"></script>
  <!--common script for all pages-->
  <script src="{{asset('assets/lib/common-scripts.js')}}"></script>
  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      nCloneTd.innerHTML = '<img src="{{asset('assets/lib/advanced-datatable/images/details_open.png')}}">';
      nCloneTd.className = "center";

      $('#hidden-table-info thead tr').each(function() {
        this.insertBefore(nCloneTh, this.childNodes[0]);
      });

      $('#hidden-table-info tbody tr').each(function() {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      });

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "{{asset('assets/lib/advanced-datatable/media/images/details_open.png')}}";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "{{asset('assets/lib/advanced-datatable/images/details_close.png')}}";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>
@endsection
@section('css_custom')
<link href="{{asset('assets/lib/advanced-datatable/css/demo_page.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/lib/advanced-datatable/css/demo_table.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('assets/lib/advanced-datatable/css/DT_bootstrap.css')}}" />
@endsection