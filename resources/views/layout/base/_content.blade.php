{{-- Content --}}
@if (config('layout.content.extended'))
    @yield('content')
@else
    <div class="d-flex flex-column-fluid">
        <div class="content-container" style="max-width: 100%;width: 100%">
            @yield('content')
        </div>
    </div>
@endif
