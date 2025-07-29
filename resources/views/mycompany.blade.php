@extends('layout.mixed')

@section('title', 'Şirkət Ayarları')

@section('content')
<div class="row">
    <div class="col-12">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <h5 class="card-header">Şirkət Məlumatları</h5>
            <div class="card-body">                

                <form action="{{ route('admin.mycompany.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="default_company_name" class="form-label">Şirkətin adı</label>
                        <input
                            type="text"
                            class="form-control"
                            id="default_company_name"
                            name="company_name"
                            value="{{ $settings['site_name'] ?? '' }}"
                        />
                        @error('company_name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="default_company_logo">Logo</label>                        
                        <input type="file" id="default_company_logo" name="company_logo" class="form-control">
                        @error('company_logo') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <img src="{{ $settings['logo_url'] === 'storage/logo/logo.png' ? asset('storage/logo/logo.png') : asset('storage/' . ($company['logo'] ?? '')) }}" width="100" alt="Logo" class="border mb-3"><br>

                    <button type="submit" class="btn btn-primary">Yadda saxla</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card mb-4">
            <h5 class="card-header">Əlaqə Məlumatları</h5>
            <div class="card-body">
                <form action="{{ route('admin.mycompany.contact') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="default_company_phone" class="form-label">Telefon</label>
                        <input
                            type="text"
                            class="form-control"
                            id="default_company_phone"
                            name="company_phone"
                            value="{{ $settings['phone'] ?? '' }}"
                            placeholder="+99455 123 45 67"
                        />
                        @error('company_phone') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="default_company_email" class="form-label">Email</label>
                        <input
                            type="text"
                            class="form-control"
                            id="default_company_email"
                            name="company_email"
                            value="{{ $settings['email'] ?? '' }}"
                        />
                        @error('company_email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="default_company_address" class="form-label">Ünvan</label>
                        <input
                            type="text"
                            class="form-control"
                            id="default_company_address"
                            name="company_address"
                            value="{{ $settings['address'] ?? '' }}"
                        />
                        @error('company_address') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Yadda saxla</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card mb-4">
            <h5 class="card-header">Sosial Şəbəkələr</h5>
            <div class="card-body">
                <form action="{{ route('admin.mycompany.social') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="default_company_facebook" class="form-label">Facebook</label>
                        <input
                            type="text"
                            class="form-control"
                            id="default_company_facebook"
                            name="company_facebook"
                            value="{{ $settings['facebook_url'] ?? '' }}"
                            placeholder="https://facebook.com/satan"
                        />
                        @error('company_facebook') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="default_company_instagram" class="form-label">Instagram</label>
                        <input
                            type="text"
                            class="form-control"
                            id="default_company_instagram"
                            name="company_instagram"
                            value="{{ $settings['instagram_url'] ?? '' }}"
                            placeholder="https://instagram.com/satan"
                        />
                        @error('company_instagram') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Yadda saxla</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection