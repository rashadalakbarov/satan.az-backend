<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $company['name'] ?? "Satan.az" }} - Giriş</title>
        <link rel="icon" type="image/x-icon" href="{{ isset($company['logo']) ? asset('/' . $company['logo']) : asset('assets/img/favicon/favicon.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
        />

        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="{{asset('assets')}}/vendor/fonts/boxicons.css" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{asset('assets')}}/vendor/css/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{asset('assets')}}/vendor/css/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{asset('assets')}}/css/demo.css" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{asset('assets')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

        <!-- Page CSS -->
        <!-- Page -->
        <link rel="stylesheet" href="{{asset('assets')}}/vendor/css/pages/page-auth.css" />
        <!-- Helpers -->
        <script src="{{asset('assets')}}/vendor/js/helpers.js"></script>

        <script src="{{asset('assets')}}/js/config.js"></script>
    </head>
    <body>
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                    
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="app-brand justify-content-center">
                                <a href="{{route('admin.index')}}" class="app-brand-link gap-2">
                                    <span class="app-brand-text demo menu-text fw-bolder ms-2 mt-2">{{ $company['name'] ?? "Satan.az" }}</span>
                                </a>
                            </div>

                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                            @endif

                            @if (Session::has('error'))
                                <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
                            @endif

                            <form id="formAuthentication" class="mb-3" action="{{route('admin.index.auth')}}" method="POST" autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-poçt</label>
                                    <input
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="email"
                                        name="email"
                                        placeholder="E-poçtunuzu daxil edin"
                                        value="{{old('email')}}"
                                        required
                                    />
                                    @error('email') <p class="invalid-feedback">{{ $message }}</p> @enderror
                                </div>

                                <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="password">Şifrə</label>
                                    <div class="input-group input-group-merge">
                                        <input
                                            type="password"
                                            id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password"
                                            placeholder="********"
                                            aria-describedby="password"
                                            required
                                        />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        @error('password') <p class="invalid-feedback">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <!-- <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-me" />
                                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                                    </div>
                                </div> -->
                                <div class="mb-3">
                                    <button class="btn btn-primary d-grid w-100" type="submit">Daxil ol</button>
                                </div>
                            </form>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="{{asset('assets')}}/vendor/libs/jquery/jquery.js"></script>
        <script src="{{asset('assets')}}/vendor/libs/popper/popper.js"></script>
        <script src="{{asset('assets')}}/vendor/js/bootstrap.js"></script>
        <script src="{{asset('assets')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

        <script src="{{asset('assets')}}/vendor/js/menu.js"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{asset('assets')}}/js/main.js"></script>
    </body>
</html>