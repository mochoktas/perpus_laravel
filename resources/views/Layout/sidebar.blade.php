<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="{{ asset('assets/img/ui-sam.jpg')}}" class="img-circle" width="80"></a></p>
          <h5 class="centered">{{ Auth::user()->name }}</h5>
          <li class="mt">
            <a class="{{request ()->is('home') ? 'active' :'' }} " href="/home">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          @can('isAnggota')
          <li class="mt">
            <a class="{{request ()->is('info') ? 'active' :'' }} " href="/info">
              <i class="fa fa-dashboard"></i>
              <span>Info</span>
              </a>
          </li>
          @endcan
          @can('isPegawai')
          <li class="sub-menu ">
            <a class="{{request ()->is('indexStaff') ? 'active' :'' }}" href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Master Staff</span>
              </a>
            <ul class="sub">
              <li class="{{request ()->is('indexStaff') ? 'active' :'' }}"><a href="/indexStaff">Staff</a></li>
            </ul>
          </li>
          <li class="sub-menu ">
            <a class="{{request ()->is('anggota') ? 'active' :'' }}" href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Master Anggota</span>
              </a>
            <ul class="sub">
              <li class="{{request ()->is('anggota') ? 'active' :'' }}"><a href="/anggota">Anggota</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a class="{{request ()->is('peminjaman') ? 'active' :'' }} " href="/peminjaman">
              <i class="fa fa-dashboard"></i>
              <span>Peminjaman</span>
              </a>
          </li>
          <li class="sub-menu">
            <a class="{{request ()->is('pengembalian') ? 'active' :'' }} " href="/pengembalian">
              <i class="fa fa-dashboard"></i>
              <span>Pengembalian</span>
              </a>
          </li>
          <li class="sub-menu">
            <a class="{{request ()->is('penerimaan') ? 'active' :'' }} " href="/penerimaan">
              <i class="fa fa-dashboard"></i>
              <span>Penerimaan</span>
              </a>
          </li>
          @endcan
        </ul>
        <!-- sidebar menu end-->
      </div>
</aside>