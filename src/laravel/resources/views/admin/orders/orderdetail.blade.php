@extends('layouts.admin')
@section('content')

<div>
 
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Chi tiết đơn hàng
                            <a href="{{ url('admin/orders') }}" class="btn btn-primary btn-sm text-white float-end">Trở về</a>
                        </h3>
                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr class="text-center"> 
                                        <th>ID</th>                                   
                                        <th>Tên Sản Phẩm</th>
                                        <th>Hình Ảnh</th>
                                        <th>Số Lượng</th>
                                        <th>Giá</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($order->orderDetails as $orderDetail)
                                    <tr>
                                    <td>{{ $orderDetail->id }}</td>
                                    <td>{{ $orderDetail->product->name}}</td>
                                    <td>
                                        @if ($orderDetail->product->productImages->isNotEmpty())
                                            <img name="productImg" src="{{ asset($orderDetail->product->productImages->first()->image) }}" alt="Hình ảnh sản phẩm" style="width: 200px;height: 150px;">
                                        @endif
                                    </td>
                                    <td>{{ number_format($orderDetail->quantity)}}</td>
                                    <td>{{ number_format($orderDetail->price) }}</td>
                                    <td>{{ number_format(($orderDetail->quantity) * ($orderDetail->price)) }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                    <td>Lỗi</td>
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