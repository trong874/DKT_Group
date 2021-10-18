<section id="team" class="team">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Team</h2>
            <p>BAN LÃNH ĐẠO</p>
        </header>

        <div class="row gy-4">
            @foreach($leadership_banner as $key => $item)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="{{$key *= 100}}">
                <div class="member">
                    <div class="member-img">
                        <img src="{{$item->image}}" class="img-fluid" alt="">
                        <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>{{$item->title}}</h4>
                        <span>{{$item->description}}</span>
                        <p>{{$item->content}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

</section>
