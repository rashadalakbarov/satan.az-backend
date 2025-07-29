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

        <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{route('admin.dashboard')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Ana Səhifə</div>
            </a>
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