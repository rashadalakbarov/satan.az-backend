@extends('front.layout.mixed')

@section('content')
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
                            <select class="form-select" name="category_id" id="categorySelect">
                                <option value="">Kateqoriya axtar ...</option>
                                @foreach($mainCategories as $main)
                                    <optgroup label="{{ $main->name }}">
                                        @foreach($main->children as $sub)
                                            <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                             @error('category_id') <small class="text-red-500" id="error_category_id">{{ $message }}</small> @enderror
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
        $("#error_category_id").remove();

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
                                        <input class="form-check-input" type="checkbox" name="option_${option.id}" value="1" id="option${option.id}" ${option.required === '1' ? 'required' : ''}>
                                        <label class="form-check-label" for="option${option.id}">
                                            ${option.title}
                                        </label>
                                        @error('option_${option.id}')<div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            `;
                        } else if (option.type === 'select' && option.activate === 'active') {
                            html += `
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="option${option.id}">${option.title} ${option.required === '1' ? '<span class="text-danger">*</span>' : ''}</label>
                                        <select class="form-select option-select" name="option_${option.id}" id="option${option.id}" data-option-id="${option.id}" ${option.required === '1' ? 'required' : ''}>
                                            <option value="">Yüklənir...</option>
                                        </select>
                                        @error('option_${option.id}')<div class="text-red-500 text-sm">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            `;
                        } else {
                            html += `
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="option${option.id}">${option.title} ${option.required === '1' ? '<span class="text-danger">*</span>' : ''}</label>
                                        <input type="text" class="form-control" name="option_${option.id}" id="option${option.id}" ${option.required === '1' ? 'required' : ''}>
                                        @error('option_${option.id}')<div class="text-red-500 text-sm">{{ $message }}</div> @enderror
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
    e.preventDefault(); // sayfa yenilemesini engelle

    const form = $(this)[0];
    const formData = new FormData(form);
    const action = $(this).attr('action');

    // Önce hataları temizle
    $("#error_category_id").remove();

    $.ajax({
        url: action,
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: 'application/json',
        success: function (res) {
            // Başarılı olursa yönlendirme veya mesaj
            alert('Elan uğurla əlavə edildi');
            // window.location.href = '/some-success-url'; // istersen yönlendir
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                
                const errors = xhr.responseJSON.errors;

                $('.text-red-500.error-message').remove();

                Object.keys(errors).forEach(function (field) {
                    const msg = errors[field][0];

                    // İlgili input'u bul
                    const input = $(`[name="${field}"]`);

                    if (input.length) {
                        // Hatanın input altına yazılması
                        const errorHtml = `<div class="text-danger error-message">${msg}</div>`;

                        // Eğer input bir checkbox ise, üst div'e ekle
                        if (input.attr('type') === 'checkbox') {
                            input.closest('.form-check').append(errorHtml);
                        } else {
                            input.after(errorHtml);
                        }
                    }
                });

                // let errorList = '';

                // Object.keys(errors).forEach(function (field) {
                //     const msg = errors[field][0];
                //     errorList += `<li>${msg}</li>`;

                //     const input = $(`[name="${field}"]`);
                // });

                // $('#formErrors').removeClass('d-none').html(`<ul class="mb-0">${errorList}</ul>`);
            } else {
                $('#formErrors').removeClass('d-none').text('Bilinməyən xəta baş verdi.');
            }
        }
    });
});


</script>
@endsection
