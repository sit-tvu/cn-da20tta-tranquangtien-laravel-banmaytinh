<!-- resources/views/layouts/inc/user/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @stack('styles')
</head>
<body>
    @yield('header')
    <div class="content">
        @yield('content')
    </div>

    @yield('footer')
    @stack('script')
</body>
</html>
