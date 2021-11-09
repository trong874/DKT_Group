<section id="services" class="services">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>{{__('Dịch vụ')}}</h2>
            <p>{{__('Dịch vụ của chúng tôi')}}</p>
        </header>
{{--        <div  >--}}
            <div class="services-in swiper-container" style="overflow: hidden" >
                <div class="swiper-wrapper " >
                    @foreach($my_service as $key => $item )
                        <div class="col-lg-4 col-md-6 swiper-slide" data-aos="fade-up" data-aos-delay="{{$key *= 100}}">
                            <div class="service-box blue">
                                <div class="box">
                                    <img src="{{$item->image}}"/>
                                    <h3>{{$item->title}}</h3>
                                    <p>{!! $item->description !!}</p>
                                    {{--                    <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>--}}
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
{{--        </div>--}}
    </div>
    <style>
        .box > img {
            margin-bottom: 25px;
            max-height: 100px;
            object-fit: cover;
        }
        .root > div > .box {
            height: 100%;
        }
    </style>
</section>
