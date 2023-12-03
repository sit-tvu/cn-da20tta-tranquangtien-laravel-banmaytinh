<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TienPC - Computer Shop</title>
    <link rel="stylesheet" href="styles.css">
    @push('styles')
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <script src="{{ asset('user/js/script.js') }}" defer></script>

@endpush
</head>

<body>

    <header>
        <div class="logo">
            <h1>TienPC</h1>
        </div>

        <div class="search-bar">
            <!-- Thêm ô tìm kiếm ở đây -->
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
            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ĐĂNG NHẬP</a>
    </li>
    <li>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ĐĂNG KÝ</a>
            @endif
    </li>
    <li>
        @else
            {{-- Hiển thị tên người dùng và dropdown khi họ đã đăng nhập --}}
            <div class="dropdown">
                    <span>{{ Auth::user()->name }}</span>

                <div class="dropdown-content">
                    {{-- Chỉ hiển thị chức năng đăng xuất --}}
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('THOÁT') }}
                    </a>

                    {{-- Form đăng xuất --}}
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
    </header>

    <!-- Your website content goes here -->

</body>

</html>