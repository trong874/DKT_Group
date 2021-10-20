@extends('frontend.layout.master')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up" class="aos-init aos-animate" style="color: #012970">{{__('Chúng tôi đang nỗ lực không ngừng từng ngày để trở thành công ty hàng đầu trong lĩnh vực Thương mại điện tử tại thị trường Đông Nam Á')}}</h1>
                    <h5 data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">{{__('khẳng định vị thế của bản thân trên thị trường quốc tế, hướng tới mục tiêu thúc đẩy sự phát triển của lĩnh vực thương mại điện tử tại Việt Nam nói chung, và lĩnh vực thương mại điện tử xuyên biên giới nói riêng.')}} </h5>
                    <div data-aos="fade-up" data-aos-delay="600" class="aos-init aos-animate">
                        <div class="text-center text-lg-start">
                            <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>{{__('Xem thêm')}}</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section>
    <!-- End Hero -->
    <main id="main">
        <!-- ======= About Section ======= -->
        @include('frontend.sections.about')
        <!-- End About Section -->
        <!-- ======= Values Section ======= -->
        @include('frontend.sections.values')
        <!-- End Values Section -->
        <!-- ======= Counts Section ======= -->
       @include('frontend.sections.counts')
        <!-- End Counts Section -->
        <!-- ======= Features Section ======= -->
        @include('frontend.sections.features')
        <!-- End Features Section -->
        <!-- ======= Services Section ======= -->
       @include('frontend.sections.services')
        <!-- End Services Section -->
        <!-- ======= Pricing Section ======= -->
        @include('frontend.sections.pricing')
        <!-- End Pricing Section -->
        <!-- ======= F.A.Q Section ======= -->
{{--       @include('frontend.sections.faq')--}}
        <!-- End F.A.Q Section -->
        <!-- ======= Portfolio Section ======= -->
{{--      @include('frontend.sections.portfolio')--}}
        <!-- End Portfolio Section -->
        <!-- ======= Testimonials Section ======= -->
      @include('frontend.sections.leadership')
        <!-- End Testimonials Section -->
        <!-- ======= Team Section ======= -->
{{--       @include('display.sections.team')--}}
        <!-- End Team Section -->
        <!-- ======= Clients Section ======= -->
        @include('frontend.sections.partner')
        <!-- End Clients Section -->
        <!-- ======= Recent Blog Posts Section ======= -->
        @include('frontend.sections.news')
        <!-- End Recent Blog Posts Section -->
        <!-- ======= Contact Section ======= -->
        @include('frontend.sections.contact')
        <!-- End Contact Section -->
    </main>
    <style>
        header p {
            text-transform: uppercase;
        }
    </style>
    <!-- End #main -->
@endsection
