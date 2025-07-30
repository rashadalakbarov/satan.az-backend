@extends('layout.mixed')

@section('title', 'Əsas Özəlliklər')

@section('content')
<div class="row">
    <div class="col-12">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-4">
        <a href="{{route('admin.options.create')}}" class="btn btn-outline-success mb-4">Yeni özəllik</a>
        <a href="{{route('admin.suboptions.index')}}" class="btn btn-outline-primary mb-4">Alt özəlliklər</a>
    </div>
    
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">Özəlliklərin siyahısı</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap mb-4">
                    @if($options->total() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kateqoriya</th>
                                <th>Özəlliyin adı</th>
                                <th>Tip</th>
                                <th>Aktivlik</th>
                                <th width="250px">Aksiyonlar</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">                            
                                @foreach($options as $option)
                                    <tr>
                                        <td>
                                            @if($option->category && $option->category->parent)
                                                {{ $option->category->parent->name }} / {{ $option->category->name }}
                                            @elseif($option->category)
                                                {{ $option->category->name }}
                                            @else
                                                —
                                            @endif
                                        </td>
                                        <td>{{ $option->title }}</td>
                                        <td>{{ $option->type_text }}</td>

                                        <td>
                                            <span class="badge bg-label-{{ 
                                                $option->activate === 'active' ? 'success' : 'info'}} me-1">
                                                {{ $option->activate_text }}
                                            </span>
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.options.edit', $option->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen me-2"></i>Yenilə</a>

                                            <form action="{{ route('admin.options.destroy', $option->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash me-2"></i>Sil</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>  
                    @else
                        <div class="alert alert-info" role="alert">Heç bir özəllik qeydə alınmayıb.</div>
                    @endif              
                </div>
                
                <!-- Custom Pagination for Admin Panel -->
                @if ($options->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination">

                            {{-- İlk Sayfa --}}
                            <li class="page-item first {{ $options->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $options->url(1) }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                            </li>

                            {{-- Önceki Sayfa --}}
                            <li class="page-item prev {{ $options->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $options->previousPageUrl() ?? '#' }}"><i class="tf-icon bx bx-chevron-left"></i></a>
                            </li>

                            {{-- Sayfa Numaraları --}}
                            @foreach ($options->links()->elements[0] as $page => $url)
                                <li class="page-item {{ $page == $options->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            {{-- Sonraki Sayfa --}}
                            <li class="page-item next {{ !$options->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $options->nextPageUrl() ?? '#' }}"><i class="tf-icon bx bx-chevron-right"></i></a>
                            </li>

                            {{-- Son Sayfa --}}
                            <li class="page-item last {{ !$options->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $options->url($options->lastPage()) }}"><i class="tf-icon bx bx-chevrons-right"></i></i></a>
                            </li>

                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection