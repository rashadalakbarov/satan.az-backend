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

@section('javascript')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const phoneInput = document.getElementById("phone");

        phoneInput.addEventListener("input", function (e) {
            let digits = e.target.value.replace(/\D/g, "");

            // Zorunlu olarak 994 ile başlat
            if (!digits.startsWith("994")) {
                digits = "994";
            }

            // Sadece 12 hane: 994 + 9 rakam
            digits = digits.slice(0, 12);

            // Formatla
            let formatted = "+" + digits.slice(0, 3); // +994
            if (digits.length > 3) formatted += digits.slice(3, 5); // +99455
            if (digits.length > 5) formatted += " " + digits.slice(5, 8); // +99455 821
            if (digits.length > 8) formatted += " " + digits.slice(8, 10); // +99455 821 56
            if (digits.length > 10) formatted += " " + digits.slice(10, 12); // +99455 821 56 73

            e.target.value = formatted;
        });

        // Başlangıçta otomatik +994 koy
        phoneInput.value = "+994";
    });
</script>
@endsection
