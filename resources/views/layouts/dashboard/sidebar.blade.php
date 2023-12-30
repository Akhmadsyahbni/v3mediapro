  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">
          @if (auth()->guard('admin')->check())
          <li class="nav-item">
              <a href="{{ route('admin.home.index') }}"
                  class="nav-link {{ request()->routeIs('admin.home.index') ? '' : 'collapsed' }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li>
          @endif
          @if (auth()->guard('admin')->check())
          <li class="nav-item">
              <a href="{{ route('admin.kategori.index') }}"
                  class="nav-link {{ request()->routeIs('admin.kategori.index') ? '' : 'collapsed' }}">
                  <i class="bi bi-grid"></i>
                  <span>Kategori</span>
              </a>
          </li>
          @endif
          @if (auth()->guard('admin')->check())
          <li class="nav-item">
              <a href="{{ route('admin.alat.index') }}"
                  class="nav-link {{ request()->routeIs('admin.alat.index') ? '' : 'collapsed' }}">
                  <i class="bi bi-grid"></i>
                  <span>Alat</span>
              </a>
          </li>
          @endif
          @if (auth()->guard('admin')->check())
          <li class="nav-item">
              <a href="{{ route('admin.penyewaan.index') }}"
                  class="nav-link {{ request()->routeIs('admin.penyewaan.index') ? '' : 'collapsed' }}">
                  <i class="bi bi-grid"></i>
                  <span>Penyewaan</span>
              </a>
          </li>
          @endif
          @if (auth()->guard('admin')->check())
          <li class="nav-item">
              <a href="{{ route('admin.riwayat-reservasi') }}"
                  class="nav-link {{ request()->routeIs('admin.riwayat-reservasi') ? '' : 'collapsed' }}">
                  <i class="bi bi-grid"></i>
                  <span>Riwayat Transaksi</span>
              </a>
          </li>
          @endif
      </ul>
  </aside><!-- End Sidebar-->
