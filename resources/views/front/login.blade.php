@extends('front.layout.mixed')

@section('content')
<div class="w-100 d-flex align-items-center justify-content-center" style="height: 300px">
    <div class="card" style="width: 350px">    
        <div class="card-body">  
            <h3 class="mb-4 text-center">Kabinetə giriş</h3>      
            <form action="{{ route('send-otp') }}" method="POST">
                @csrf

                <div class="form-floating mb-3">
                    <input type="tel" class="form-control" id="phone" name="phone">
                    <label for="phone">Telefon nömrənizi daxil edin</label>
                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn w-100 btn-primary mt-1">SMS-kod göndərilsin</button>
            </form>
        </div>
    </div>
</div>
@endsection
