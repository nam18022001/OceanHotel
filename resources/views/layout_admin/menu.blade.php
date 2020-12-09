 <!-- ========== Left Sidebar Start ========== -->
 <div class="left-side-menu">
    <div class="user-box">
            <div class="float-left">
                @if (Auth::user()->url_img != '')
                <img src="{{asset('admin_assets/upload')}}/{{Auth::user()->url_img}}" alt="" class="avatar-md rounded-circle">
                @else
                <img src="{{asset('admin_assets/upload/user.png')}}" alt="" class="avatar-md rounded-circle">

                @endif
            </div>
            <div class="user-info">
                <a href="#">{{Auth::user()->name}}</a>
                <p class="text-muted m-0">
                    @if (Auth::user()->position == 1)
                        {{'Quản lý'}}
                    @else
                        {{'Nhân viên'}}
                    @endif
                </p>
            </div>
        </div>

<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <li class="menu-title">Menu</li>

        <li>
            <a href="{{url('quanly/dashboard')}}">
                <i class="ti-home"></i>
                <span> Trang chủ </span>
            </a>
        </li>



        <li>
            <a href="javascript: void(0);">
                <i class="ti-pencil-alt"></i>
                <span>  Khách hàng  </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="forms-general.html">Khách hàng đặt phòng</a></li>
                <li><a href="forms-advanced.html">Khách hàng đang ở</a></li>
                <li><a href="forms-advanced.html">Khách hàng thân quen</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="ti-light-bulb"></i>
                <span> Đặt phòng </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="components-range-slider.html">Phòng VIP</a></li>
                <li><a href="components-icons.html">Phòng thường</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="ti-menu-alt"></i>
                <span>  Phòng </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="tables-basic.html">Phòng đã đặt</a></li>
                <li><a href="tables-advanced.html">Phòng đang ở</a></li>
                <li><a href="tables-advanced.html">Phòng còn trống</a></li>
            </ul>
        </li>

        <li>
            <a href="typography.html">
                <i class="ti-spray"></i>
                <span> Thuế </span>
            </a>
        </li>
        @if (Auth::user()->position == 1)


        <li>
            <a href="javascript: void(0);">
                <i class="ti-paint-bucket"></i>
                <span class="menu-arrow"></span>

                <span> Nhân viên khách sạn </span>

            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('quanly/danh-sach-nhan-vien')}}">Danh sách nhân viên</a></li>
                <li><a href="{{url('quanly/them-nhan-vien')}}">Thêm nhân viên</a></li>
            </ul>
        </li>
        @endif


        <li>
            <a href="charts.html">
                <i class="ti-pie-chart"></i>
                <span>  Đánh giá  </span>
                <span class="badge badge-primary float-right">5</span>
            </a>
        </li>

        <li>
            <a href="maps.html">
                <i class="ti-location-pin"></i>
                <span> Địa điểm </span>
            </a>
        </li>


    </ul>

</div>
<!-- End Sidebar -->

<div class="clearfix"></div>


</div>
