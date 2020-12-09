@extends('layout_admin.index')


@section('title')
    @if (Auth::user()->position == 1)
        {{'Quản lý'}}
    @else
        {{'Xin chào, '.Auth::user()->name}}
    @endif
@endsection

@section('content')
@if (Auth::user()->position == 1)
@if (session('addnv'))
    <div class="alert alert-success">
        {{session('addnv')}}
    </div>
@endif
@if (session('delete-nhanvien'))
    <div class="alert alert-success">
        {{session('delete-nhanvien')}}
    </div>
@endif
@if (session('edit-nhanvien'))
    <div class="alert alert-success">
        {{session('edit-nhanvien')}}
    </div>
@endif
@if (session('add-nhanvien'))
    <div class="alert alert-success">
        {{session('add-nhanvien')}}
    </div>
@endif

<table id="example" class="hover" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Chức vụ</th>
            <th>Ngày vào làm</th>
            <th>Nơi ở</th>
            <th>Lương</th>
            {{-- <th>Ảnh đại diện</th> --}}
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nhanvien as $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->email}}</td>
            <td>
                @if ($value->position == 1)
                    {{'Quản Lý'}}
                    @elseif($value->position == 2)
                    {{'Lễ tân'}}
                    @elseif($value->position == 3)
                    {{'Nhân viên'}}
                    @elseif($value->position == 4)
                    {{'Đầu bếp'}}
                @endif
            </td>
            <td>{{$value->created_at}}</td>
            <td>{{$value->address}}</td>
            <td>{{$value->luong}}</td>
            {{-- <td><img src="{{asset('admin_assets/upload')}}/{{$value->url_img}}" width='10%' alt=""></td> --}}
            <td>
                @if ($value->id == Auth::user()->id || $value->position == 2)
                <a href="{{url('quanly/sua-quan-ly')}}/{{$value->id}}" class="btn btn-info">Sửa</a>
                @elseif($value->position == 3 || $value->position == 4)
                <a href="{{url('quanly/sua-nhan-vien')}}/{{$value->id}}" class="btn btn-info">Sửa</a>

                @else
                {{'Không thể sửa'}}
                @endif
            </td>

            <td>
                @if ($value->id != Auth::user()->id && $value->position != 1)

                <a href="{{url('quanly/xoa-nhan-vien')}}/{{$value->id}}" class="btn btn-danger">Xóa</a>

                @else
                {{'Không thể xóa'}}
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@else
    <div class="alert alert-danger">
        <h1>Nhân viên không được vào đây 😾😾</h1>
    </div>
@endif
@endsection
