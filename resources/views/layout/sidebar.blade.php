<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="{{ url('/') }}" target="_blank">
      <img src="{{ asset('favicon.ico') }}" alt="logo" class="navbar-brand-img h-100">
      <span class="ms-1 font-weight-bold">Balitbang Kemhan RI</span>
    </a>
  </div>

  <hr class="horizontal dark mt-0">

  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="{{ Auth::user()->role === 'Admin' ? route('admin.dashboard') : route('karyawan.dashboard') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Beranda</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('kategori.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tag text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Kategori</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('perbaikan.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-settings text-success text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Perbaikan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-badge text-danger text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Pengelola Akun</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin keluar?')) { document.getElementById('logout-form').submit(); }">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-user-run text-info text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Keluar</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
    </ul>
  </div>

  <div class="sidenav-footer mx-3">
    <div class="card card-plain shadow-none" id="sidenavCard">
      <img src="{{ asset('favicon.ico') }}" alt="logo" class="w-50 mx-auto d-block">
      <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
          <h6 class="mb-0">Balitbang Kemhan RI</h6>
          <p class="text-xs font-weight-bold mb-0">Badan penelitian dan pengembangan RI</p>
        </div>
      </div>
    </div>
    <a href="https://www.kemhan.go.id/balitbang/" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">kemhan.go.id</a>
  </div>
</aside>
