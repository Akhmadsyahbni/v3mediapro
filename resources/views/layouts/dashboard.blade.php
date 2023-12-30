<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

     <!-- Favicons -->
     <link href="{{asset('assets/img/logo2.png')}}" rel="icon">
     <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Favicons -->
    {{-- <link href="{{asset('admin/img/favicon.png')}}" rel="icon">
    <link href="{{asset('admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
</head>

<body>
    
        @auth
        @include('layouts.dashboard.sidebar')
        @include('layouts.dashboard.navbar')
        @endauth
        @yield('content')
        @auth
        @include('layouts.dashboard.footer')
        @endauth
        
    <!-- Vendor JS Files -->
    <script src="{{asset('admin/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('admin/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('admin/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('admin/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('admin/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('admin/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('admin/js/datatables.js')}}"></script>
    <!-- Template Main JS File -->
    <script src="{{asset('admin/js/main.js')}}"></script>
    
    {{-- @include('sweetalert::alert') --}}

    @yield('script')

</body>

</html>
