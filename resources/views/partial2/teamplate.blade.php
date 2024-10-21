<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Badan Penelitian Dan Pengembangan Kementrian Pertahanan RI</title>
  
  <!-- Favicon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{ asset('assets90/css/style.min.css') }}">
</head>

<body>
  <div class="layer"></div>
  
  <!-- Body -->
  <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
  <div class="page-flex">
    <!-- Sidebar -->
    @include('layout2.sidebar')

    <div class="main-wrapper">
      <!-- Main nav -->
      <nav class="main-nav--bg">
        <div class="container main-nav">
          <div class="main-nav-start">
            <div class="search-wrapper">
              <!-- Search bar placeholder -->
              <!-- <input type="text" placeholder="Enter keywords ..." required> -->
            </div>
          </div>
          <div class="main-nav-end">
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
              <span class="sr-only">Toggle menu</span>
              <span class="icon menu-toggle--gray" aria-hidden="true"></span>
            </button>
            
            <!-- User Profile & Logout -->
            <div class="nav-user-wrapper">
              <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                <span class="sr-only">My profile</span>
                <span class="nav-user-img">
                  <picture>
                    <source srcset="{{ asset('assets90/img/avatar/avatar-illustrated-02.webp') }}" type="image/webp">
                    <img src="{{ asset('assets90/img/avatar/avatar-illustrated-02.png') }}" alt="User name">
                  </picture>
                </span>
              </button>
              <ul class="users-item-dropdown nav-user-dropdown dropdown">
                <li>
                  <a class="danger" href="#" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin keluar?')) { document.getElementById('logout-form').submit(); }">
                    <i data-feather="log-out" aria-hidden="true"></i>
                    <span>Keluar</span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!-- Main Content -->
      @yield('content')
    </div>
  </div>

  <!-- Chart library -->
  <script src="{{ asset('assets90/plugins/chart.min.js') }}"></script>
  <!-- Icons library -->
  <script src="{{ asset('assets90/plugins/feather.min.js') }}"></script>
  <!-- Custom scripts -->
  <script src="{{ asset('assets90/js/script.js') }}"></script>
  <script>
    feather.replace()
  </script>
</body>

</html>
