@extends('layout.mixed')

@section('title', 'Bütün Kateqoriyalar')

@section('content')
<div class="row">
    <div class="col-12 col-md-4">
        <a href="{{route('admin.categories.create')}}" class="btn btn-outline-success mb-4">Yeni kateqoriya</a>
    </div>
    
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">Kateqoriyaların siyahısı</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap mb-4">
                    @if($categories->total() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kateqoriyanın adı</th>
                                <th>Kateqoriyanın növü</th>
                                <th>Aktivlik</th>
                                <th width="250px">Aksiyonlar</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">                            
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>

                                        <td>{{ $category->parent_id === null ? 'Ana kateqoriya' : '' }}</td>

                                        <td>
                                            <span class="badge bg-label-{{ 
                                                $category->activate === 'active' ? 'success' : 'info'}} me-1">
                                                {{ $category->activate_text }}
                                            </span>
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen me-2"></i>Yenilə</a>

                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash me-2"></i>Sil</button>
                                            </form>
                                        </td>
                                    </tr>

                                     @foreach($category->children as $child)
                                        <tr>
                                            <td>— {{ $child->name }}</td>
                                            <td>Alt kateqoriya</td>
                                            <td>
                                                <span class="badge bg-label-{{ $child->activate === 'active' ? 'success' : 'info' }} me-1">
                                                    {{ $child->activate_text }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.categories.edit', $child->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen me-2"></i>Yenilə</a>
                                                
                                                <form action="{{ route('admin.categories.destroy', $child->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash me-2"></i>Sil</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                        </tbody>
                    </table>  
                    @else
                        <div class="alert alert-info" role="alert">Heç bir kateqoriya qeydə alınmayıb.</div>
                    @endif              
                </div>
                
                <!-- Custom Pagination for Admin Panel -->
                @if ($categories->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination">

                            {{-- İlk Sayfa --}}
                            <li class="page-item first {{ $categories->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $categories->url(1) }}"><i class="tf-icon bx bx-chevrons-left"></i></a>
                            </li>

                            {{-- Önceki Sayfa --}}
                            <li class="page-item prev {{ $categories->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $categories->previousPageUrl() ?? '#' }}"><i class="tf-icon bx bx-chevron-left"></i></a>
                            </li>

                            {{-- Sayfa Numaraları --}}
                            @foreach ($categories->links()->elements[0] as $page => $url)
                                <li class="page-item {{ $page == $categories->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            {{-- Sonraki Sayfa --}}
                            <li class="page-item next {{ !$categories->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $categories->nextPageUrl() ?? '#' }}"><i class="tf-icon bx bx-chevron-right"></i></a>
                            </li>

                            {{-- Son Sayfa --}}
                            <li class="page-item last {{ !$categories->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $categories->url($categories->lastPage()) }}"><i class="tf-icon bx bx-chevrons-right"></i></i></a>
                            </li>

                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection