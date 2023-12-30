<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        <h1 class="m-0"><i class="fa fa-camera me-3"></i>V3 Media Pro</h1>
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        @if (Route::has('user.login'))
        <div class="navbar-nav ms-auto py-0">
            <a href="{{ url('/home') }}" class="nav-item nav-link active">Home</a>
            <a href="#about" class="nav-item nav-link">About</a>
            <a href="domain.html" class="nav-item nav-link">Camera</a>
            <a href="contact.html" class="nav-item nav-link">Contact</a>
            <a href="{{ route('user.login') }}" class="nav-item nav-link">Login</a>
             <a href="" class="nav-item nav-link">Contact</a>   
        </div>
        @endif
         @if (Route::has('user.register'))
            <a href="{{ route('user.register') }}" class="btn btn-secondary py-2 px-4 ms-3">Register</a>
         @endif
    </div>
</nav>
