<section id="features" class="features">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>{{__('Môi trường')}}</h2>
            <p>{{__('Môi trường làm việc của chúng tôi')}}</p>
        </header>
        <div class="row">
            <div class="col-lg-6">
                <img src="{{$environment_banner[0]->image}}" class="img-fluid" alt="">
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                <div class="row align-self-center gy-4">
                    @foreach($environment_banner as $key => $item)
                        @if($key == 0)
                            @continue
                        @endif
                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>{!! $item->title !!}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div> <!-- / row -->

            <!-- Feature Tabs -->
            <div class="row feture-tabs" data-aos="fade-up">
                <div class="col-lg-6">
                    <h3>{{__("Giới thiệu chung")}}</h3>

                    <!-- Tabs -->
                    <ul class="nav nav-pills mb-3">
                        @foreach($general_intro_banner as $key => $item)
                            @if($key == count($general_intro_banner) - 1)
                                @continue
                            @endif
                            <li>
                                <a class="nav-link @if($key==0) active @endif" data-bs-toggle="pill"
                                   href="#tab{{++$key}}">{{__($item->title)}}</a>
                            </li>
                        @endforeach
                    </ul>
                    <!-- End Tabs -->
                    <!-- Tab Content -->
                    <div class="tab-content">
                        @foreach($general_intro_banner as $key => $item)
                            <div class="tab-pane fade show @if($key==0) active @endif" id="tab{{++$key}}">
                                {!! $item->content !!}
                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="col-lg-6 image_general">
                    @foreach($general_intro_banner as $key => $item)
                        @if($item->title == 'general_intro ảnh')
                            <img src="{{$item->image}}" class="img-fluid" alt=""
                                 style="width: 635px;height: 475px;object-fit: cover">
                        @endif
                    @endforeach
                </div>

            </div><!-- End Feature Tabs -->

            <!-- Feature Icons -->
            <div class="row feature-icons" data-aos="fade-up">
                <h3>{{__('Mục tiêu của chúng tôi')}}</h3>

                <div class="row">
                    <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{$our_target_banner[0]->image}}" class="img-fluid p-4" alt="">
                    </div>
                    <div class="col-xl-8 d-flex content">
                        <div class="row align-self-center gy-4">

                            @foreach($our_target_banner as $key => $item)
                                @if($key == 0)
                                    @continue
                                @endif
                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="{{$key *= 100}}">
                                    <i class="ri-stack-line"></i>
                                    <div>
                                        <h4>{!! $item->title !!}</h4>
                                        <p>{!! $item->description!!}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
            <!-- End Feature Icons -->

        </div>
    </div>
    <style>
        @media (max-width: 480px) {
            #features .row {
                --bs-gutter-x: 0 !important;
            }
        }
    </style>
</section>
