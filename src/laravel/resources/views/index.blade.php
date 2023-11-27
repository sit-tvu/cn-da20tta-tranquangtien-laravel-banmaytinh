<!-- resources/views/index.blade.php -->

@extends('layouts.inc.user.layout')

@section('title', 'Trang Index')

@section('header')
    @include('layouts.inc.user.header')
@endsection

@section('content')
<div style="background-color:#333">
<div class="slideshow-container">

    <div class="mySlides fade">
      <img src="{{ asset('picture/BANNER1.png') }}" style="width:100%">
    </div>
    
    <div class="mySlides fade">
      <img src="{{ asset('picture/BANNER2.png') }}" style="width:100%">
    </div>
    
    <div class="mySlides fade">
      <img src="{{ asset('picture/BANNER3.png') }}" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img src="{{ asset('picture/BANNER4.png') }}" style="width:100%">
      </div>
    
    </div>
    <br>
    
    <div style="text-align:center">
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
    </div>
</div>
</div>
@endsection

@section('footer')
    @include('layouts.inc.user.footer')
@endsection
