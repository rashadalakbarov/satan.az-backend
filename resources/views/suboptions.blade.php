@extends('layout.mixed')

@section('title', 'Alt Özəlliklər')

@section('content')
<div class="row">
    <div class="col-12 col-md-4">
        <button type="button" class="btn btn-outline-success mb-4" data-bs-toggle="modal" data-bs-target="#basicModal">Yeni alt özəllik</button>
    </div>
    
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">Alt Özəlliklərin siyahısı ( {{ $suboptions->total() }} ədəd)</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap mb-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Əsas özəlliyin adı</th>
                                <th>Alt özəlliyin adı</th>
                                <th width="250px">Aksiyonlar</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach($suboptions as $suboption)
                                <tr>
                                    <td>{{ $suboption->option->title }}</td>
                                    <td>{{ $suboption->value }}</td>

                                    <td>
                                        <button data-id="{{$suboption->id}}" class="btn btn-primary edit-suboption"><i class="fa-solid fa-pen me-2"></i>Yenilə</button>
                                        <button data-id="{{$suboption->id}}" class="btn btn-danger delete-suboption"><i class="fa-solid fa-trash me-2"></i>Sil</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>                    
                    </table>                
                </div>
                
                <!-- Custom Pagination for Admin Panel -->
                @if ($suboptions->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination">

                            {{-- İlk Sayfa --}}
                            <li class="page-item first {{ $suboptions->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $suboptions->url(1) }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                            </li>

                            {{-- Önceki Sayfa --}}
                            <li class="page-item prev {{ $suboptions->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $suboptions->previousPageUrl() ?? '#' }}"><i class="tf-icon bx bx-chevron-left"></i></a>
                            </li>

                            {{-- Sayfa Numaraları --}}
                            @foreach ($suboptions->links()->elements[0] as $page => $url)
                                <li class="page-item {{ $page == $suboptions->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            {{-- Sonraki Sayfa --}}
                            <li class="page-item next {{ !$suboptions->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $suboptions->nextPageUrl() ?? '#' }}"><i class="tf-icon bx bx-chevron-right"></i></a>
                            </li>

                            {{-- Son Sayfa --}}
                            <li class="page-item last {{ !$suboptions->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $suboptions->url($suboptions->lastPage()) }}"><i class="tf-icon bx bx-chevrons-right"></i></i></a>
                            </li>

                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Alt Özəllik Yarat</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3">
                            <label for="default_select" class="form-label">Özəllik seç</label>
                            <select class="form-select" id="default_select" name="default_select" aria-label="Default select example">
                                @foreach($options as $option)
                                    <option value="{{ $option->id }}">{{ $option->title }}</option>
                                @endforeach
                            </select>
                            @error('default_select') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="default_title">Özəlliyin adı</label>
                            <input type="text" class="form-control" id="default_title" name="default_title" value="{{old('default_title')}}">
                            @error('default_title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="default_activate" class="form-label">Aktivlik</label>
                            <select class="form-select" id="default_activate" name="default_activate" aria-label="Default select example">
                                <option selected value="active">Aktivləşdir</option>
                                <option value="passive">Deaktiv et</option>
                            </select>
                            @error('default_activate') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Ləğv et
                    </button>
                    <button type="button" class="btn btn-primary create-suboptions">Yadda saxla</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalLabel2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Alt özəllik Yenilə</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                         <div class="mb-3">
                            <label for="default_select_edit" class="form-label">Özəllik seç</label>
                            <select class="form-select" id="default_select_edit" name="default_select_edit" aria-label="Default select example">
                                @foreach($options as $option)
                                    <option value="{{ $option->id }}">{{ $option->title }}</option>
                                @endforeach
                            </select>
                            @error('default_select_edit') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="default_title_edit">Özəlliyin adı</label>
                            <input type="text" class="form-control" id="default_title_edit" name="default_title_edit" value="{{old('default_title')}}">
                            @error('default_title_edit') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="default_activate_edit" class="form-label">Aktivlik</label>
                            <select class="form-select" id="default_activate_edit" name="default_activate_edit" aria-label="Default select example">
                                <option selected value="active">Aktivləşdir</option>
                                <option value="passive">Deaktiv et</option>
                            </select>
                            @error('default_activate_edit') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <input type="hidden" name="" id="post_id">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Ləğv et
                    </button>
                    <button type="button" class="btn btn-primary update-city">Yenilə</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    
    $(function(){

          $(".delete-suboption").click(function(){
            let id=$(this).attr("data-id");
            
           if(confirm("Silmək istədiyinə əminsən?")){
                $.ajax({
                    type: "DELETE",
                    url: "/admin/suboptions/" + id,
                    dataType: 'json',
                    data: {_token: $('meta[name="csrf-token"]').attr('content')},
                    success: function(response) {
                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                    }, 
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });

        $(".edit-suboption").click(function(){
            let id=$(this).attr("data-id");
            
            $.ajax({
                type: "GET",
                url: "/admin/suboptions/" + id,
                dataType: 'json',
                success: function(response) {
                    $('#post_id').val(response.suboption.id);
                    $('#default_title_edit').val(response.suboption.value);
                    $('#default_activate_edit').val(response.suboption.activate);

                    // Select
                    $('#default_select_edit option').each(function () {
                        if ($(this).val() == response.suboption.option_id) {
                            $(this).prop('selected', true);
                        }
                    });


                    $('#editModal').modal('show');
                }, 
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $(".update-city").click(function(){
            let formData = {
                default_select_edit: $("#default_select_edit").val(),
                default_title_edit: $("#default_title_edit").val(),
                default_activate_edit: $("#default_activate_edit").val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            };

            $(".error-message").remove();

            $.ajax({
                type: "PUT",
                url: "/admin/suboptions/" + $("#post_id").val(),
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if(response.errors){
                        $.each(response.errors, function(key, value){
                            $("#"+key+"-edit").after('<div class="text-danger error-message">' + value[0] + '<div/>');
                        });
                    } else {
                        $('#editModal').modal('hide');

                         setTimeout(function() {
                            location.reload();
                        }, 3000);
                    }                    
                }, 
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $(".create-suboptions").click(function(){
            let formData = {
                default_select: $("#default_select").val(),
                default_title: $("#default_title").val(),
                default_activate: $("#default_activate").val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            };

            $(".error-message").remove();

            $.ajax({
                type: "POST",
                url: "/admin/suboptions",
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if(response.errors){
                        $.each(response.errors, function(key, value){
                            $("#"+key).after('<div class="text-danger error-message">' + value[0] + '<div/>');
                        });
                    } else {
                        $('#basicModal').modal('hide');
                        
                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                    }
                }, 
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endsection