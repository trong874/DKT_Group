<section id="counts" class="counts">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4">
        @foreach($the_number as $item)
            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <img style="max-height: 42px;margin-right: 20px;" src="{{$item->image}}"/>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="{{$item->title}}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>{!! $item->content !!}</p>
                    </div>
                </div>
            </div>
        @endforeach


        </div>

    </div>
</section>
