@extends('front.layout.mixed')

@section('content')
<div class="border py-5 rounded">
    <h1 class="fs-3 my-4 text-center">Yeni elan</h1>

    <form action="{{route('new.store')}}" method="POST" autocomplete="off">
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
                        </div>
                    </div>

                    <!-- Dynamic Option Alanları -->
                    <div id="dynamicOptions" class="row gy-3"></div>
                    
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('javascript')
<script>
    $('#categorySelect').on('change', function () {
        let categoryId = $(this).val();

        // $('#dynamicOptions').html('Yüklənir...');

        if (categoryId) {
            $.ajax({
                url: `/new/get-options/${categoryId}`,
                type: 'GET',
                success: function (response) {
                    let html = '';

                    response.forEach(option => {
                        if (option.type === 'check' && option.activate === 'active') {
                            html += `
                                <div class="col-md-3">
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="checkbox" name="option[${option.id}]" value="1" id="option${option.id}">
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
                                        <select class="form-select" name="option[${option.id}]" id="option${option.id}" ${option.required === '1' ? 'required' : ''}>
                                            <option value="">Seçin</option>
                                            <option value="option1">Option 1</option>
                                            <option value="option2">Option 2</option>
                                        </select>
                                    </div>
                                </div>
                            `;
                        } else {
                            html += `
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="option${option.id}">${option.title}</label>
                                        <input type="text" class="form-control" name="option[${option.id}]" id="option${option.id}">
                                    </div>
                                </div>
                            `;
                        }
                    });

                    $('#dynamicOptions').html(html);
                },
                error: function () {
                    $('#dynamicOptions').html('<div class="text-danger">Xəta baş verdi.</div>');
                }
            });
        } else {
            $('#dynamicOptions').html('');
        }
    });
</script>
@endsection