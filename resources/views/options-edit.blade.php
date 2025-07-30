@extends('layout.mixed')

@section('title', 'Özəllik yeniləmə')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Özəllik yeniləmə formu</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.options.update', $option->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label" for="default_title">Özəlliyin adı</label>
                        <input type="text" class="form-control" id="default_title" placeholder="Məs, Məhsulun vəziyyəti" name="default_title" value="{{old('default_title', $option->title)}}">
                        @error('default_title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="default_select" class="form-label">Kateqoriya seç</label>
                        <select class="form-select" id="default_select" name="default_select">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" @selected($option->category_id == $cat->id)>{{ $cat->name }}</option>
                                
                                @if($cat->children && $cat->children->count())
                                    @foreach($cat->children as $child)
                                        <option value="{{ $child->id }}" @selected($option->category_id == $child->id)">
                                            — {{ $child->name }}
                                        </option>
                                    @endforeach
                                @endif
                            @endforeach
                        </select>
                        @error('default_select') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="default_type" class="form-label">Özəlliyin tipi</label>
                        <select class="form-select" id="default_type" name="default_type">
                            <option value="text" @selected($option->type === 'text')>Mətn tipli</option>
                            <option value="select" @selected($option->type === 'select')>Çoxlu seçim</option>
                            <option value="check" @selected($option->type === 'check')>Onaylı seçim</option>
                        </select>
                        @error('default_type') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="default_required" class="form-label">Özəlliyin vacibliyi</label>
                        <select class="form-select" id="default_required" name="default_required">
                            <option value="1" @selected($option->required == 1)>Vacib</option>
                            <option value="2" @selected($option->required == 2)>Vacib deyil</option>
                        </select>
                        @error('default_required') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="default_activate" class="form-label">Aktivlik</label>
                        <select class="form-select" id="default_activate" name="default_activate">
                            <option value="active" @selected($option->activate === 'active')>Aktivləşdir</option>
                            <option value="passive" @selected($option->activate === 'passive')>Deaktiv et</option>
                        </select>
                        @error('default_activate') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Yenilə</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection