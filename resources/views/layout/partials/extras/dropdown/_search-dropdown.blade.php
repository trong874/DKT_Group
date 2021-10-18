<div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
    {{-- Form --}}
    <form method="get" class="quick-search-form">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    {{ Metronic::getSVG("media/svg/icons/General/Search.svg", "svg-icon-lg") }}
                </span>
            </div>
            <input type="text" class="form-control" placeholder="Search..." onkeyup="filter(this.value)"/>
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="quick-search-close ki ki-close icon-sm text-muted"></i>
                </span>
            </div>
        </div>
    </form>

    {{-- Scroll --}}
    <div class="quick-search-wrapper scroll" data-scroll="true" data-height="325" data-mobile-height="200">
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function filter(keyword) {
            $.ajax({
                method:"GET",
                url:'{{route('items.filter')}}',
                data: {keyword},
                success:function (res) {
                    $('.data_table').html('');
                    $('.data_table').append(res);
                }
            })
        }
    </script>
