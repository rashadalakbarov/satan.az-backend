<!doctype html>
<html lang="en">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Meta Tags -->
        <title>{{ $company['name'] ? $company['name'] : "Satan.az" }} - Pulsuz Elanlar Saytı — Maşın, Ev, Telefon, Geyim, Mebel — Bakı, Azərbaycan</title>
        <link rel="icon" type="image/x-icon" href="{{ $company['logo'] === 'storage/logo/logo.png' ? asset('storage/logo/logo.png') : asset('assets/img/favicon/favicon.png')}}">

        <!-- Font Awesome 6.1.2 -->
        <link rel="stylesheet" href="{{asset('/')}}front/plugin/fontawesome-free-6.7.2/css/all.css">
		<!-- Bootstrap 5.2.0 -->
        <link rel="stylesheet" href="{{asset('/')}}front/plugin/bootstrap-5.3.7/css/bootstrap.min.css">  

        <!-- Style CSS -->
        <link rel="stylesheet" href="{{asset('/')}}front/css/style.css">
    </head>
    <body class="d-flex flex-column min-vh-100">
        
        @include('front.layout.header')

        <main class="flex-fill">
            <div class="container">
                @yield('content')
            </div>
        </main>

        @include('front.layout.footer')
        
        <!-- Optional Javascript -->
        <script src="{{asset('/')}}front/plugin/jquery-3.7.1/jquery-3.7.1.min.js"></script>
        <script src="{{asset('/')}}front/plugin/bootstrap-5.3.7/js/bootstrap.bundle.min.js"></script>

        <!-- Main JS -->
        <script src="{{asset('/')}}front/js/main.js"></script>

        @yield('javascript')
    </body>
</html>