@extends('layout.default')
@section('content')
    <!--begin::Card-->
    <div class="card card-custom example example-compact m-7">
        <div class="card-header">
            <h3 class="card-title">{{$page_title}}</h3>
        </div>
        <!--begin::Form-->
        <?php
        if (isset($item)){
            $action = route("$module.update",$item);
        }else{
            $action = route("$module.store");
        }
        ?>
        <form class="form" method="POST" action="{{$action}}">
            @if(isset($item))
               @method('PUT')
            @endif
            @csrf
            <div class="card-body">
                <div class="form-group row mt-3">
                    <label class="col-lg-1 col-form-label text-right">Title</label>
                    <div class="col-lg-3">
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{$item->title??null}}" onchange="changeTitleToSlug()" required/>
                        <span class="form-text text-muted">Please enter your Title</span>
                    </div>
                    <input type="hidden" id="slug" name="slug" value="{{$item->slug??null}}">
                    <input type="hidden" name="module" value="{{$item->module??$module}}"/>
                    <label class="col-lg-1 col-form-label text-right">Danh mục</label>
                    <div class="col-lg-3">
                        <select class="form-control" name="group_id" required>
                            <?php
                            echo '<option value="">--không chọn--</option>';
                            if (isset($groups) && isset($item)){
                                showOldCategories($groups,$item);
                            }else{
                                showCategories($groups);
                            }
                            ?>
                        </select>
                        <span class="form-text text-muted">Please enter your parent_id</span>
                    </div>
                    <label class="col-lg-1 col-form-label text-right">Position</label>
                    <div class="col-lg-3">
                        @if($module == 'advertisement' && isset($item))
                            <select type="text" name="position" class="form-control" required>
                                <option value="">--Vị trí--</option>
                                <option @if($item->position=='my_service')selected @endif >my_service</option>
                                <option @if($item->position=='partner_banner')selected @endif >partner_banner</option>
                                <option @if($item->position=='leadership_banner')selected @endif >leadership_banner</option>
                                <option @if($item->position=='business_areas')selected @endif >business_areas</option>
                                <option @if($item->position=='our_value_banner')selected @endif >our_value_banner</option>
                                <option @if($item->position=='hero_banner')selected @endif >hero_banner</option>
                                <option @if($item->position=='who_are_we_banner')selected @endif >who_are_we_banner</option>
                                <option @if($item->position=='environment_banner')selected @endif >environment_banner</option>
                                <option @if($item->position=='general_intro')selected @endif >general_intro</option>
                                <option @if($item->position=='our_target_banner')selected @endif >our_target_banner</option>
                                <option @if($item->position=='the_number')selected @endif >the_number</option>
                            </select>
                        @elseif($module == 'advertisement')
                            <select type="text" name="position" class="form-control" required>
                            <option value="">--Vị trí--</option>
                            <option>my_service</option>
                            <option>partner_banner</option>
                            <option>leadership_banner</option>
                            <option>business_areas</option>
                            <option>our_value_banner</option>
                            <option>hero_banner</option>
                            <option>who_are_we_banner</option>
                            <option>environment_banner</option>
                            <option>general_intro</option>
                            <option>our_target_banner</option>
                            <option>the_number</option>
                            </select>
                        @elseif (isset($item))
{{--                        <input type="text" name="position" id="position" class="form-control" placeholder="Position" value="{{$item->position??null}}" />--}}
                            <select type="text" name="position" id="position" class="form-control" onchange="changeTitleToSlug()" required>
                                <option value="">--Vị trí--</option>
                                <option @if($item->position=='news')selected @endif value="news">Blog</option>
                                <option @if($item->position=='recuitment')selected @endif value="recuitment">Tuyển dụng</option>
                            </select>
                        @else
                            <select type="text" name="position" id="position" class="form-control" onchange="changeTitleToSlug()" required>
                                <option value="">--Vị trí--</option>
                                <option>news</option>
                                <option>recuitment</option>
                            </select>
                        @endif
                        <span class="form-text text-muted">Please enter your Position</span>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-lg-1 col-form-label text-right">Description</label>
                    <div class="col-lg-11">
                        <textarea name="description" id="description_input" required>{{$item->description??null}}</textarea>
                        <script>
                            // Replace the <textarea id="editor1"> with a CKEditor 4
                            // instance, using default configuration.
                            CKEDITOR.replace('description_input');
                        </script>
                    </div>
                </div>
                <div class="separator separator-dashed my-10"></div>

                <div class="form-group row mt-3">
                    <label class="col-lg-1 col-form-label text-right">Content</label>
                    <div class="col-lg-11">
                        <textarea name="content" id="content_input" required>{{$item->content??null}}</textarea>
                        <script>
                            // Replace the <textarea id="editor1"> with a CKEditor 4
                            // instance, using default configuration.
                            var editor = CKEDITOR.replace('content_input', {
                                filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
                                filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                filebrowserWindowWidth: '1000',
                                filebrowserWindowHeight: '700'
                            });
                            CKFinder.setupCKEditor(editor);
                        </script>
                    </div>
                </div>
                <div class="separator separator-dashed my-10"></div>
                <input type="hidden" name="author_id" value="{{ Auth::user()->id}}">
                <div class="form-group row mt-3">
                    <label class="col-lg-1 col-form-label text-right">Ảnh</label>
                    <!-- end: Example Code-->
                    <div class="card card-custom card-collapse col-lg-1" data-card="true" id="kt_card_1" style="border: 1px #ccc solid">
                        <div class="card-toolbar" style="position: absolute;top:0;right: 0;margin: 5px">
                            <i aria-hidden="true" class="ki ki-close" onclick="deleteImage()"></i>
                        </div>
                        <div class="card-img">
                            <img
                                src="{{$item->image??'https://fermasenoval.ru/wp-content/uploads/2018/12/empty-photo.jpg'}}"
                                id="image-display" onclick="selectFileWithCKFinder('image-display')"
                                style="height: 100%;width: 100%;padding: 15px">
                            <input type="hidden" name="image" id="image_path" value="{{$item->image??null}}">
                        </div>
                    </div>
                    <label class="col-lg-1 col-form-label text-right">URL</label>
                    <div class="col-lg-3">
                        <input type="text" name="url" class="form-control" id="url" placeholder="URL" value="{{$item->url??''}}"/>
                        <span class="form-text text-muted">Please enter URL</span>
                    </div>

                    <label class="col-lg-1 col-form-label text-right">Status:</label>
                    <label >hoạt động:</label>
                <input type="radio" id="checked_true" name="status" value="1"  @if(isset($item)) @if($item->status == 1) checked @endif @else checked @endif>
                <br>
                <label class="ml-5">không hoạt động:</label>
                <input type="radio" id="checked_false" name="status" value="0"  @if(isset($item)) @if($item->status == 0) checked @endif @endif>

            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-5"></div>
                    <div class="col-lg-7">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
            </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Card-->
    <?php
    function showOldCategories($categories,$current_data ,$parent_id = 0, $char = ' ')
    {
        foreach ($categories as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item->parent_id == $parent_id)
            {
                if ($current_data->groups[0]->id == $item->id){
                    echo '<option value="'.$item->id.'" selected>'.$item->id.$char.$item->title.'</option>';
                }
                else{
                    echo '<option value="'.$item->id.'">'.$item->id.$char.$item->title.'</option>';
                }
                // Xử lý hiển thị chuyên mục

                // Xóa chuyên mục đã lặp
//                unset($categories[$key]);

                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showOldCategories($categories,$current_data, $item->id, $char.'---');
            }
        }
    }

    function showCategories($categories,$parent_id = 0, $char = ' ')
    {
        foreach ($categories as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item->parent_id == $parent_id)
            {

                    echo '<option value="'.$item->id.'">'.$item->id.$char.$item->title.'</option>';

                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategories($categories,$item->id, $char.'---');
            }
        }
    }
    ?>
@endsection
@section('scripts')
    <script>
        function deleteImage() {
            document.getElementById('image-display').src = 'https://fermasenoval.ru/wp-content/uploads/2018/12/empty-photo.jpg';
            document.getElementById('image_path').value = '';
        }

        function selectFileWithCKFinder(elementId) {
            CKFinder.modal({
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function (finder) {
                    finder.on('files:choose', function (evt) {
                        var file = evt.data.files.first();
                        var output = document.getElementById(elementId);
                        output.src = file.getUrl();
                        document.getElementById('image_path').value = file.getUrl();
                    });

                    finder.on('file:choose:resizedImage', function (evt) {
                        var output = document.getElementById(elementId);
                        output.value = evt.data.resizedUrl;
                    });
                }
            });
        }
    </script>
    <script>
        function changeTitleToSlug() {
            var title, slug;

            //Lấy text từ thẻ input title
            title = document.getElementById("title").value;

            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('slug').value = slug;
            let position = $('#position').val();
            document.getElementById('url').value  = "{{url('')}}/"+position+"/"+ slug;
        }
    </script>
@endsection
