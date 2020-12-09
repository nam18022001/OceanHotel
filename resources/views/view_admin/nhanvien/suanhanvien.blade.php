@extends('layout_admin.index')
@section('title')
    {{'Sửa nhân viên '}}{{$user->name}}
@endsection
@section('content')
@if (Auth::user()->position == 1)
@if ($user->position == 3 || $user->position == 4)

@section('css')
    <style>
        .themnhanvien{
            margin: auto;
        }
        .display-password{
            visibility: hidden;
        }
        input[type="email"], input[type="text"], input[type="tel"], input[type="file"], input[type="password"] {
            border: none;
            border-bottom: 2px solid rgb(14, 160, 218);
        }
        input[type="radio"]{
            visibility: hidden;
        }
        .button.selected{
        background-color:rgb(12, 205, 231);
        color: white;
        }
    </style>
@endsection
<div class="col-lg-8 themnhanvien">
    @if (count($errors) > 0)
        @foreach ($errors->all() as $value)
            <div class="alert alert-danger">
                {{$value}}
            </div>
        @endforeach
    @endif
    @if (session('thongbaoimg'))
        <div class="alert alert-danger">
            {{session('thongbaoimg')}}
        </div>
    @endif
    <div class="mt-5">
        <h4 class="header-title mb-3">Sửa nhân viên {{$user->name}}</h4>

        <form class="form-horizontal mt-3" action="{{url('quanly/sua-nhan-vien')}}/{{$user->id}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="name" class="col-md-3 control-label">Họ Tên</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="name" name='name' placeholder="Nhập Họ Tên" value="{{$user->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-3 control-label">Email</label>
                <div class="col-md-9">
                    <input type="email" class="form-control" id="email" name='email' placeholder="Nhập Email" value="{{$user->email}}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-md-3 control-label">Số điện thoại</label>
                <div class="col-md-9">
                    <input type="tel" class="form-control" id="phone" name='phone' placeholder="Nhập Số điện thoại" value="{{$user->phone}}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="quequan" class="col-md-3 control-label">Nơi ở</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="quequan" name='quequan' placeholder="Nhập thành phố đang sống" value="{{$user->address}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="avatar" class="col-md-3 control-label">Upload avater</label>

                <div class="col-md-9">
                    <input type="file" class="form-control" id="avatar" name="file">
                </div>
            </div>
                <div class="form-group row">
                    <label for="avatar" class="col-md-3 control-label">Ảnh đại diện</label>
                    <div class="col-md-9">
                        @if ($user->url_img != '')
                        <img  src="{{asset('admin_assets/upload')}}/{{$user->url_img}}" width="30%" alt="">
                        @else
                        {{'Không có ảnh đại diện'}}
                        @endif

                    </div>
            </div>
                <div class="form-group row display-password" id="display-password">
                    <label for="password" class="col-md-3 control-label">Mật khẩu</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name='password'>
                    </div>
                </div>
            @if ($user->position != 1)
            <div class="form-group row justify-content-end">
                <label class="col-md-3 control-label">Chức vụ</label>
                <div class="col-md-9">
                    <div class="checkbox-info">
                        <input id="radio1" type="radio" value="1"
                        @if ($user->position == 1)
                            {{'checked'}}

                        @endif
                        name="position">
                        <label class="btn btn-outline-info button
                        @if ($user->position == 1)
                        {{'selected'}}

                        @endif
                    " onclick="myFunction();" id="pass" for="radio1">
                            Quản lý
                        </label>

                        <input id="radio2" type="radio" value="2"
                        @if ($user->position == 2)
                            {{'checked'}}
                        @endif
                         name="position">
                        <label for="radio2" id="pass"  onclick="myFunction();" class="btn btn-outline-info button
                        @if ($user->position == 2)
                        {{'selected'}}

                        @endif
                        ">
                            Lễ tân
                        </label>
                        <input id="radio3" type="radio" value="3"
                        @if ($user->position == 3)
                            {{'checked'}}

                        @endif
                        name="position">
                        <label class="btn btn-outline-info button
                        @if ($user->position == 3)
                        {{'selected'}}

                        @endif
                        " onclick="myFunction2();"  for="radio3">
                            Nhân viên
                        </label>
                        <input id="radio4" type="radio" value="4"
                        @if ($user->position == 4)
                            {{'checked'}}

                        @endif
                        name="position">
                        <label class="btn btn-outline-info button
                        @if ($user->position == 4)
                        {{'selected'}}

                    @endif
                        "  onclick="myFunction2();" for="radio4">
                            Đầu bếp
                        </label>

                    </div>
                </div>
            </div>
            @else
            <div class="form-group row justify-content-end">
                <label class="col-md-3 control-label">Chức vụ</label>
                <div class="col-md-9">
                   Quản Lý
                </div>
            </div>
            @endif
            <div class="form-group row justify-content-end mb-0">
                    <button class="col-md-12 btn btn-info" type="submit">Sửa</button>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')
<script>
    function myFunction2() {
   var element = document.getElementById("display-password");
   element.classList.add("display-password");

 }
 </script>
<script>
   function myFunction() {
  var element = document.getElementById("display-password");
  element.classList.remove("display-password");
}
</script>
    <script>
            $('.button').on('click', function(){
        $('.button').removeClass('selected');
        $(this).addClass('selected');
    });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    @else
    <div class="alert alert-danger">
        <h1>Nhầm trang rồi 😾😾</h1>
    </div>
    @endif
@else
<div class="alert alert-danger">
    <h1>Nhân viên không được vào đây 😾😾</h1>
</div>
@endif
@endsection

