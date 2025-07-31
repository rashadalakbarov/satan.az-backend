@extends('front.layout.mixed')

@section('content')
<div class="container">
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
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-pills mb-3 main-tab" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fa-solid fa-file me-1"></i> Elanlar</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fa-solid fa-user me-1"></i> Profil</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-limit-tab" data-bs-toggle="pill" data-bs-target="#pills-limit" type="button" role="tab" aria-controls="pills-limit" aria-selected="false"><i class="fa-solid fa-timeline me-1"></i> Elan limiti</button>
                </li>                        
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    <!-- Tab Home Start -->                            
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-current-site-tab" data-bs-toggle="pill" data-bs-target="#pills-current-site" type="button" role="tab" aria-controls="pills-current-site" aria-selected="true">Hazırda saytda (1)</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-expired-time-tab" data-bs-toggle="pill" data-bs-target="#pills-expired-time" type="button" role="tab" aria-controls="pills-expired-time" aria-selected="false">Müddəti başa çatmış (0)</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-waiting-tab" data-bs-toggle="pill" data-bs-target="#pills-waiting" type="button" role="tab" aria-controls="waiting" aria-selected="false">Gözləmədə (0)</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-passive-tab" data-bs-toggle="pill" data-bs-target="#pills-passive" type="button" role="tab" aria-controls="pills-passive" aria-selected="false">Dərc olunmamış (0)</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-current-site" role="tabpanel" aria-labelledby="pills-current-site-tab" tabindex="0">
                            <h3>current-site</h3>
                        </div>
                        <div class="tab-pane fade" id="pills-expired-time" role="tabpanel" aria-labelledby="pills-expired-time-tab" tabindex="0">
                            <h3>expired-time</h3>
                        </div>
                        <div class="tab-pane fade" id="pills-waiting" role="tabpanel" aria-labelledby="pills-waiting-tab" tabindex="0">
                            <h3>waiting</h3>
                        </div>
                        <div class="tab-pane fade" id="pills-passive" role="tabpanel" aria-labelledby="pills-passive-tab" tabindex="0">
                            <h3>passive</h3>
                        </div>
                    </div>
                    <!-- Tab Home End --> 
                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <h3 class="text-capitalize fw-bold my-5 text-center text-md-start">Profilə düzəliş et</h3>
                    
                    <div class="col-12 col-md-6">
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleName" class="form-label">Adınız</label>
                                <input type="text" class="form-control" id="exampleName" name="exampleName">
                            </div>
                            <div class="mb-3">
                                <label for="exampleEmail" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="exampleEmail" name="exampleEmail">
                            </div>
                            <button type="button" class="btn btn-outline-success">Yadda saxla</button>
                        </form>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-limit" role="tabpanel" aria-labelledby="pills-limit-tab" tabindex="0">
                    <h3 class="text-capitalize fw-bold my-5 text-center text-md-start">Kateqoriyalarınız üzrə qalan yerləşdirmələrin sayı</h3>
                    <a class="btn btn-light d-flex align-items-center justify-content-between w-100 p-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <p class="mb-0">Category</p>
                        <p class="mb-0">Sub Category</p>
                        <p class="mb-0"><span class="badge text-bg-secondary">1</span></p>
                    </a>

                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <p>Ödənişsiz elan – 1 elan</p>
                            <p class="mb-0">Ödənişli elan – 0 elan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection