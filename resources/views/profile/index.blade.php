@extends('front.layout.mixed')

@section('content')
@php
    $activeTab = request('tab', 'home'); // 'tab' yoksa default olarak 'home'
@endphp
<div class="row">
    <div class="col-12">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="my-5">
            <h3>
                <a href="{{route('profile.index')}}" class="text-decoration-none text-black">Şəxsi kabinet</a>
            </h3>
            <p class="fw-bold text-muted">Xoş gəldin, {{ Auth::guard('phone')->user()->name === '' ? Auth::guard('phone')->user()->phone : Auth::guard('phone')->user()->name }}!</p>
        </div>
    </div>
</div>
<div class="row my-5">
    <div class="col-12">
        <ul class="nav nav-pills mb-3 main-tab" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $activeTab === 'home' ? 'active' : '' }}" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fa-solid fa-file me-1"></i> Elanlar</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $activeTab === 'profile' ? 'active' : '' }}" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fa-solid fa-user me-1"></i> Profil</button>
            </li>                   
        </ul>
        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade {{$activeTab === 'home' ? 'show active' : ''}}" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <!-- Tab Home Start -->                            
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                     @php
                        $aktivElanlar = $elanlar->where('activate', 'active');
                    @endphp
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-current-site-tab" data-bs-toggle="pill" data-bs-target="#pills-current-site" type="button" role="tab" aria-controls="pills-current-site" aria-selected="true">Hazırda saytda ({{$aktivElanlar->count()}})</button>
                    </li>

                    
                    @php
                        $passiveElanlar = $elanlar->where('activate', 'passive'); 
                    @endphp
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-expired-time-tab" data-bs-toggle="pill" data-bs-target="#pills-expired-time" type="button" role="tab" aria-controls="pills-expired-time" aria-selected="false">Müddəti başa çatmış ({{$passiveElanlar->count()}})</button>
                    </li>

                    @php
                        $waitingElanlar = $elanlar->where('activate', 'waiting');
                    @endphp
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-waiting-tab" data-bs-toggle="pill" data-bs-target="#pills-waiting" type="button" role="tab" aria-controls="waiting" aria-selected="false">Gözləmədə ({{$waitingElanlar->count()}})</button>
                    </li>

                    @php
                        $blockedElanlar = $elanlar->where('activate', 'blocked');
                    @endphp
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-passive-tab" data-bs-toggle="pill" data-bs-target="#pills-passive" type="button" role="tab" aria-controls="pills-passive" aria-selected="false">Dərc olunmamış ({{$blockedElanlar->count()}})</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-current-site" role="tabpanel" aria-labelledby="pills-current-site-tab" tabindex="0">
                        @if($aktivElanlar->count() > 0)
                            @foreach($aktivElanlar as $elan)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $elan->title }}1</h5>
                                        <p class="card-text">{{ $elan->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else 
                            <div class="w-100 d-flex align-items-center justify-content-center" style="height: 200px; background: #f6f6f5">
                                <p class="mb-0 text-muted">Bu bölmədə elan yoxdur</p>
                            </div>
                        @endif
                    </div>

                    <div class="tab-pane fade" id="pills-expired-time" role="tabpanel" aria-labelledby="pills-expired-time-tab" tabindex="0">                        
                        @if($passiveElanlar->count() > 0)
                            @foreach($passiveElanlar as $elan)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $elan->title }}1</h5>
                                        <p class="card-text">{{ $elan->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else 
                            <div class="w-100 d-flex align-items-center justify-content-center" style="height: 200px; background: #f6f6f5">
                                <p class="mb-0 text-muted">Bu bölmədə elan yoxdur</p>
                            </div>
                        @endif
                    </div>

                    <div class="tab-pane fade" id="pills-waiting" role="tabpanel" aria-labelledby="pills-waiting-tab" tabindex="0">
                        @if($waitingElanlar->count() > 0)
                            @foreach($waitingElanlar as $elan)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $elan->title }}1</h5>
                                        <p class="card-text">{{ $elan->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else 
                            <div class="w-100 d-flex align-items-center justify-content-center" style="height: 200px; background: #f6f6f5">
                                <p class="mb-0 text-muted">Bu bölmədə elan yoxdur</p>
                            </div>
                        @endif
                    </div>

                     
                    <div class="tab-pane fade" id="pills-passive" role="tabpanel" aria-labelledby="pills-passive-tab" tabindex="0">
                        @if($blockedElanlar->count() > 0)
                            @foreach($blockedElanlar as $elan)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $elan->title }}1</h5>
                                        <p class="card-text">{{ $elan->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else 
                            <div class="w-100 d-flex align-items-center justify-content-center" style="height: 200px; background: #f6f6f5">
                                <p class="mb-0 text-muted">Bu bölmədə elan yoxdur</p>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Tab Home End --> 
            </div>

            <div class="tab-pane fade {{$activeTab === 'profile' ? 'show active' : ''}}" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                <h3 class="text-capitalize fw-bold my-5 text-center text-md-start">Profilə düzəliş et</h3>
                
                <div class="col-12 col-md-6">
                    <form action="{{route('profile.user.update', Auth::guard('phone')->user()->phone)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleName" class="form-label">Adınız</label>
                            <input type="text" class="form-control" id="exampleName" name="exampleName" value="{{old('exampleName', Auth::guard('phone')->user()->name)}}">
                            @error('exampleName') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleEmail" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="exampleEmail" name="exampleEmail" value="{{old('exampleEmail', Auth::guard('phone')->user()->email)}}">
                            @error('exampleEmail') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-success">Yadda saxla</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const urlParams = new URLSearchParams(window.location.search);
        const tab = urlParams.get("tab");

        if (tab) {
            const targetTab = document.querySelector(`[data-bs-target="#${tab}"]`);
            if (targetTab) {
                const tabInstance = new bootstrap.Tab(targetTab);
                tabInstance.show();
            }
        }
    });
</script>
@endsection