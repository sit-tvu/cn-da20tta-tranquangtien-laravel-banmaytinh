@extends('layouts.inc.user.layout')

@section('title', ' Chi tiết sản phẩm')

@section('header')
    @include('layouts.inc.user.header')
@endsection

@section('content')
<div class="container product">
    <div class="title">
        <h2 class="text-dark text-left">Thông tin về sản phẩm</h2>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="product-box">
                <div class="product-box-image">
                    <img src="{{ asset($product->productImages->first()->image) }}" id="main-image" data-asset="{{ asset('') }}">
                </div>
                <div class="product-box-thumbnails">
                    @foreach($product->productImages as $thumbnail)
                        <div class="col-md-4 col-lg-3">
                            <img src="{{ asset($thumbnail->image) }}" data-image="{{ $thumbnail->image }}" class="thumbnail">
                        </div>
                    @endforeach
                </div>
                <div class="product-description">
                    <h2>Mô tả</h2>
                    {!! nl2br(e($product->description)) !!}
                </div>
            </div>
        </div>
        

        <div class="col-md-6 product-bg">
            <b>
                <h1>{{ $product->name . ' ' . $product->option }}</h1>

            </b>
            <p>Thương hiệu : <b class="text-danger">{{ $product->brand->name }}</b></p>
            <p><i class="ti-shield"> </i>Bảo hành 12 tháng</p>
            <div class="price">
                <del>{{ number_format($product->cost) }}đ</del> <ins>{{ number_format($product->sale_cost) }}đ</ins>
                <p>*Giá trên đã bao gồm thuế VAT</p>
            </div>
            <!-- Trong phần hiển thị sản phẩm -->
            <div class="row">
                <div class="col-md-3 col-lg-2">
                    <input type="number" name="quantity" id="quantityInput" value="1" onchange="updateQuantity()" min="1" max="30">
                </div>
                <div class="col-md-5 col-lg-4" id="cart">
                    <form action="{{ route('cart.add', ['slug' => $product->slug]) }}" method="post" id="addToCartForm">
                        @csrf
                        <input type="hidden" name="quantity" id="hiddenQuantity" value="1">
                        <button type="submit" class="btn btn-danger btn-control">Thêm vào giỏ</button>
                    </form>
                </div>
                <div class="col-md-4 col-lg-3" id="cart1">
                    <form action="{{ route('buynow', ['slug' => $product->slug]) }}" method="post" id="buyNowForm">
                        @csrf
                        <input type="hidden" name="quantity1" id="hiddenQuantity1" value="1">
                        <button type="submit" class="btn btn-danger btn-control">Mua ngay</button>
                    </form>
                </div>
                <div class="col-lg-3"></div>
            </div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
{{-- @if(session('cart'))
    <h2>Giỏ hàng của bạn</h2>
    <ul>
        @foreach(session('cart') as $productId => $item)
            <li>
                {{ $item['name'] }} - {{ $item['quantity'] }} x {{ $item['price'] }}đ
            </li>
        @endforeach
    </ul>
@else
    <p>Giỏ hàng trống rỗng</p>
@endif --}}

            <div class="row product-gift">
                <div class="col-md-12">
                    <i class="ti-gift"> Chính sách bảo hành</i>
                    <dir>
                        <b>Thời Gian Bảo Hành:</b>
                            <p>Sản phẩm được bảo hành trong vòng 12 tháng kể từ ngày mua hàng</p>
                        <b>Điều Kiện Bảo Hành</b>
                            <p>Bảo hành chỉ áp dụng đối với các lỗi phần cứng của nhà sản xuất, 
                            không bao gồm hỏng hóc do sử dụng không đúng cách hoặc tai nạn.</p>
                            <p>Bảo hành sẽ bị hủy nếu phát hiện sản phẩm đã bị thay đổi,
                             sửa chữa bởi người không được ủy quyền.</p>

                        <b>Sửa Chữa hoặc Thay Thế:</b>
                            <p>Trong thời gian bảo hành, nếu phát hiện lỗi, khách hàng có thể gửi sản phẩm về trung tâm dịch vụ của chúng tôi để sửa chữa miễn phí</p>
                            <p>Nếu không thể sửa chữa, chúng tôi sẽ thay thế sản phẩm bằng một sản phẩm mới hoặc đã được sửa chữa.</p>

                        <b>Giai Đoạn Bảo Hành:</b>
                            <p>Trong 01 tháng đầu tiên, nếu có vấn đề, khách hàng có thể chọn hoàn lại tiền hoặc đổi sản phẩm mới.</p>
                            <p>Từ các tháng sau, chúng tôi cam kết sửa chữa hoặc thay thế nhanh chóng</p>
                        <b>Quy Định Về Đổi Trả Sản Phẩm:</b>
                            <p>Trong 01 tháng đầu tiên, quý khách có quyền yêu cầu trả hàng nếu không thích. Cửa hàng sẽ hoàn 90% số tiền so với hóa đơn</p>
                            <p>Số tiền hoàn sẽ giảm 10% cho các tháng tiếp theo</p>
                    </dir>
                </div>
            </div>
        </div>
    </div>

    <div class="menu product-shop">
        <h4>Sản phẩm tương tự </h4>
        <div class="row">
            @foreach($relatedProducts as $relatedProduct)
                <div class="col-md-4 col-lg-3">
                    <a href="{{ route('product.detail', ['category' => $category->slug, 'brand' => $brand->slug, 'slug' => $relatedProduct->slug]) }}">
                        <div class="card card-product text-left">
                            <div class="card-image">
                                <img class="card-img-top" src="{{ asset($relatedProduct->productImages->first()->image) }}" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $relatedProduct->name }}</h4>
                                <!-- Other product details go here -->
                                <del>{{ number_format($relatedProduct->cost) }}đ</del>
                                <ins>{{ number_format($relatedProduct->sale_cost) }}đ</ins>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

@section('footer')
    @include('layouts.inc.user.footer')
@endsection
