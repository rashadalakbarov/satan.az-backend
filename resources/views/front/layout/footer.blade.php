<div class="container mt-5">
    <footer class="pt-3 mt-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item">
                <a href="{{route('about')}}" class="nav-a px-2 text-body-secondary text-decoration-none">
                    Layihə haqqında
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-a px-2 text-body-secondary text-decoration-none">
                    Qaydalar
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-a px-2 text-body-secondary text-decoration-none">
                    İstifadəçi razılaşması
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-a px-2 text-body-secondary text-decoration-none">
                    Məxfilik siyasəti
                </a>
            </li>
        </ul>
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center my-3">
            <div class="col-md-8 d-flex align-items-center">
                <a href="/" class="me-2 mb-md-0 text-body-secondary text-decoration-none">
                    <img src="{{ $company['logo'] === 'storage/logo/logo.png' ? asset('storage/logo/logo.png') : asset('assets/img/favicon/favicon.png')}}" alt="logo" width="30" height="24" />
                </a>
                <span class="mb-md-0 text-body-secondary">
                    Copyright &copy; <?php echo date('Y'); ?> {{ $company['name'] ? $company['name'] : "Satan.az" }}
                </span>
            </div>
            <ul class="nav mt-2 mt-md-0 col-md-4 justify-content-end list-unstyled d-flex">
                @foreach($socialSettings as $setting)
                    <li class="ms-3">
                        <a href="{{ $setting->value }}" target="_blank" rel="noopener noreferrer" class="text-body-secondary">
                            <i class="fa-brands {{ $setting->other }}"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="my-3 py-2 border-top text-center">
            <p class="mb-0 text-secondary">
                Saytın Administrasiyası reklam bannerlərinin və yerləşdirilmiş
                elanların məzmununa görə məsuliyyət daşımır.
            </p>
        </div>
    </footer>
</div>