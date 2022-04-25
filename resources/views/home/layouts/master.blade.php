<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Rainbow Grosir" />
    <meta name="keywords" content="Grosir, baju, rainbow, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>

    <link rel="shortcut icon" type="img/png" href="">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/rainbow/css/font-awesome.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/rainbow/css/elegant-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/rainbow/css/owl.carousel.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/rainbow/css/nice-select.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/rainbow/css/jquery-ui.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/rainbow/css/slicknav.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/rainbow/css/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/rainbow/css/kostumCSS.css')}}">

    {{-- Stack digunakan untuk include script ke dalam layout master dari halaman yang berbeda --}}
    @stack('page-styles')
</head>

<body>
    {{-- <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Header Section Begin -->
    <header class="header-section">
      @include('home.layouts.navbar')
    </header>
    <!-- Header End -->
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    
    @yield('content')

    @yield('instagram')

    @include('home.layouts.footer')

    <!-- Js Plugins -->
    <script src="{{ asset('assets/rainbow/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('assets/rainbow/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/rainbow/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('assets/rainbow/js/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('assets/rainbow/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('assets/rainbow/js/jquery.zoom.min.js')}}"></script>
    <script src="{{ asset('assets/rainbow/js/jquery.dd.min.js')}}"></script>
    <script src="{{ asset('assets/rainbow/js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('assets/rainbow/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/rainbow/js/main.js')}}"></script>

    @stack('page-scripts')
</body>

</html>