<nav class="navbar navbar-expand-lg mb-5">
    <div class="container">
        <div>
            <button class="navbar-toggler me-2" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
                <a class="navbar-brand" href="{{route('index')}}">
                <Image
                    src="{{ $company['logo'] === 'storage/logo/logo.png' ? asset('storage/logo/logo.png') : asset('assets/img/favicon/favicon.png')}}"
                    alt="logo"
                    width="30"
                    height="24"
                    class="me-2"
                />
                {{ $company['name'] ? $company['name'] : "Satan.az" }}
            </a>
        </div>

        <div class="d-flex align-items-center justify-content-center">
            <form class="d-flex position-relative" role="search">
                <div class="input-group">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Axtar ..."
                    />
                    <span class="input-group-text bg-white">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                </div>
            </form>
            <a href="{{route('new.index')}}" class="btn btn-success text-capitalize ms-2" >
                <i class="fa-solid fa-plus me-2"></i>
                Yeni elan
            </a>

            @if(Auth::guard('phone')->check())                
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle ms-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user fs-5"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('profile.index')}}">Şəxsi kabinet</a></li>
                    <li>
                        <a class="dropdown-item" href="{{route('profile.logout')}}">Çıxış</a>
                    </li>
                </ul>
            </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary ms-2">
                    Giriş
                </a>
            @endif
        </div>
    </div>
</nav>