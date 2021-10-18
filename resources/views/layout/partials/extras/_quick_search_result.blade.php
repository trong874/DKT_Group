<div class="quick-search-result">
    {{-- Message --}}
    <div class="text-muted d-none">
        No record found
    </div>

    {{-- Section --}}
    <div class="font-size-sm text-primary font-weight-bolder text-uppercase mb-2">
        Kết quả tìm kiếm
    </div>
    <div class="mb-10">
        @if(isset($items))
            @foreach($items as $item)
                <div class="d-flex align-items-center flex-grow-1 mb-2">
                    <div class="symbol symbol-30 bg-transparent flex-shrink-0">
                        <img src="{{$item->image}}" alt=""/>
                    </div>
                    <div class="d-flex flex-column ml-3 mt-2 mb-2">
                        <a href="{{$item->url}}" class="font-weight-bold text-dark text-hover-primary">
                            {!! $item->title !!}
                        </a>
                        <span class="font-size-sm font-weight-bold text-muted">
                by {{$item->user->name}}
                </span>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
