<section id="pricing" class="pricing">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>{{__('Lĩnh vực')}}</h2>
            <p>{{__('Lĩnh vực kinh doanh')}}</p>
        </header>

        <div class="row gy-4 root" data-aos="fade-left">
            @if(isset($business_areas))
            @foreach($business_areas as $key => $item)
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="{{$key *= 100}}">
                <div class="box">
                    <h3 style="color: #07d5c0;">{{$item->title}}</h3>
{{--                    <div class="price"><sup>$</sup>0<span> / mo</span></div>--}}
                    <img src="{{$item->image}}" class="img-fluid" alt="{{$item->title}}">
                    <p>{!! $item->description !!}</p>
                </div>
            </div>
            @endforeach
            @endif
        </div>

    </div>
</section>
