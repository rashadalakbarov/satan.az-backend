@extends('layout.mixed')

@section('title', 'Elanlar')

@section('content')
<div class="row">
    <div class="col-12">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="nav-align-top mb-4">
            <ul class="nav nav-pills mb-3" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="false">
                        Ümumi Məlumat
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="false">
                        Şəkillər
                    </button>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade active show" id="navs-pills-top-home" role="tabpanel">
                        <!-- Account -->
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img
                                src="{{ $elan->user->profile ? asset('/' . $elan->user->profile) : asset('assets/img/avatars/1.png') }}"
                                alt="user-avatar"
                                class="d-block rounded"
                                height="100"
                                width="100"
                                id="uploadedAvatar"
                            />
                            <div class="button-wrapper">
                                <p class="mb-0">İstifadəçinin adı: <span class="text-muted ms-2">{{$elan->user->name}}</span> </p>
                                <p class="mb-0">E-mail addresi: <span class="text-muted ms-2">{{$elan->user->email}}</span> </p>
                                <p class="mb-0">Əlaqə telefonu: <span class="text-muted ms-2">{{$elan->user->phone}}</span> </p>
                            </div>
                        </div>

                        <hr class="my-4" />
                        
                        <form id="formAccountSettings"  action="{{ route('admin.elanlar.update', $elan->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="elantitle" class="form-label">Elan Başlığı</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="elantitle"
                                        name="elantitle"
                                        value="{{$elan->title}}"
                                    />
                                </div>
                                @error('elantitle') <small class="text-danger">{{ $message }}</small> @enderror
                                
                                <div class="mb-3 col-md-6">
                                    <label for="elanprice" class="form-label">Qiymət</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="elanprice"
                                        name="elanprice"
                                        value="{{$elan->price}}"
                                    />
                                </div>
                                @error('elanprice') <small class="text-danger">{{ $message }}</small> @enderror
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="elan_city">Şəhərlər</label>
                                    <select id="elan_city" class="select2 form-select" name="elan_city">
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" @selected($elan->city_id == $city->id)>{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('elan_city') <small class="text-danger">{{ $message }}</small> @enderror                    

                                <div class="mb-3 col-12">
                                    <label for="elan_description" class="form-label">Daha Ətraflı</label>
                                    <textarea class="form-control" id="elan_description" rows="9" name="elan_description">{{ $elan->description }}</textarea>
                                </div>
                                @error('elan_description') <small class="text-danger">{{ $message }}</small> @enderror

                                <hr class="my-4" />

                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="elan_activate">Aktivlik</label>
                                    <select id="elan_activate" name="elan_activate" class="select2 form-select">
                                        <option @selected($elan->activate == "active") value="active">Aktivləşdir</option>
                                        <option @selected($elan->activate == "passive") value="passive">İmtina et</option>
                                        <option @selected($elan->activate == "waiting") value="waiting">Gözləmədə saxla</option>
                                        <option @selected($elan->activate == "blocked") value="blocked">Blokla</option>
                                    </select>
                                </div>
                                @error('elan_activate') <small class="text-danger">{{ $message }}</small> @enderror

                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="elan_status">Status</label>
                                    <select id="elan_status" name="elan_status"  class="select2 form-select">
                                        <option @selected($elan->status == "1") value="1">Sadə</option>
                                        <option @selected($elan->status == "2") value="2">Premium</option>
                                        <option @selected($elan->status == "3") value="3">Vip</option>
                                    </select>
                                </div>
                                @error('elan_status') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Yadda saxla</button>
                                <a href="{{ route('admin.elanlar.index') }}" class="btn btn-secondary">Geri</a>
                            </div>
                        </form>
                    <!-- /Account -->
                </div>

                <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                    <p>
                        Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice
                        cream. Gummies halvah tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream
                        cheesecake fruitcake.
                    </p>
                    <p class="mb-0">
                        Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah
                        cotton candy liquorice caramels.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection