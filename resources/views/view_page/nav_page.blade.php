 <!-- Navbar -->
 <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
    <!-- Text Logo - Use this if you don't have a graphic logo -->
    <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Aria</a> -->

    <!-- Image Logo -->
    {{-- <a class="navbar-brand logo-image" href="index.html"><img src="{{asset('page_assets/images/logo.svg')}}" alt="alternative"></a> --}}

    <!-- Mobile Menu Toggle Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-awesome fas fa-bars"></span>
        <span class="navbar-toggler-awesome fas fa-times"></span>
    </button>
    <!-- end of mobile menu toggle button -->

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#header">Trang chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#intro">Giới thiệu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#services">Phòng VIP</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#callMe">Chọn phòng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#projects">Check In</a>
            </li>

            <!-- Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle page-scroll" href="#about" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Về chúng tôi</a>

            </li>
            <!-- end of dropdown menu -->

            <li class="nav-item">
                <a class="nav-link page-scroll" href="#contact">Phản hồi</a>
            </li>
            @if (Auth::guard('loyal_customer')->check())
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle page-scroll" href="javascript:void(0)" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Xin chào, {{Auth::guard('loyal_customer')->user()->name}}</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"><span class="item-text">Đặt phòng</span></a>
                    <a class="dropdown-item" href="{{ url('khach-hang')}}"><span class="item-text">Lịch sử đặt phòng</span></a>
                    <div class="dropdown-items-divide-hr"></div>
                    <a class="dropdown-item" href="javascript:void(0)"><span class="item-text">Profile</span></a>
                    <a class="dropdown-item" href="{{url('logout')}}"><span class="item-text">Đăng xuất</span></a>
                </div>
            </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link page-scroll" href="{{url('login')}}">Đăng nhập</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('regis')}}"><span class="item-text">Đăng Ký</span></a>

                    </div>
                </li>
            @endif

        </ul>
        <span class="nav-item social-icons">
            <span class="fa-stack">
                <a href="#your-link">
                    <span class="hexagon"></span>
        <i class="fab fa-facebook-f fa-stack-1x"></i>
        </a>
        </span>
        <span class="fa-stack">
                <a href="#your-link">
                    <span class="hexagon"></span>
        <i class="fab fa-twitter fa-stack-1x"></i>
        </a>
        </span>
        </span>
    </div>
</nav>
<!-- end of navbar -->
<!-- end of navbar -->
