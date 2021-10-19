@extends('layout.default')
@section('content')
    <form action="{{route("$module.search")}}" method="GET" class="card">
        <div class="card-header">
            <span>{{__('Bộ lọc')}}</span>
        </div>
        <div class="row card-body">
            <div class="col-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-times"></i></span>
                    </div>
                    <input type="text" name="id" class="form-control" placeholder="ID" value="{{$old_data['id'] ?? ''}}">
                </div>
            </div>
            <div class="col-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-times"></i></span>
                    </div>
                    <input type="text" name="title" class="form-control" placeholder="{{__('Tiêu đề')}}" value="{{$old_data['title'] ?? ''}}">
                </div>
            </div>
            <div class="col-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-times"></i></span>
                    </div>
                    <select name="group_id" id="group_id" class="form-control">
                        <option value="">--Group ID--</option>
                        @if(isset($groups))
                            @if(isset($old_data))
                                {{showCategories($groups,$old_data)}}
                            @else
                                {{showCategories($groups)}}
                            @endif
                        @endif
                    </select>
                </div>
            </div>

            <div class="col-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-times"></i></span>
                    </div>
                    @if($module == 'advertisement')
                    <select type="text" name="position" class="form-control">
                        <option value="">--Vị trí--</option>
                        <option @if(isset($old_data))@if($old_data['position']=='my_service')selected @endif @endif>my_service</option>
                        <option  @if(isset($old_data))@if($old_data['position']=='partner_banner')selected @endif @endif>partner_banner</option>
                        <option @if(isset($old_data))@if($old_data['position']=='leadership_banner')selected @endif @endif>leadership_banner</option>
                        <option @if(isset($old_data))@if($old_data['position']=='business_areas')selected @endif @endif>business_areas</option>
                        <option @if(isset($old_data))@if($old_data['position']=='our_value_banner')selected @endif @endif>our_value_banner</option>
                    </select>
                    @else
                        <input type="text" name="position" class="form-control" placeholder="{{__('Vị trí')}}" value="{{$old_data['position'] ?? ''}}">
                    @endif
                </div>
            </div>
            <div class="col-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">{{__('Từ')}}</span>
                    </div>
                    <input type="datetime-local" name="date_form" class="form-control" placeholder="Từ thời gian" value="{{$old_data['date_form'] ?? ''}}">
                </div>
            </div>
            <div class="col-3 mt-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">{{__('Đến')}}</span>
                    </div>
                    <input type="datetime-local" name="date_to" class="form-control" placeholder="đến đến" value="{{$old_data['date_to'] ?? ''}}">
                </div>
            </div>
            <div class="col-3 mt-3"></div>
            <div class="col-3 mt-3"></div>

            <div class="col-3 mt-3">
                <button class="btn btn-success" type="submit">Search</button>
                <button type="reset" class="btn btn-outline-warning">Reset</button>
            </div>
        </div>
    </form>

    <div class="card card-custom m-7">
        <div class="card-header">
            <div class="card-title">
											<span class="card-icon">
												<i class="flaticon2-favourite text-primary"></i>
											</span>
                <h3 class="card-label">HTML(DOM) Sourced Data</h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                <button type="button" class="btn btn-light-danger font-weight-bolder mr-5" data-toggle="modal"
                        data-target="#confirm_delete_all">
                    <i class="far fa-trash-alt"></i>{{__('Xoá lựa chọn')}}
                </button>
                <!--end::Dropdown-->
                <div class="modal fade" id="confirm_delete_all" data-backdrop="static" tabindex="-1" role="dialog"
                     aria-labelledby="staticBackdrop" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                Xác nhận thao tác xóa item đã chọn ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">Close
                                </button>
                                <p class="btn btn-danger font-weight-bold" id="delete_all"
                                   data-url="{{ route('items.destroy_multiple') }}">Xóa</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!--begin::Button-->
                <a href='{{route("$module.create")}}' class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>{{__('Thêm bản ghi')}}</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
                   style="margin-top: 13px !important">
                <thead>
                <tr>
                    <th><input type="checkbox" id="master"></th>
                    <th>ID</th>
                    <th>{{__('Tiêu đề')}}</th>
                    <th>{{__('Danh mục')}}</th>
                    <th>{{__('Ảnh')}}</th>
                    <th>{{__('Vị trí')}}</th>
                    <th>{{__('Thứ tự')}}    </th>
                    <th>{{__('Trạng thái')}}</th>
                    <th>{{__('Thời gian tạo')}}</th>
                    <th>{{__('Thao tác')}}</th>
                </tr>
                </thead>
                <tbody class="data_table">
                @include('backend.components.data_table_items')
                </tbody>
            </table>
            <div class="row" style="float:right">
                {{ $items->links('pagination::default') }}
            </div>
            <!--end: Datatable-->
        </div>
    </div>

    <?php
    function showCategories($categories, $old_data = [], $parent_id = 0, $char = ' ')
    {
        foreach ($categories as $key => $item) {
            // Nếu là chuyên mục con thì hiển thị
            if ($item->parent_id == $parent_id) {

                if ($old_data != []) {
                    if ($old_data['group_id'] == $item->id){
                    echo '<option value="' . $item->id . '" selected>' . $item->id . $char . $item->title . '</option>';
                    }else{
                        echo '<option value="' . $item->id . '">' . $item->id . $char . $item->title . '</option>';
                    }
                } else {
                    echo '<option value="' . $item->id . '">' . $item->id . $char . $item->title . '</option>';
                }
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategories($categories,$old_data, $item->id, $char . '--');
            }
        }
    }
    ?>
@endsection
@section('scripts')

    <script>
        $('#master').on('click', function (e) {
            if ($('#master').is(':checked', true)) {
                $(".sub_chk").prop('checked', true);
            } else {
                $(".sub_chk").prop('checked', false);
            }
        });
        $('#delete_all').on('click', function (e) {
            var allVals = [];
            $(".sub_chk:checked").each(function () {
                allVals.push($(this).attr('data-id'));
            });


            if (allVals.length <= 0) {
                alert("Chưa chọn mục nào !");
            } else {
                var join_selected_values = allVals.join(",");
                $.ajax({
                    url: $(this).data('url'),
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: 'ids=' + join_selected_values,
                    "_token": "{{ csrf_token() }}",
                    success: function (data) {
                        location.reload();
                        if (data['error']) {
                            alert(data['error']);
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });
                $.each(allVals, function (index, value) {
                    $('table tr').filter("[data-row-id='" + value + "']").remove();
                });
            }
        });
        $('#changePaginate').on('input', function () {
            if (e.keyCode == 13) {
                let number = $('#changePaginate').val()
                if (number > 0) {
                    $.ajax({
                        url: '/quan-ly-sp/' + number + '/paginate',
                        method: 'GET',
                        success: function () {
                            window.location.href = '/quan-ly-sp/' + number + '/paginate';
                            console.log(number);
                        }
                    })
                }
            }

        }).on('change', function () {
            let number = $('#changePaginate').val()
            if (number > 0 && number !== null) {
                $.ajax({
                    url: '/quan-ly-sp/' + number + '/paginate',
                    method: 'GET',
                    success: function () {
                        window.location.href = '/quan-ly-sp/' + number + '/paginate';
                        console.log(number)
                    }
                })
            }
        })
    </script>
    <script>
        function disabledEventPropagation(event) {
            if (event.stopPropagation) {
                event.stopPropagation();
            } else if (window.event) {
                window.event.cancelBubble = true;
            }
        }
    </script>
@endsection
