<section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Blog</h2>
            <p>TIN TỨC</p>
        </header>
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper-wrapper">
                @foreach($news as $item)
                <div class="swiper-slide">
                    <div class="post-box">
                        <div class="post-img"><img src="{{$item->image}}" class="img-fluid" alt=""></div>
                        <span class="post-date">{{date("d-m-Y", strtotime($item->created_at))}}</span>
                        <h3 class="post-title">{{$item->title}}</h3>
                        <a href="{{$item->url}}" class="readmore stretched-link mt-auto"><span>Xem thêm</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                @endforeach
                    <style>
                        .post-box{
                            min-height: 550px;
                        }
                    </style>
            </div>
        </div>
    </div>

</section>
