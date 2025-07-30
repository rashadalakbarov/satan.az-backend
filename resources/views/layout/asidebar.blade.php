<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo py-0 justify-content-center">
        <a href="{{route('admin.dashboard')}}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ $company['logo'] === 'storage/logo/logo.png' ? asset('storage/logo/logo.png') : asset('assets/img/favicon/favicon.png')}}" width="50" alt="Logo" height="50"><br>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2 text-capitalize">{{ $company['name'] ? $company['name'] : "Satan.az" }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 mt-4">

        <li class="menu-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
            <a href="{{route('admin.index')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div class="text-capitalize">Ana Səhifə</div>
            </a>
        </li>

        <li class="menu-item {{Request::routeIs('admin.categories.*') ? 'active open' : ''}}" style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div class="text-capitalize">Kateqoriyalar</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.categories.index') ? 'active' : '' }}">
                  <a href="{{route('admin.categories.index')}}" class="menu-link">
                    <div class="text-capitalize">Bütün kateqoriyalar</div>
                  </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.categories.create') ? 'active' : '' }}">
                  <a href="{{route('admin.categories.create')}}" class="menu-link">
                    <div class="text-capitalize">Kateqoriya yarat</div>
                  </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{Request::routeIs(['admin.options.*', 'admin.suboptions.*']) ? 'active open' : ''}}" style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div class="text-capitalize">Özəlliklər</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.options.index') ? 'active' : '' }}">
                  <a href="{{route('admin.options.index')}}" class="menu-link">
                    <div class="text-capitalize">Əsas özəlliklər</div>
                  </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.options.create') ? 'active' : '' }}">
                  <a href="{{route('admin.options.create')}}" class="menu-link">
                    <div class="text-capitalize">Özəllik yarat</div>
                  </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.suboptions.index') ? 'active' : '' }}">
                  <a href="{{route('admin.suboptions.index')}}" class="menu-link">
                    <div class="text-capitalize">Alt özəlliklər</div>
                  </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ request()->routeIs('admin.elanlar.index') ? 'active' : '' }}">
            <a href="{{ route('admin.elanlar.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div class="text-capitalize">Elanlar</div>
            </a>
        </li>
        
        <li class="menu-item {{ request()->routeIs('admin.cities.index') ? 'active' : '' }}">
            <a href="{{ route('admin.cities.index') }}" class="menu-link">
                <i class="menu-icon fa-solid fa-city"></i>
                <div class="text-capitalize">Şəhərlər</div>
            </a>
        </li>        

        <li class="menu-item {{ request()->routeIs('admin.mycompany.edit') ? 'active' : '' }}">
            <a href="{{ route('admin.mycompany.edit') }}" class="menu-link">
                <i class="menu-icon fa-solid fa-building"></i>
                <div class="text-capitalize">Şirkət Ayarları</div>
            </a>
        </li>

    </ul>
</aside>