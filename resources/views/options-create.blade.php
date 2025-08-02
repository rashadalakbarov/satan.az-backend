@extends('layout.mixed')

@section('title', 'Özəllik yarat')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Yeni özəllik formu</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.options.store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="default_title">Özəlliyin adı</label>
                        <input type="text" class="form-control @error('default_title') is-invalid @enderror" id="default_title" placeholder="Məs, Məhsulun vəziyyəti" name="default_title" value="{{old('default_title')}}">
                        @error('default_title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="default_select" class="form-label">Kateqoriya seç</label>
                        <select class="form-select @error('default_select') is-invalid @enderror" id="default_select" name="default_select" aria-label="Default select example">
                            @foreach($categories as $cat)
                                <optgroup label="{{ $cat->name }}">
                                    @if($cat->children && $cat->children->count())
                                        @foreach($cat->children as $child)
                                            <option value="{{ $child->id }}">— {{ $child->name }}</option>
                                        @endforeach
                                    @endif
                                </optgroup>
                            @endforeach
                        </select>
                        @error('default_select') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="default_type" class="form-label">Özəlliyin tipi</label>
                        <select class="form-select @error('default_type') is-invalid @enderror" id="default_type" name="default_type" aria-label="Default select example">
                            <option value="text">Mətn tipli</option>
                            <option value="select">Çoxlu seçim</option>
                            <option value="check">Onaylı seçim</option>
                        </select>
                        @error('default_type') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="default_required" class="form-label">Özəlliyin vacibliyi</label>
                        <select class="form-select @error('default_required') is-invalid @enderror" id="default_required" name="default_required" aria-label="Default select example">
                            <option value="1">Vacib</option>
                            <option value="2">Vacib deyil</option>
                        </select>
                        @error('default_required') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="default_activate" class="form-label">Aktivlik</label>
                        <select class="form-select @error('default_activate') is-invalid @enderror" id="default_activate" name="default_activate" aria-label="Default select example">
                            <option selected value="active">Aktivləşdir</option>
                            <option value="passive">Deaktiv et</option>
                        </select>
                        @error('default_activate') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Yarat</button>
                    <a href="{{ route('admin.options.index') }}" class="btn btn-secondary">Geri</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection