@extends('layout_page.khachhang.index')
@section('title')
   Xin chào, {{Auth::guard('loyal_customer')->user()->name}}
@endsection
@section('content')
<h3>Những đơn bạn đã đặt</h3>
@foreach ($build as $item)
<table id="example" class="hover" style="width:100%">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tầng</th>
            <th>Phòng</th>
            <th>Ngày đặt phòng</th>
            <th>Ngày trả phòng</th>
            <th>Trạng thái</th>
            <th>Giá</th>
        </tr>
    </thead>
    <tbody>
        {{$i=1}}
        @foreach ($build as $value)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$value->phong->tang->tang}}</td>
            <td>{{$value->phong->phong}}</td>
            <td>{{$value->date_book}}</td>
            <td>{{$value->check_out}}</td>
            <td>
                @if ($value->status == 2)
                    {{'Thành công'}}
                    @elseif($value->status == 1)
                    {{'Đang xác nhận'}}
                    @elseif($value->status == 3)
                    {{'Đang ở'}}
                @endif
            </td>
            <td>
                @if (empty($value->price))
                    {{'Đang cập nhật'}}
                    @else
                    {{$value->price}} VNĐ
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endforeach
@endsection

