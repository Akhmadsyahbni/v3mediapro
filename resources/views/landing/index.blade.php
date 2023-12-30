@extends('layouts.landing')
@section('content')
<div class="container-xxl position-relative p-0">
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5">
                <div class="col-lg-6 pt-5 text-center text-lg-start">
                    <h1 class="display-4 text-white mb-4 animated slideInLeft">V3 Media Pro</h1>
                    <p class="text-white animated slideInLeft">V3 Media Pro merupakan penyedia Jasa Rental Kamera Ada puluhan alasan untuk mulai menggunakan kamera dalam setiap aktifitas Anda di jaman sekarang saat semua orang menggunakan sosial media dalam kehidupan sehari-harinya. Pastikan momen Anda diabadikan dengan kamera yang mumpuni agar foto yang dihasilkan membuat Anda puas! </p>
                    <h4 class="text-white mb-4 animated slideInLeft">
                       <p>Sewa - Bayar - Ambil - Jangan lupa balikin </p>
                    </h4>
                    <a href="{{ route('user.register') }}" class="btn btn-secondary py-sm-3 px-sm-5 me-3 animated slideInLeft">Get Started Now</a>
                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <img class="img-fluid animated zoomIn" src="{{asset('assets/img/hero.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5" id="about">
        <div class="container px-lg-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="section-title position-relative mb-4">
                        <h1 class="mb-2">About</h1>
                    </div>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit clita duo justo magna dolore erat amet</p>
                    <div class="row g-3">
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="bg-light rounded text-center p-4">
                                <i class="fa fa-user fa-2x text-primary mb-2"></i>
                                <h2 class="mb-1" data-toggle="counter-up">1234</h2>
                                <p class="mb-0">Experts Team</p>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="bg-light rounded text-center p-4">
                                <i class="fa fa-battery-full fa-2x text-primary mb-2"></i>
                                <h2 class="mb-1" data-toggle="counter-up">1234</h2>
                                <p class="mb-0">Good Quality</p>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="bg-light rounded text-center p-4">
                                <i class="fa fa-money fa-2x text-primary mb-2"></i>
                                <h2 class="mb-1" data-toggle="counter-up">1234</h2>
                                <p class="mb-0">Low Cost</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{asset('assets/img/about.png')}}">
                </div>
            </div>
        </div>
    </div>
    

    <div class="section-title position-relative text-center mx-auto mb-5 pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
        <h1 class="mb-3">Service Product</h1>
        <p class="mb-1">Vero justo sed sed vero clita amet. Et justo vero sea diam elitr</p>
    </div>

    <section class="blogs">
        <div class="box-container">
            <div class="card-body" style="max-height: 500px; overflow:auto;">
                <div class="row row-cols-sm-2 row-cols-lg-6 g-2">
                    @foreach ($alats as $alat)
                    <div class="col-6">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ url('') }}/images/{{ $alat->gambar }}" alt="">
                            <div class="card-body">
                                <span class="badge bg-warning">{{ $alat->category->nama_kategori }}</span>
                                <h6 class="card-title">{{ $alat->nama_alat }}</h6>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"> {{ formatToRupiah($alat->harga24) }}<span class="badge bg-light text-dark" style="float: right;">24 Jam</span></li>
                            </ul>
                            <div class="card-footer">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('home.detail',['id' => $alat->id]) }}" class="btn btn-sm btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
  
            <div class="section-title position-relative text-center mx-auto mb-5 pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Our Blog</h1>
              
            </div>
  
          <div class="row">
  
            <div class="col-lg-6">
              <div class="row">
                <div class="col-lg-6 info">
                  <i class="bx bx-map"></i>
                  <h4>Address</h4>
                  <p>A108 Adam Street,<br>New York, NY 535022</p>
                </div>
                <div class="col-lg-6 info">
                  <i class="bx bx-phone"></i>
                  <h4>Call Us</h4>
                  <p>+1 5589 55488 55<br>+1 5589 22548 64</p>
                </div>
                <div class="col-lg-6 info">
                  <i class="bx bx-envelope"></i>
                  <h4>Email Us</h4>
                  <p>contact@example.com<br>info@example.com</p>
                </div>
                <div class="col-lg-6 info">
                  <i class="bx bx-time-five"></i>
                  <h4>Working Hours</h4>
                  <p>Mon - Fri: 9AM to 5PM<br>Sunday: 9AM to 1PM</p>
                </div>
              </div>
            </div>
  
            <div class="col-lg-6">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form" data-aos="fade-up">
                <div class="form-group">
                  <input placeholder="Your Name" type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group mt-3">
                  <input placeholder="Your Email" type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group mt-3">
                  <input placeholder="Subject" type="text" class="form-control" name="subject" id="subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea placeholder="Message" class="form-control" name="message" rows="5" required></textarea>
                </div>
                <div class="mb-5 mt-2"><button class="btn btn-primary" type="submit">Send Message</button></div>
              </form>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->
  

    <section class="credit">created by code skill | all rights reserved!</section>
</div>
@endsection