 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block"><i class="fa fa-camera me-3"></i>V3 Media</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @if (auth()->guard('web')->check())
              @if(Auth::user()->siswa)
                <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->siswa->nama_lengkap}}</span>
              @else
                <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
              @endif
            @endif
            @if (auth()->guard('admin')->check())
            <span class="d-none d-md-block dropdown-toggle ps-2">Selamat Datang Admin</span>
            @endif
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              @if (auth()->guard('web')->check())
              @if(Auth::user()->siswa)
                    <h6>{{ Auth::user()->siswa->nama_lengkap }}</h6>
                @else
                    <h6>Nama Lengkap</h6>
                @endif
              @endif
              @if (auth()->guard('admin')->check())
              <h6>Admin</h6>
              @endif
              <span>Selamat Datang</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              @if (auth()->guard('web')->check())
              <a class="dropdown-item d-flex align-items-center" href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
              </a>
               <form action="{{ route('user.logout') }}" id="logout-form" method="post">@csrf</form>
              @endif
              @if (auth()->guard('admin')->check())
              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
              </a>
               <form action="{{ route('admin.logout') }}" id="logout-form" method="post">@csrf</form>
              @endif
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->