@extends('frontend.layout.master')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up" class="aos-init aos-animate" style="color: #012970">{!! $hero_banner->title !!}</h1>
                    <h5 data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate" style="font-size: 1.2rem;">{!! $hero_banner->description !!} </h5>
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
                    <img src="{{$hero_banner->image}}" class="img-fluid" alt="" style="max-height: 480px">
                </div>
            </div>
        </div>

    </section>
    <main id="main">

        @include('frontend.sections.about')

        @include('frontend.sections.values')

       @include('frontend.sections.counts')

        @include('frontend.sections.features')

       @include('frontend.sections.services')

        @include('frontend.sections.pricing')

        @include('frontend.sections.partner')

        @include('frontend.sections.news')

        @include('frontend.sections.contact')

    </main>
@endsection
