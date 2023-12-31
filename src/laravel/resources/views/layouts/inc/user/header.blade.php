<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TienPC - Computer Shop</title>
    {{-- <link rel="stylesheet" href="styles.css"> --}}
    @push('styles')
    {{-- <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <script src="{{ asset('user/js/script.js') }}" defer></script> --}}
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/icon/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/slideshow.css') }}">
@endpush
</head>

<body>

<header>
    <div class="bottom-header">
        <div class="container">
            <nav class="navbar navbar-expand-sm navbar-light ">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('picture/logo.png') }}" alt="logo1" width="100px" height="40px"></a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">

                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link text-white">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white" href="#">Giới thiệu</a>
                        </li>
                        <li class="nav-item dropdown">
                           
                            <a class="nav-link dropdown-toggle text-white" id="dropdownId"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sản phẩm </a>
                            <div class="dropdown-menu " aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('home') }}#laptop">Laptop</a>
                                <a class="dropdown-item" href="{{ route('home') }}#macbook">Macbook</a>
                                <a class="dropdown-item" href="{{ route('home') }}#pc-maytinhdeban">PC - máy tính để bàn</a>
                                <a class="dropdown-item" href="{{ route('home') }}#phu-kien">Phụ kiện</a>
                            </div>
                        </li>
                        @if (Route::has('login'))
    <li class="nav-item">
        @guest
            <a href="{{ route('login') }}" class="nav-link text-white">Đăng nhập</a>
    </li>
    <li class="nav-item">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="nav-link text-white">Đăng ký</a>
            @endif
    </li>
    @else
    <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('cart') }}">Giỏ hàng</a>
    </li>
    <li>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle text-white" href="{{ url('/') }}" id="dropdownId"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                <div class="dropdown-content">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('THOÁT') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            </div>
    </li>
    @endguest
@endif

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<div class="bannershop">
    <div class="container">
    </div>
    <div class="banner-bg">
        
    </div>
</div>

{{-- 
    <header>
        <div class="logo">
            <h1>TienPC</h1>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Tìm kiếm...">
            <button type="submit">Tìm kiếm</button>
        </div>

        <nav>
            <ul class="navigation">
                <li><a href="{{ url('/') }}">TRANG CHỦ</a></li>

                <li class="nav"><a href="{{ url('/products') }}">SẢN PHẨM</a>
                    <ul class="brands">
                        <li>
                            <a href="">APPLE</a>
                        </li>
                        <li>
                            <a href="">LENOVO</a>
                        </li>
                        <li>
                            <a href="">ACER</a>
                        </li>
                        <li>
                            <a href="">ASUS</a>
                        </li>
                        <li>
                            <a href="">DELL</a>
                        </li>
                    </ul>
                </li>


                <li><a href="#">LIÊN HỆ</a></li>
                @if (Route::has('login'))
    <li>
        @guest
            <a href="{{ route('login') }}" class="nav-link text-white">ĐĂNG NHẬP</a>
    </li>
    <li>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ĐĂNG KÝ</a>
            @endif
    </li>
    <li>
        @else
            <div class="dropdown">
                    <span>{{ Auth::user()->name }}</span>

                <div class="dropdown-content">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('THOÁT') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        @endguest
    </li>
@endif



            </ul>
        </nav>
    </header> --}}


</body>

</html>