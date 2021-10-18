<section id="testimonials" class="testimonials">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Team</h2>
            <p>Ban lãnh đạo công ty</p>
        </header>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper-wrapper">
                @foreach($leadership_banner as $key => $item)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>{!! $item->content !!}</p>
                            <div class="profile mt-auto">
                                <img
                                    src="{{$item->image}}"
                                    class="testimonial-img" alt="">
                                <h3>{{$item->title}}</h3>
                                <h4>{!! $item->description !!}</h4>
                            </div>
                        </div>
                    </div>
                    <!-- End testimonial item -->
                 @endforeach
        </div>
        </div>
</section>
