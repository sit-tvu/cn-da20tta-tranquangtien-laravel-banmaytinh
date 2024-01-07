@extends('layouts.inc.user.layout')

@section('title', 'Chi tiết sản phẩm')

@section('header')
    @include('layouts.inc.user.header')
@endsection

@section('content')
    <div class="container">
        <h2>Đơn hàng của bạn</h2>

        @if(count($myorders) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Họ Tên</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Tổng Tiền</th>
                        <th>Trạng Thái</th>
                        <th>Ngày Đặt</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($myorders as $myorder)
                        <tr>
                            <td>{{ $myorder->fullname }}</td>
                            <td>
                               {{ $myorder->phone }}
                            </td>
                            <td>
                                {{ $myorder->address}}
                            </td>
                            <td>{{ number_format($myorder->total)}}</td>
                            <td>
                                @if($myorder->status == 0)
                                    Chờ xác nhận
                                @elseif($myorder->status == 1)
                                    Chờ giao hàng
                                @elseif($myorder->status == 2)
                                    Đã giao
                                @elseif($myorder->status == 3)
                                    Đã hủy
                                @else
                                    Trạng thái không xác định
                                @endif
                            </td>
                            <td>{{ $myorder->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Không tìm thấy đơn hàng</p>
        @endif
    </div>
@endsection

@section('footer')
    @include('layouts.inc.user.footer')
@endsection
