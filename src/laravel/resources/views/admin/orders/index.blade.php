@extends('layouts.admin')
@section('content')

<div>
 
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Đơn đặt hàng
                        </h3>
        <form action="" method="GET">
            <div class="row">
                <div class="col-md-3">
                    <input type="date" value="{{ date('Y-m-d') }}" name="dateA" class="form-control">
                </div>
                <div class="col-md-3 row">
                    <input type="date" value="{{ date('Y-m-d') }}" name="dateB" class="form-control">
                </div>
                <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Lọc</button>  
                </div>
            </div>

        </form>
                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Họ Tên</th>
                                        <th>Địa Chỉ</th>
                                        <th>SĐT</th>
                                        <th>Tổng Tiền</th>
                                        <th>Trạng Thái</th>
                                        <th>Ngày Đặt</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($orders as $order)
                                    <tr>
                                    <td>{{ $order->id}}</td>
                                    <td>{{ $order->user->email ?? 'Trống' }}</td>
                                    <td>{{ $order->fullname }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ formatPhoneNumber($order->phone) }}</td>
                                    <td>{{ number_format($order->total) }} đ</td>
                                    <td>
                                        @if ($order->status == 0)
                                            Chờ xác nhận
                                        @elseif ($order->status == 1)
                                            Chờ giao hàng
                                        @elseif ($order->status == 2)
                                            Đã giao
                                        @elseif ($order->status == 3)
                                            Đã hủy
                                        @else
                                            Không xác định
                                        @endif
                                    </td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.orders.details.show', ['order' => $order->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512">
                                            <!--!Font Awesome Free 6.5.1 by @fontawesome
                                                 - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                 <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3
                                                  0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24
                                                   24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1
                                                    1 0 64 32 32 0 1 1 0-64z"/></svg></a>
                                        @if($order->status == 0 || $order->status == 1)                                                                          
                                        <a href="{{ route('admin.orders.confirm', $order->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512">
                                                <!--!Font Awesome Free 6.5.1 by @fontawesome
                                                     - https://fontawesome.com License - https://fontawesome.com/license/free
                                                      Copyright 2024 Fonticons, Inc.-->
                                                      <path fill="#076fdf" d="M256 512A256 256 0 1 0 256 0a256 256 0
                                                       1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6
                                                        0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
                                                    </svg>
                                        </a>
                                        @endif
                                        @if($order->status != 3 && $order->status != 2)
                                        <a href="{{ route('admin.orders.cancel', $order->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" 
                                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome
                                                 - https://fontawesome.com License - https://fontawesome.com/license/free
                                                  Copyright 2024 Fonticons, Inc.--><path fill="#ea2610" d="M256 48a208 208
                                                   0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1
                                                    0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6
                                                     0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 
                                                     0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 
                                                     47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/></svg>
                                        </a>
                                        @endif
                                    </td>
                                    </tr>
                                    @empty
                                    <tr>
                                    <td>Không có đơn hàng</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection