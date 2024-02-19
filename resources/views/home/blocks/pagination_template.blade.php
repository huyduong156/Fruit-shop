
@if ($paginator->hasPages())
<div class="row">
    <div class="col-sm-12 col-custom">
        <div class="toolbar-bottom mt-30">
            <nav class="pagination pagination-wrap mb-10 mb-sm-0">
                    <!-- Pagination -->    
                        <ul class="pagination">
                
                            {{-- Previous Page Link --}}
                            @if ($paginator->onFirstPage())
                                <li class="disabled">
                                    <span><i class="fa-solid fa-backward-fast"></i></span>
                                </li>
                                <li class="disabled">
                                    <span><i class="fa-solid fa-caret-left"></i></span>
                                </li>                
                            @else
                                <li>
                                    <a href="{{ $paginator->toArray()['first_page_url'] }}">
                                        {{-- Trang đầu --}}
                                        <span><i class="fa-solid fa-backward-fast"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $paginator->previousPageUrl() }}">
                                        {{-- Trang trước --}}
                                        <span><i class="fa-solid fa-caret-left"></i></span>
                                    </a>
                                </li>
                            @endif
                
                            {{-- Pagination Elements --}}
                            @foreach ($elements as $element)
                                {{-- Array Of Links --}}
                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $paginator->currentPage())
                                            <li class="active"><span>{{ $page }}</span></li>
                                        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                                        @elseif ($page == $paginator->lastPage() - 1)
                                            <li class="disabled"><span><i class="fa fa-ellipsis-h"></i></span></li>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                
                            {{-- Next Page Link --}}
                            @if ($paginator->hasMorePages())
                                <li>
                                    <a href="{{ $paginator->nextPageUrl() }}">
                                        {{-- trang sau --}}
                                        <span><i class="fa-solid fa-caret-right"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $paginator->toArray()['last_page_url'] }}">
                                        {{-- Trang cuối --}}
                                        <span><i class="fa-solid fa-forward-fast"></i></span>
                                    </a>
                                </li>
                            @else
                                <li class="disabled">
                                    <span>
                                        <i class="fa-solid fa-caret-right"></i>
                                    </span>
                                </li>
                                <li class="disabled">
                                    <span><i class="fa-solid fa-forward-fast"></i></span>
                                </li>
                            @endif
                        </ul>    
                    <!-- Pagination -->
                </nav>
                {{-- <p class="desc-content text-center text-sm-right">Showing 1 - 12 of 34 result</p> --}}
            </div>
        </div>
    </div>
@endif
@push('css')
<style>
    ul.pagination > li.active,ul.pagination > li.active{
        color: #E98CA2
    }
    ul.pagination .disabled{
        opacity: 0.1;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
@endpush