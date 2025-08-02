@extends('front.layout.mixed')

@section('content')
<div id="formErrors" class="alert alert-danger d-none" role="alert"></div>
<div class="border py-5 rounded">
    <h1 class="fs-3 my-4 text-center">Yeni elan</h1>

    <form action="{{ route('new.store') }}" method="POST" autocomplete="off">
        @csrf
        <div class="d-flex justify-content-center">
            <div class="card w-50 mt-4">
                <div class="card-body">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="categorySelect" class="form-label">Kateqoriyalar</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="categorySelect">
                                <option value="">Kateqoriya axtar ...</option>
                                @foreach($mainCategories as $main)
                                    <optgroup label="{{ $main->name }}">
                                        @foreach($main->children as $sub)
                                            <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                             @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- Dinamik Option Alanları -->
                    <div id="dynamicOptions" class="row gy-3"></div>

                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-primary">Elanı əlavə et</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('javascript')
<script>
$(document).ready(function () {

    $('#categorySelect').on('change', function () {
        let categoryId = $(this).val();

        $('#dynamicOptions').html('<div class="text-muted">Yüklənir...</div>');

        if (categoryId) {
            $.ajax({
                url: `/new/get-options/${categoryId}`,
                type: 'GET',
                success: function (options) {
                    let html = '';

                    options.forEach(option => {
                        if (option.type === 'check' && option.activate === 'active') {
                            html += `
                                <div class="col-md-3">
                                    <div class="form-check mb-1">
                                        <input class="form-check-input @error('option_${option.id}') is-invalid @enderror" type="checkbox" name="option_${option.id}" value="1" id="option${option.id}">
                                        <label class="form-check-label" for="option${option.id}">
                                            ${option.title}
                                        </label>
                                    </div>
                                </div>
                            `;
                        } else if (option.type === 'select' && option.activate === 'active') {
                            html += `
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="option${option.id}">${option.title} ${option.required === '1' ? '<span class="text-danger">*</span>' : ''}</label>
                                        <select class="form-select option-select @error('option_${option.id}') is-invalid @enderror" name="option_${option.id}" id="option${option.id}" data-option-id="${option.id}">
                                            <option value="">Yüklənir...</option>
                                        </select>
                                    </div>
                                </div>
                            `;
                        } else {
                            html += `
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="option${option.id}">${option.title}</label>
                                        <input type="text" class="form-control @error('option_${option.id}') is-invalid @enderror" name="option_${option.id}" id="option${option.id}">
                                    </div>
                                </div>
                            `;
                        }
                    });

                    $('#dynamicOptions').html(html);

                    // select alanlar yüklendikten sonra suboptionları getir
                    $('.option-select').each(function () {
                        let optionId = $(this).data('option-id');
                        let selectElement = $(this);

                        $.ajax({
                            url: `/new/get-option-values/${optionId}`,
                            type: 'GET',
                            success: function (values) {
                                let optionsHtml = `<option value="">Seçin</option>`;
                                values.forEach(val => {
                                    optionsHtml += `<option value="${val}">${val}</option>`;
                                });
                                selectElement.html(optionsHtml);
                            },
                            error: function () {
                                selectElement.html('<option value="">Xəta baş verdi</option>');
                            }
                        });
                    });

                },
                error: function () {
                    $('#dynamicOptions').html('<div class="text-danger">Optionlar gətirilərkən xəta baş verdi.</div>');
                }
            });
        } else {
            $('#dynamicOptions').html('');
        }
    });

});


$('form').on('submit', function (e) {
    let isValid = true;
    let errorMessages = [];

    // Hata kutusunu temizle
    $('#formErrors').addClass('d-none').html('');

    // Dinamik required alanları kontrol et
    $('#dynamicOptions [required]').each(function () {
        if (!$(this).val() || $(this).val().trim() === '') {
            isValid = false;
            let label = $(this).closest('.mb-1').find('label').text().trim();
            errorMessages.push(`<li>${label} sahəsi doldurulmalıdır.</li>`);
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });

    if (!isValid) {
        e.preventDefault(); // form gönderimini engelle
        $('#formErrors').removeClass('d-none').html(`<ul class="mb-0">${errorMessages.join('')}</ul>`);
    }
});

</script>
@endsection
