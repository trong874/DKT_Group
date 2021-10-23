<footer id="footer" class="footer">

{{--    <div class="footer-newsletter">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-lg-12 text-center">--}}
{{--                    <h4>Our Newsletter</h4>--}}
{{--                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6">--}}
{{--                    <form action="" method="post">--}}
{{--                        <input type="email" name="email"><input type="submit" value="Subscribe">--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="/" class="logo d-flex align-items-center">
                        <img src="{{asset('media/Logo-DKT-Black.png')}}" alt="">
{{--                        <span>DKT</span>--}}
                    </a>
                    <p>{{$description}}</p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>{{__('Liên kết hữu ích')}}</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="/">{{__('Trang chủ')}}</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">{{__('Về chúng tôi')}}</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">{{__('Dịch vụ')}}</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">{{__('Điều khoản')}}</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>{{__('Dịch vụ của chúng tôi')}}</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Dịch vụ vận chuyển</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Môi giới thương mại</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Quảng cáo thương mại</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Dịch vụ đào tạo và tư vấn pháp lý và quản lý</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>{{__('Liên hệ với chúng tôi')}}</h4>
                    <p>{!! $address !!}<br>
                        <strong>Phone:</strong>{!! $phone !!}<br>
                        <strong>Email:</strong>{!! $email !!}<br>
                    </p>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
        </div>
    </div>
</footer>
