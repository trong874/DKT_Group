@php
	$direction = config('layout.extras.user.offcanvas.direction', 'right');
@endphp
 {{-- User Panel --}}
<div id="kt_quick_user" class="offcanvas offcanvas-{{ $direction }} p-10">
	{{-- Header --}}
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
		<h3 class="font-weight-bold m-0">
			User Profile
			<small class="text-muted font-size-sm ml-2">12 messages</small>
		</h3>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
			<i class="ki ki-close icon-xs text-muted"></i>
		</a>
	</div>

	{{-- Content --}}
    <div class="offcanvas-content pr-5 mr-n5">
		{{-- Header --}}
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <div class="symbol-label" id="avatar_user" style="background-image:url('{{Auth::user()->image_path ?? 'https://www.tenforums.com/geek/gars/images/2/types/thumb_15951118880user.png'}}')" onclick="selectFileWithCKFinder(this.id)"></div>
				<i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
					{{Auth::user()->name}}
				</a>
                <div class="text-muted mt-1">
                    PHP Developer
                </div>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
								{{ Metronic::getSVG("media/svg/icons/Communication/Mail-notification.svg", "svg-icon-lg svg-icon-primary") }}
							</span>
                            <span class="navi-text text-muted text-hover-primary">{{Auth::user()->email}}</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>

		{{-- Separator --}}
		<div class="separator separator-dashed mt-8 mb-5"></div>

		{{-- Nav --}}
		<div class="navi navi-spacer-x-0 p-0">
		    {{-- Item --}}
            <form method="POST"  action="{{route('logout')}}">
                @csrf
		    <button type="submit" class="navi-item" style="border: none;background-color: rgba(0,0,0,0)">
		        <div class="navi-link">
					<div class="symbol symbol-40 bg-light mr-3">
						<div class="symbol-label">
							{{ Metronic::getSVG("media/svg/icons/Communication/Outgoing-box.svg", "svg-icon-md svg-icon-primary") }}
						</div>
				   	</div>
		            <div class="navi-text">
		                <div class="font-weight-bold">
		                    Sigout
		                </div>
		                <div class="text-muted">
                            Log out of your account
		                </div>
		            </div>
		        </div>
		    </button>
            </form>
		</div>
    </div>
</div>
<script>
    function deleteImage(elementId) {
        document.getElementById(elementId).style = 'background-image:url(https://www.tenforums.com/geek/gars/images/2/types/thumb_15951118880user.png)'
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
                    output.style = 'background-image:url('+ file.getUrl() +')';
                    $.ajax({
                        method:"POST",
                        url: '{{route('user.change_avatar')}}',
                        data: {
                            '_token': '{{csrf_token()}}',
                            'image_path': file.getUrl(),
                        },
                        success: function (res) {
                            console.log(res)
                        }
                    })
                });

                finder.on('file:choose:resizedImage', function (evt) {
                    var output = document.getElementById(elementId);
                    output.value = evt.data.resizedUrl;
                });
            }
        });
    }
</script>
