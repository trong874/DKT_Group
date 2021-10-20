<section id="clients" class="team">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>{{__('Đối tác')}}</h2>
            <p>{{__('Đối tác của chúng tôi')}}</p>
        </header>

        <div class="row gy-4">
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100"></div>
            @foreach($partner_banner as $key => $item)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="{{$key *= 100}}">
                <div class="member">
                    <div class="member-img">
                        <img src="{{$item->image}}" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                        <h4>{!! $item->title !!}</h4>
                        <span>{!! $item->description !!}</span>
                        <p>{!! $item->content !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400"></div>
            </div>
    </div>
</section>
