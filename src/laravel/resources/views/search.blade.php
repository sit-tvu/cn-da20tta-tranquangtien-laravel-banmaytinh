@extends('layouts.inc.user.layout')

@section('title', ' Trang Chủ')

@section('header')
    @include('layouts.inc.user.header')
@endsection

@section('content')
<div class="container">
    <h3>Kết quả tìm kiếm cho "{{ $query }}"</h3>

    @if ($searchProduct->count() > 0)
        <div class="nav-shop">
            <div class="row">
                <div class="col-md-4" id="searchProduct">
                    <i class="ti-view-list"> Sản phẩm tìm kiếm</i>
                </div>
            </div>
        </div>

        <!-- menu-shop -->
        <div class="menu">
            <div class="container">
                <div class="row">
                    @foreach($searchProduct as $key => $product)
                        <div class="col-md-4 col-lg-3">
                            <a href="{{ route('product.detail', ['category' => $product->getCategorySlugAttribute(), 'brand' => $product->getBrandSlugAttribute(), 'slug' => $product->slug]) }}">
                                <div class="card card-product text-left">
                                    <div class="card-image">
                                        @if($product->productImages->count() > 0)
                                            <img class="card-img-top" src="{{ asset('' . $product->productImages[0]->image) }}" alt="{{ $product->name }}">
                                        @else
                                            <img class="card-img-top" src="{{ asset('' . $product->image) }}" alt="{{ $product->name }}">
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <del>{{ number_format($product->cost) }}đ</del> <ins>{{ number_format($product->sale_cost) }}đ</ins>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Nếu là sản phẩm thứ 4, thêm dòng mới -->
                        @if(($key + 1) % 4 == 0)
                            </div>
                            <div class="row">
                                <br>
                            </div>
                            <div class="row">
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <p>Không có sản phẩm phù hợp "{{ $query }}"</p>
    @endif
</div>

@endsection

@section('footer')
    @include('layouts.inc.user.footer')
@endsection
