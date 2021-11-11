@extends('frontend.layout.master')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up" class="aos-init aos-animate" style="color: #012970">{!! $hero_banner->title !!}</h1>
                    <h5 data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">{!! $hero_banner->description !!} </h5>
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
                    <img src="{{$hero_banner->image}}" class="img-fluid" alt="">
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
    <!-- End #main -->
@endsection
