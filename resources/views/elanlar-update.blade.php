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
                                    @error('elantitle') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>                                
                                
                                <div class="mb-3 col-md-6">
                                    <label for="elanprice" class="form-label">Qiymət</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="elanprice"
                                        name="elanprice"
                                        value="{{$elan->price}}"
                                    />
                                    @error('elanprice') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>                                
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="elan_city">Şəhərlər</label>
                                    <select id="elan_city" class="select2 form-select" name="elan_city">
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" @selected($elan->city_id == $city->id)>{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('elan_city') <small class="text-danger">{{ $message }}</small> @enderror 
                                </div>                                           
                                
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="category_id">Kateqoriyalar</label>
                                        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                            <option value="">Kateqoriya axtar ...</option>
                                            @foreach($mainCategories as $main)
                                                <optgroup label="{{ $main->name }}">
                                                    @foreach($main->children as $sub)
                                                        <option value="{{ $sub->id }}" @selected(optional($elan->option)->category_id == $sub->id) >{{ $sub->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                         @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>                                   

                                    <div id="dynamicOptions">
                                        @if($options->count())
                                            <h5 class="mt-3">Əlavə Parametrlər</h5>
                                            <div class="row">
                                                @foreach($options as $option)
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">{{ $option->title }}</label>

                                                        @php
                                                            $existing = $existingOptions->get($option->id);
                                                            $selectedValue = $existing?->value;
                                                        @endphp

                                                        @if($option->type === 'select')
                                                            <select name="options[{{ $option->id }}]" class="form-select">
                                                                <option value="">Seçim edin...</option>
                                                                @foreach($option->values as $val)
                                                                    <option value="{{ $val->value }}" @selected($val->value == $selectedValue)>
                                                                        {{ $val->value }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                        @elseif(trim(strtolower($option->type)) === 'check')
                                                            @php
                                                                $selectedValues = is_array(json_decode($selectedValue, true)) ? json_decode($selectedValue, true) : [];
                                                            @endphp

                                                            @foreach($option->values as $val)
                                                                <div class="form-check">
                                                                    <input
                                                                        type="checkbox"
                                                                        name="options[{{ $option->id }}][]"
                                                                        value="{{ $val->value }}"
                                                                        class="form-check-input"
                                                                        {{ in_array($val->value, $selectedValues) ? 'checked' : '' }}
                                                                    >
                                                                    <label class="form-check-label">{{ $val->value }}</label>
                                                                </div>
                                                            @endforeach

                                                        @elseif($option->type === 'text')
                                                            <input type="text"
                                                                class="form-control"
                                                                name="options[{{ $option->id }}]"
                                                                value="{{ $selectedValue }}">
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="elan_description" class="form-label">Daha Ətraflı</label>
                                    <textarea class="form-control" id="elan_description" rows="9" name="elan_description">{{ $elan->description }}</textarea>
                                    @error('elan_description') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>                                

                                <hr class="my-4" />

                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="elan_activate">Aktivlik</label>
                                    <select id="elan_activate" name="elan_activate" class="select2 form-select">
                                        <option @selected($elan->activate == "active") value="active">Aktivləşdir</option>
                                        <option @selected($elan->activate == "passive") value="passive">İmtina et</option>
                                        <option @selected($elan->activate == "waiting") value="waiting">Gözləmədə saxla</option>
                                        <option @selected($elan->activate == "blocked") value="blocked">Blokla</option>
                                    </select>
                                    @error('elan_activate') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>                                

                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="elan_status">Status</label>
                                    <select id="elan_status" name="elan_status"  class="select2 form-select">
                                        <option @selected($elan->status == "1") value="1">Sadə</option>
                                        <option @selected($elan->status == "2") value="2">Premium</option>
                                        <option @selected($elan->status == "3") value="3">Vip</option>
                                    </select>
                                    @error('elan_status') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>                                
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

@section('js')
<script>
$(document).ready(function () {

    $('#category_id').on('change', function () {
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
                                <div class="col-12 col-md-6 mt-3">
                                    <div class="form-check mb-1">
                                        <input class="form-check-input @error('option_${option.id}') is-invalid @enderror" type="checkbox" name="option[${option.id}]" value="1" id="option${option.id}" ${option.required === '1' ? 'required' : ''}>
                                        <label class="form-check-label" for="option${option.id}">
                                            ${option.title}
                                        </label>
                                    </div>
                                </div>
                            `;
                        } else if (option.type === 'select' && option.activate === 'active') {
                            html += `
                                <div class="col-12 col-md-6 mt-3">
                                    <div class="mb-1">
                                        <label class="form-label" for="option${option.id}">${option.title} ${option.required === '1' ? '<span class="text-danger">*</span>' : ''}</label>
                                        <select class="form-select option-select @error('option_${option.id}') is-invalid @enderror" name="option[${option.id}]" id="option${option.id}" data-option-id="${option.id}" ${option.required === '1' ? 'required' : ''}>
                                            <option value="">Yüklənir...</option>
                                        </select>
                                    </div>
                                </div>
                            `;
                        } else {
                            html += `
                                <div class="col-12 col-md-6 mt-3">
                                    <div class="mb-1">
                                        <label class="form-label" for="option${option.id}">${option.title}</label>
                                        <input type="text" class="form-control @error('option_${option.id}') is-invalid @enderror" name="option[${option.id}]" id="option${option.id}" ${option.required === '1' ? 'required' : ''}>
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
</script>
@endsection