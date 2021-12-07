<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <img src="{{asset('media/Logo-DKT-Black.png')}}" alt="">
{{--            <span>DKT</span>--}}
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto " href="/">{{__('Trang chủ')}}</a></li>
                <li><a class="nav-link scrollto" href="#about">{{__('Về chúng tôi')}}</a></li>
                <li><a class="nav-link scrollto" href="#services">{{__('Dự án')}}</a></li>
                <li><a class="nav-link scrollto" href="{{route('news.index')}}">{{__('Hoạt động')}}</a></li>
                <li><a class="nav-link scrollto" href="#contact">{{__('Liên hệ')}}</a></li>
                <li><a class="nav-link scrollto" href="{{route('recruitment.index')}}">{{__('Tuyển dụng')}}</a></li>
                <li class="dropdown">
                    <a href="#" class="logo locale">
                        @if(Session::get('locale')=='vi')
                        <img src="{{asset('assets/img/flag/vietnam.png')}}" alt="">
                        @elseif(Session::get('locale')=='en')
                            <img src="{{asset('assets/img/flag/usa.png')}}" alt="">
                        @else
                            <img src="{{asset('assets/img/flag/vietnam.png')}}" alt="">
                        @endif
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('language','en')}}" class="logo locale">
                                <img src="{{asset('assets/img/flag/usa.png')}}" alt="">
                                English
                            </a>
                        </li>
                        <li>
                            <a href="{{route('language','vi')}}" class="logo locale">
                                <img src="{{asset('assets/img/flag/vietnam.png')}}" alt="">
                                Việt Nam
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
    </div>
    <style>
        .locale {
            width: 0;
        }
        .locale>img{
            width: 25px;
        }
    </style>
</header>
