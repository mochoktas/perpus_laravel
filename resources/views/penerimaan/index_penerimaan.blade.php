@extends('layout.main')

@section('title_page','Penerimaan')
@section('title','Penerimaan')
@section('content')
            <a data-toggle="modal" data-target="#myModal"'>
              <button> Tambah Data Penyumbang/Pemberi Buku </button> 
            </a>
            <div class="content-panel">
              <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @forelse($asal as $data)
                  <tr class="gradeA">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->nama_asal}}</td>
                    <td>
                        <a href='/penerimaan/tambahPenerimaan/{{$data->id_asal}}'>
                          <button> Terima buku </button> 
                        </a>
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

        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data Asal</h4>
              </div>
              <div class="modal-body">
                <form action="/penerimaan/insertAsal" method="post">
                  @csrf
                <label>Nama</label>
                <input type="text" name="nama_asal" autocomplete="off" class="form-control placeholder-no-fix">
                
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