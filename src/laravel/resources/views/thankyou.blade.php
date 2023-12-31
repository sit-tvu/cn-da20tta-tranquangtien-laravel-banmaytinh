@extends('layouts.inc.user.layout')

@section('title', 'Thank You')

@section('header')
    @include('layouts.inc.user.header')
@endsection

@section('content')
    <div class="container">
        <h2>Cảm ơn bạn đã đặt hàng!</h2>
        @if(session('success'))
            <p class="text-success">{{ session('success') }}</p>
        @else
            <p>Đơn hàng của bạn đã được xác nhận. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.</p>
        @endif
    </div>
@endsection

@section('footer')
    @include('layouts.inc.user.footer')
@endsection
