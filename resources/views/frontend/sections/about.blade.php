<section id="about" class="about">

    <div class="container" data-aos="fade-up">
        <div class="row gx-0">

            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <h3>{{__('Chúng tôi là ai')}}</h3>
                    <h2>{!!$who_are_we_banner->title!!}
                    </h2>
                    <p style="">{!!$who_are_we_banner->description!!}
                    </p>
                    <div class="text-center text-lg-start">
                        <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>{{__('Xem thêm')}}</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                <img src="{!!$who_are_we_banner->image!!}
                    " class="img-fluid" alt="">
            </div>

        </div>
    </div>

</section>
