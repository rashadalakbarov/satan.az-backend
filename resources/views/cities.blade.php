@extends('layout.mixed')

@section('title', 'Şəhərlər')

@section('content')
<div class="row">
    <div class="col-12 col-md-4">
        <button type="button" class="btn btn-outline-success mb-4" data-bs-toggle="modal" data-bs-target="#basicModal">Yeni şəhər</button>
    </div>
    
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">Şəhərlərin siyahısı ( {{ $cities->total() }} ədəd)</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap mb-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Şəhər adı</th>
                                <th width="250px">Aksiyonlar</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse($cities as $city)
                                <tr>
                                    <td>{{ $city->name }}</td>

                                    <td>
                                        <button data-id="{{$city->id}}" class="btn btn-primary edit-city"><i class="fa-solid fa-pen me-2"></i>Yenilə</button>
                                        <button data-id="{{$city->id}}" class="btn btn-danger delete-city"><i class="fa-solid fa-trash me-2"></i>Sil</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>Heç bir şəhər qeydə alınmayıb.</tr>
                            @endforelse
                        </tbody>                    
                    </table>                
                </div>
                
                <!-- Custom Pagination for Admin Panel -->
                @if ($cities->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination">

                            {{-- İlk Sayfa --}}
                            <li class="page-item first {{ $cities->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $cities->url(1) }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                            </li>

                            {{-- Önceki Sayfa --}}
                            <li class="page-item prev {{ $cities->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $cities->previousPageUrl() ?? '#' }}"><i class="tf-icon bx bx-chevron-left"></i></a>
                            </li>

                            {{-- Sayfa Numaraları --}}
                            @foreach ($cities->links()->elements[0] as $page => $url)
                                <li class="page-item {{ $page == $cities->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            {{-- Sonraki Sayfa --}}
                            <li class="page-item next {{ !$cities->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $cities->nextPageUrl() ?? '#' }}"><i class="tf-icon bx bx-chevron-right"></i></a>
                            </li>

                            {{-- Son Sayfa --}}
                            <li class="page-item last {{ !$cities->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $cities->url($cities->lastPage()) }}"><i class="tf-icon bx bx-chevrons-right"></i></i></a>
                            </li>

                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Şəhər Yarat</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="title" class="form-label">Şəhər adı</label>
                            <input type="text" id="title" class="form-control" placeholder="Şəhərin adını daxil edin" name="nameBasic" />
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Ləğv et
                    </button>
                    <button type="button" class="btn btn-primary create-city">Yadda saxla</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Şəhər Yenilə</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="title-edit" class="form-label">Şəhər adı</label>
                            <input type="text" id="title-edit" class="form-control" placeholder="Şəhərin adını daxil edin" name="nameBasic" />
                        </div>
                        <input type="hidden" name="" id="post-id">
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

          $(".delete-city").click(function(){
            let id=$(this).attr("data-id");
            
           if(confirm("Silmək istədiyinə əminsən?")){
                $.ajax({
                    type: "DELETE",
                    url: "/admin/cities/" + id,
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

        $(".edit-city").click(function(){
            let id=$(this).attr("data-id");
            
            $.ajax({
                type: "GET",
                url: "/admin/cities/" + id,
                dataType: 'json',
                success: function(response) {
                    $('#post-id').val(response.city.id);
                    $('#title-edit').val(response.city.name);
                    $('#editModal').modal('show');
                }, 
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $(".update-city").click(function(){
            let formData = {
                title: $("#title-edit").val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            };

            $(".error-message").remove();

            $.ajax({
                type: "PUT",
                url: "/admin/cities/" + $("#post-id").val(),
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

        $(".create-city").click(function(){
            let formData = {
                title: $("#title").val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            };

            $(".error-message").remove();

            $.ajax({
                type: "POST",
                url: "/admin/cities",
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