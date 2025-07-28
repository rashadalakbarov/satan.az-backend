<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $company['name'] }} - @yield('title')</title>
        <link rel="icon" type="image/x-icon" href="{{asset('storage/' . ($company['logo'] ?? ''))}}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
        />

        <link rel="stylesheet" href="{{asset('assets')}}/vendor/fonts/boxicons.css" />

        <!-- Fontawesome 6.7.2 -->
        <link rel="stylesheet" href="{{asset('assets')}}/vendor/fonts/fontawesome-6.7.2/css/all.min.css" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{asset('assets')}}/vendor/css/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{asset('assets')}}/vendor/css/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{asset('assets')}}/css/demo.css" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{asset('assets')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

        <!-- Helpers -->
        <script src="{{asset('assets')}}/vendor/js/helpers.js"></script>

        <script src="{{asset('assets')}}/js/config.js"></script>
    </head>
    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">

                <!-- Menu -->
                    @include('layout.asidebar')
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                        @include('layout.navbar')
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ana səhifə /</span> @yield('title')</h4>
                            @yield('content')
                        </div>
                        <!-- / Content -->

                        <!-- Footer -->
                            @include('layout.footer')
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->

        <!-- Core JS -->
        <script src="{{asset('assets')}}/vendor/libs/jquery/jquery.js"></script>
        <script src="{{asset('assets')}}/vendor/libs/popper/popper.js"></script>
        <script src="{{asset('assets')}}/vendor/js/bootstrap.js"></script>
        <script src="{{asset('assets')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

        <script src="../assets/vendor/js/menu.js"></script>
        <!-- endbuild -->

        <!-- Main JS -->
        <script src="{{asset('assets')}}/js/main.js"></script>       

        @yield('js')
    </body>
</html>