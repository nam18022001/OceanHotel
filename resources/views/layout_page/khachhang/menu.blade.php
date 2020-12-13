 <!-- ========== Left Sidebar Start ========== -->
 <div class="left-side-menu">
    <div class="user-box">
            <div class="float-left">
                {{-- @if (Auth::user()->url_img != '') --}}
                {{-- <img src="{{asset('admin_assets/upload')}}/{{Auth::user()->url_img}}" alt="" class="avatar-md rounded-circle"> --}}
                {{-- @else --}}
                <img src="{{asset('admin_assets/upload/user.png')}}" alt="" class="avatar-md rounded-circle">

                {{-- @endif --}}
            </div>
            <div class="user-info">
                <a href="#">{{Auth::guard('loyal_customer')->user()->name}}</a>
                <p class="text-muted m-0">
                    Khách Hàng
                </p>
            </div>
        </div>

<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <li class="menu-title">Menu</li>

        <li>
            <a href="">
                <i class="ti-home"></i>
                <span> Hồ sơ </span>
            </a>
        </li>
        @if (Auth::guard('loyal_customer')->user()->bookingon == 0 && Auth::guard('loyal_customer')->user()->Count_booking > 0)

        <li>
            <a href="javascript: void(0);">
                <i class="ti-light-bulb"></i>
                <span> Đặt phòng lần nữa </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="#">Phòng VIP</a></li>
                <li><a href="#">Phòng thường</a></li>
            </ul>
        </li>
        @endif
        <li>
            <a href="javascript: void(0);">
                <i class="ti-menu-alt"></i>
                <span>  Phòng </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('khach-hang')}}">Phòng đang đặt</a></li>
                <li><a href="{{url('khach-hang-da-dat')}}">Phòng đã đặt</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);">
                <i class="ti-pencil-alt"></i>
                <span>  Cài đặt  </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('cai-dai-khach-hang')}}">Đổi mật khẩu</a></li>
                <li><a href="{{url('logout')}}">Đăng xuất</a></li>
            </ul>
        </li>
    </ul>

</div>
<!-- End Sidebar -->

<div class="clearfix"></div>


</div>
