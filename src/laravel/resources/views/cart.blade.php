@extends('layouts.inc.user.layout')

@section('title', 'Chi tiết sản phẩm')

@section('header')
    @include('layouts.inc.user.header')
@endsection

@section('content')
    <div class="container">
        <h2>Giỏ hàng của bạn</h2>

        @if(count($cart) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng cộng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $productId => $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>
                                <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" style="max-width: 50px; max-height: 50px;">
                            </td>
                            <td>
                                <input type="number" name="quantity" class="quantity-input" value="{{ $item['quantity'] }}" min="1">
                            </td>
                            <td class="product-price">{{ number_format($item['price']) }}đ</td>
                            <td class="total">{{ number_format($item['quantity'] * $item['price']) }}đ</td>
                            <td><a href="{{ route('removeFromCart', ['productId' => $productId]) }}" class="btn btn-danger">Xóa</a>
                            <input type="hidden" value="{{ $item['product_id'] }}" name="productId" id="productId">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p id="grand-total">Tổng tiền: {{ number_format($grandTotal) }}đ</p>
            <a href="{{ route('checkout') }}" class="btn btn-success">Tiến hành thanh toán</a>
        @else
            <p>Giỏ hàng của bạn trống.</p>
        @endif
    </div>
@endsection

@section('footer')
    @include('layouts.inc.user.footer')
@endsection
