<section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>{{__('Liên hệ')}}</h2>
            <p>{{__('Liên hệ với chúng tôi')}}</p>
        </header>

        <div class="row gy-4">

            <div class="col-lg-6">

                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-geo-alt"></i>
                            <h3>{{__('Địa chỉ')}}</h3>
                            <p>{!! $address !!}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-telephone"></i>
                            <h3>{{__('Gọi cho chúng tôi')}}</h3>
                            <p>{!! $phone !!}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-envelope"></i>
                            <h3>Email</h3>
                            <p>{!! $email !!}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-clock"></i>
                            <h3>{{__('Mở cửa')}}</h3>
                            <p>Thứ 2 - Thứ 6<br>8:00 - 18:00</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <form action="forms/contact.php" method="post" class="php-email-form">
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="{{__('Tên của bạn')}}" required>
                        </div>

                        <div class="col-md-6 ">
                            <input type="email" class="form-control" name="email" placeholder="{{__('Email của bạn')}}" required>
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="{{__('Tiêu đề')}}" required>
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="{{__('Nội dung')}}" required></textarea>
                        </div>

                        <div class="col-md-12 text-center">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>

                            <button type="submit">{{__('Gửi tin nhắn')}}</button>
                        </div>

                    </div>
                </form>

            </div>

        </div>

    </div>

</section>
