<html>
    <head>
        <title>Detail - {{ $detail->nama_alat }}</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="stylesheet" href="/js/fullcalendar/main.css">
        <script src="/js/fullcalendar/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="row justify-content-center mt-4">
                <div class="col-md-12 col-lg-4">
                    <div class="card mb-4 shadow">
                        <div class="card-header">
                            <i class="bi bi-arrow-left"></i> <a href="{{ url()->previous() }}" class="link-dark">Kembali</a>
                        </div>
                        <img class="card-img-top" src="{{ url('') }}/images/{{ $detail->gambar }}" alt="">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{formatToRupiah( $detail->harga24 )}}<span class="badge bg-light text-dark" style="float: right;">24 Jam</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <h4><span class="badge bg-warning">{{ $detail->category->nama_kategori }}</span></h4>
                            <h1><b>{{ $detail->nama_alat }}</b></h1>
                            <p class="text-muted">{{ $detail->deskripsi }}</p>
                            
                            <hr>
                            {{-- <h6><i>Daftar Pinjaman Mendatang</i></h6>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th>Tanggal Keluar</th>
                                    <th>Tanggal Kembali</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $item)
                                    <tr>
                                        @if ($item->payment->status == 3)
                                        <td>{{ date('d M Y H:i', strtotime($item->starts)) }} <span class="badge bg-secondary">{{ $item->durasi }} Jam</span></td>
                                        <td>{{ date('d M Y H:i', strtotime($item->ends)) }}</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}
                        </div>
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var endpoint = "/api/kalender-alat/";
            var param = {!! $detail->id !!};
            var withParam = endpoint+param;
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    height: 500,
                    selectable: true,
                    navLinks: true,
                    eventSources: [
                        {
                            url: withParam,
                            color: 'yellow',
                            textColor: 'black'
                        }
                    ],
                    eventTimeFormat: {
                        hour: 'numeric',
                        minute: '2-digit',
                        hour12: false
                    },
                    headerToolbar: {
                        left: 'dayGridMonth,timeGridDay',
                        center: 'title',
                    }
                });
                calendar.render();
            });
        </script>
    </body>
</html>
