@extends('layout.mixed')

@section('title', 'Kateqoriya yenilə')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Kateqoriya yeniləmə formu</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if($category->parent_id == null)
                        <div class="mb-3">
                            <label for="default_image">Logo</label>                        
                            <input type="file" id="default_image" name="default_image" class="form-control">
                            @error('default_image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label" for="default_fullname">Kateqoriyanın adı</label>
                        <input type="text" class="form-control" id="default_fullname" placeholder="Məs, Elektronika" name="default_fullname" value="{{ old('name', $category->name) }}">
                        @error('default_fullname') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                         <label for="default_select" class="form-label">Ana kateqoriya (əgər varsa)</label>
                        <select name="default_select" id="default_select" class="form-select">
                            <option value="">— Ana kateqoriya olsun —</option>
                            @foreach($allCategories as $cat)
                                <option value="{{ $cat->id }}" @selected($category->default_select == $cat->id)>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('default_select') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="default_activate" class="form-label">Aktivlik</label>
                        <select class="form-select" id="default_activate" name="default_activate" aria-label="Default select example">
                            <option value="active" @selected($category->activate == 'active')>Aktivləşdir</option>
                            <option value="passive" @selected($category->activate == 'passive')>Deaktiv et</option>
                        </select>
                        @error('default_activate') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    @if($category->parent_id == null)
                    <img src="{{ $category->image === null ? asset('assets/img/icons/empty_img.png') : asset('storage/' . $category->image)}}" width="100" alt="image" class="border mb-3"><br>
                    @endif

                    <button type="submit" class="btn btn-primary">Yenilə</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Geri</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection