<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">

        <!-- Favicons -->
        <link href="{{asset('assets/assets/img/favicon.png" rel="icon')}}">
        <link href="{{asset('assets/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{asset('assets/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('assets/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
        <link href="{{asset('assets/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
        <link href="{{asset('assets/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
        <link href="{{asset('assets/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{asset('assets/assets/css/style.css')}}" rel="stylesheet">
    </head><!--/head-->
<body>

    @yield('content')


    <!-- Vendor JS Files -->
    <script src="{{asset('assets/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/assets/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('assets/assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('assets/assets/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('assets/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/assets/vendor/tinymce/tinymce.min.js')}}"></script>


    <!-- Template Main JS File -->
    <script src="{{asset('assets/assets/js/main.js')}}"></script>
</body>
</html>
