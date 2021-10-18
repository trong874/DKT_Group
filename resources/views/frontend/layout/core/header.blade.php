<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <img src="{{asset('assets/img/logo.png')}}" alt="">
            <span>DKT</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto " href="/">Trang chủ</a></li>
                <li><a class="nav-link scrollto" href="#about">Về chúng tôi</a></li>
                <li><a class="nav-link scrollto" href="#services">Dịch vụ</a></li>
                <li><a class="nav-link scrollto" href="{{route('news.index')}}">Tin tức</a></li>
                <li><a class="nav-link scrollto" href="#contact">Liên hệ</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
    </div>
</header>
