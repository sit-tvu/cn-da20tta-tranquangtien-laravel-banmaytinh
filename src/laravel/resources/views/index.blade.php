@extends('layouts.inc.user.layout')

@section('title', ' Trang Chủ')

@section('header')
    @include('layouts.inc.user.header')
@endsection

@section('content')
<div class="banner">
  <div class="container">
      <div class="row">
          <div class="col-md-12 col-lg-9">
              <div id="carouselId" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                      <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselId" data-slide-to="1"></li>
                      <li data-target="#carouselId" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner" role="listbox">
                      <div class="carousel-item active ">
                          <a href="#"><img src="{{ asset('picture/banner/banner1.jpg') }}" alt="First slide"></a>

                      </div>
                      <div class="carousel-item ">
                          <a href="#"> <img src="{{ asset('picture/banner/banner2.jpg') }}" alt="Second slide"></a>


                      </div>
                      <div class="carousel-item">
                          <a href="#"><img src="{{ asset('picture/banner/banner3.jpg') }}" alt="Third slide"></a>


                      </div>
                      <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                      </a>
                  </div>
              </div>

          </div>
          <div class="col-md-3 col-lg-3 banner-img">
              <div class="banner-content">
                  <a href="#"> <img src="{{ asset('picture/banner/banner-r1.jpg') }}" alt=""></a>
              </div>

              <div class="banner-content">
                  <a href="#"> <img src="{{ asset('picture/banner/baner-r2.jpg') }}" alt=""></a>
              </div>
              <div class="banner-content">
                  <a href="#"> <img src="{{ asset('picture/banner/banner-r3.png') }}" alt=""></a>
              </div>

          </div>
      </div>

  </div>
</div>
<!-- icon-shop -->
<div class="icon-shop ">
  <div class="container">
      <div class="row">
          <div class="col-md-3">
              <i class="ti-shield"></i>
              <b>Bảo hành</b>
              <p>Chính hãng 100%</p>
          </div>
          <div class="col-md-3">
              <i class="ti-exchange-vertical"></i>
              <b>Đổi mới</b>
              <p>Trong vòng 7 ngày</p>
          </div>
          <div class="col-md-3">
              <i class="ti-money"></i>
              <b>Giảm giá</b>
              <p>Nhiều sản phẩm giá tốt</p>
          </div>
          <div class="col-md-3">
              <i class="ti-time"></i>
              <b>Giao nhanh</b>
              <p>Nội thành HN & Tp HCM</p>
          </div>
      </div>
  </div>
</div>
<!-- icon-shop -->
<div class="icon-shop-img">
  <div class="container">
      <div class="row">
          <div class="col-md-3 icon-shop-img-content">
              <a href="{{ route('product_brands') }}#acer"> <img src="{{ asset('picture/acer1.png') }}" alt="acer"></a>
          </div>
          <div class="col-md-3 icon-shop-img-content">
              <a href="{{ route('product_brands') }}#asus"> <img src="{{ asset('picture/asus1.jpg') }}" alt="asus"></a>
          </div>
          <div class="col-md-3 icon-shop-img-content">
              <a href="{{ route('product_brands') }}#lenovo"> <img src="{{ asset('picture/lenovo1.jpg') }}" alt="levovo"></a>
          </div>
          <div class="col-md-3 icon-shop-img-content">
              <a href="{{ route('product_brands') }}#apple"> <img src="{{ asset('picture/apple1.jpg') }}" alt="apple"></a>
          </div>
      </div>
  </div>
</div>

<!-- menu bar shop -->

<div class="container">
    <div class="nav-shop">
        <div class="row">
  
            <div class="col-md-4 " id="trendingProduct">
                <i class="ti-view-list"> Bán chạy</i>
            </div>
  
        </div>
  
    </div>
  </div>
  <!-- menu 2 -->
  <!-- menu-shop -->
  <div class="menu">
      <div class="container">
          <div class="row">
              @foreach($trendingProduct as $key => $product)
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

<!-- menu bar shop -->
<br>
<div class="container">
  <div class="nav-shop">
      <div class="row">

          <div class="col-md-4 " id="laptop">
              <i class="ti-view-list"> Laptop</i>
          </div>
          {{-- <div class="col-md-2 nav-item">
              <a href="#">Tuf gaming</a>

          </div>
          <div class="col-md-2 nav-item">
              <a href="#">Nitro 5</a>
          </div>
          <div class="col-md-2 nav-item">
              <a href="#">Legion</a>
          </div>
          <div class="col-md-2 nav-item">
              <a href="#">Asus</a>
          </div> --}}

      </div>

  </div>
</div>

<!-- menu-shop -->
<div class="menu">
    <div class="container">
        <div class="row">
            @foreach($laptops as $key => $product)
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


<!-- menu bar shop -->

<div class="container">
  <div class="nav-shop">
      <div class="row">

          <div class="col-md-4  " id="macbook">
              <i class="ti-view-list"> Macbook</i>
          </div>

      </div>

  </div>
</div>
<!-- menu 2 -->
<!-- menu-shop -->
<div class="menu">
    <div class="container">
        <div class="row">
            @foreach($macbooks as $key => $product)
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

<div class="container">
    <div class="nav-shop">
        <div class="row">
  
            <div class="col-md-4  " id="pc-maytinhdeban">
                <i class="ti-view-list"> PC - máy tính để bàn</i>
            </div>
            {{-- <div class="col-md-2 nav-item">
                <a href="#">PC gaming</a>
  
            </div>
            <div class="col-md-2 nav-item">
                <a href="#">PC đồ họa</a>
            </div>
            <div class="col-md-2 nav-item">
                <a href="#">PC học tập</a>
            </div>
            <div class="col-md-2 nav-item">
                <a href="#">Pc văn phòng</a>
            </div> --}}
  
        </div>
  
    </div>
  </div>
  <!-- menu 2 -->
  <!-- menu-shop -->
  <div class="menu">
      <div class="container">
          <div class="row">
              @foreach($pcs as $key => $product)
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

  <div class="container">
    <div class="nav-shop">
        <div class="row">
  
            <div class="col-md-4 " id="phu-kien">
                <i class="ti-view-list"> Phụ kiện</i>
            </div>
            {{-- <div class="col-md-2 nav-item">
                <a href="#">PC gaming</a>
  
            </div>
            <div class="col-md-2 nav-item">
                <a href="#">PC đồ họa</a>
            </div>
            <div class="col-md-2 nav-item">
                <a href="#">PC học tập</a>
            </div>
            <div class="col-md-2 nav-item">
                <a href="#">Pc văn phòng</a>
            </div> --}}
  
        </div>
  
    </div>
  </div>
  <!-- menu 2 -->
  <!-- menu-shop -->
  <div class="menu">
      <div class="container">
          <div class="row">
              @foreach($phukien as $key => $product)
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
@endsection

@section('footer')
    @include('layouts.inc.user.footer')
@endsection
