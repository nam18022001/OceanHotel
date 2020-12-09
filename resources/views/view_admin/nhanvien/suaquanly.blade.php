@extends('layout_admin.index')
@section('title')
    {{'Sửa quản lý '}}{{$user->name}}
@endsection
@section('content')
@if (Auth::user()->position == 1)
@if ($user->position == 1 || $user->position == 2)

@section('css')
    <style>
        .themnhanvien{
            margin: auto;
        }
        input[type="email"], input[type="text"], input[type="tel"], input[type="file"], input[type="password"] {
            border: none;
            border-bottom: 2px solid rgb(14, 160, 218);
        }
        .password{
            display: none;
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
    @if (session('checkpass'))
        <div class="alert alert-danger">
            {{session('checkpass')}}
        </div>
    @endif
    @if (session('editpass'))
        <div class="alert alert-danger">
            {{session('editpass')}}
        </div>
    @endif
    <div class="mt-5">
        <h4 class="header-title mb-3">Sửa
            @if ($user->position == 1)
            {{'quản lý'}}
            @else
            {{'nhân viên'}}
        @endif {{$user->name}}</h4>

        <form class="form-horizontal mt-3" action="{{url('quanly/sua-quan-ly')}}/{{$user->id}}" method="POST" enctype="multipart/form-data">
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

            <div class="" id="p-c1">
                <div class="form-group row">
                    <div class="col-md-4"></div>
                    <label for="change-password" class="col-md-8 control-label" >
                        <span class="btn btn-warning" id="span">

                        Muốn đổi mật khẩu nhấn vào đây
                    </span>
                </label>
                        <input type="checkbox" class="form-control" style="display: none" id="change-password" name="mu">
                    <div style="">

                    </div>
                </div>
            </div>
                <div class="password" id="password">
                <div class="form-group row">
                    <label for="password" class="col-md-3 control-label">Mật khẩu cũ</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="passwordold" placeholder="Nhập mật khẩu cũ" name='passwordold'>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-3 control-label">Mật khẩu mới</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="passwordnew" placeholder="Nhập mật khẩu mới" name='passwordnew'>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-3 control-label">Nhập lại mật khẩu mới</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="repasswordnew" placeholder="Nhập lại mật khẩu mới" name='repasswordnew'>
                    </div>
                </div>
            </div>
               <div class="form-group row justify-content-end">
                <label class="col-md-3 control-label">Chức vụ</label>
                <div class="col-md-9">
                   Quản Lý
                </div>
            </div>

            <div class="form-group row justify-content-end mb-0">
                    <button class="col-md-12 btn btn-info" type="submit">Sửa</button>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')
<script>
        $('#change-password').change(function(){
            var div = document.getElementById('span');
            if($(this).is(':checked')){
                document.getElementById("password").classList.remove('password');
                document.getElementById("span").innerHTML = 'Không muốn đổi thì nhấn lại vào đây';
            }
            else{
                document.getElementById("password").classList.add('password');
                document.getElementById("span").innerHTML = 'Muốn đổi mật khẩu nhấn vào đây';

            }
        });
</script>
    {{-- <script src="{{asset('admin_assets/assets/js/jquery.js')}}"></script> --}}
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
