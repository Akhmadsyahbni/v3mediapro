<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <title>Member Area</title>
    </head>
    <body style="padding-bottom: 90px">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <span class="navbar-brand mb-0 h1">Member Area</span>
                <div class="d-flex text-light">
                    <div class="nav-item dropdown">
                        <a style="text-decoration: none" class="link-light dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu mr-5" aria-labelledby="navbarDropdownMenuLink">
                          {{-- <li><a class="dropdown-item" href="{{ route('akun.pengaturan') }}">Pengaturan Akun</a></li> --}}
                          <li><a  class="dropdown-item" href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
                          <form action="{{ route('user.logout') }}" id="logout-form" method="post">@csrf</form>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <ul class="nav nav-tabs nav-fill d-none d-sm-flex">
            <li class="nav-item"><a class="nav-link {{ Route::is('user.home.index') ? 'active': '' }}" href="{{ route('user.home.index') }}">Explore</a></li>
            {{-- <li class="nav-item"><a class="nav-link {{ Route::is('user.order.show') ? 'active': '' }}" href="{{ route('user.order.show') }}">Reservasi Anda <span class="badge bg-secondary">{{ Auth::user()->payment->count() }}</span></a></li> --}}
            @auth
            <li class="nav-item"><a class="nav-link" href="{{ route('user.home.index') }}#keranjang" onclick="$('#keranjang').delay(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100)">Keranjang Anda <span class="badge bg-secondary">{{ Auth::user()->carts->count() }}</span></a></li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('user.order.show') ? 'active': '' }}" href="{{ route('user.order.show') }}">
                    Transaksi Anda 
                    <span class="badge bg-secondary">
                        {{ optional(Auth::user()->payment)->count() ?? 0 }}
                    </span>
                </a>
            </li>            
            @endauth
        </ul>
        <div class="container-fluid px-4 mt-4">
            <div class="alert alert-success" role="alert">
                <p>Selamat datang di member area, sekarang kamu dapat memesan dengan menambahkan alat ke dalam keranjang</p>
                {{-- <p>Baru pernah menyewa disini? simak panduan penyewaan <a href="" class="link-dark">disini</a></p> --}}
            </div>
            @yield('container')
        </div>
        
        <script src="/js/datatables.js"></script>
        <script src="/js/adminscripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>