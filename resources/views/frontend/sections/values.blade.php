<section id="values" class="values">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>{{__('Giá trị của chúng tôi')}}</h2>
            <p>{{__('Lý do chọn chúng tôi')}}</p>
        </header>

        <div class="row">
            @if(isset($our_value_banner))
                @foreach($our_value_banner as $key => $item)
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="box" data-aos="fade-up" data-aos-delay="{{$key *= 200}}">
                    <img src="{{$item->image}}" class="img-fluid" style="padding: 0px 0px;" alt="">
                    <h3>{{$item->title}}</h3>
                    <p>{!! $item->description !!}</p>
                </div>
            </div>
                @endforeach
            @endif
        </div>

    </div>

</section>
