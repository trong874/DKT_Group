<section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Blog</h2>
            <p>{{__('Tin tức')}}</p>
        </header>
        <div class="row">
            @foreach($news as $item)
            <div class="col-lg-4">
                <div class="post-box">
                    <div class="post-img"><img src="{{$item->image}}" class="img-fluid" alt="" style="width: 416px;height: 312px;object-fit: cover"></div>
                    <span class="post-date">{{$item->created_at}}</span>
                    <h3 class="post-title">{!! $item->title !!}</h3>
                    <a href="{{$item->url}}" class="readmore stretched-link mt-auto"><span>{{__('Xem thêm')}}</span><i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>
