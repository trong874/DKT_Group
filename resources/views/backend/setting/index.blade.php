@extends('layout.default')
@section('content')
    <div class="card">
        <div class="card-header">
            Cấu hình hệ thống
        </div>
        <div class="card-body">
            <div class="example-preview">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home">
																	<span class="nav-icon">
																		<i class="flaticon2-chat-1"></i>
																	</span>
                            <span class="nav-text">Thông tin website</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" aria-controls="profile">
																	<span class="nav-icon">
																		<i class="flaticon2-layers-1"></i>
																	</span>
                            <span class="nav-text">Email</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" aria-controls="contact">
																	<span class="nav-icon">
																		<i class="flaticon2-rocket-1"></i>
																	</span>
                            <span class="nav-text">Mã nhúng script</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content mt-5" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">

                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Tab content
                        2
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Tab content
                        3
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
