@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="me-md-3 me-xl-5">
            @if(session('message'))
            <h2 class="alert alert-success">{{session('message')}}</h2>
            @endif
            <p class="mb-md-0">XIN CHÀO <b>{{Auth::user()->name}}</b></p>
          </div>
    {{-- <div>
          <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Analytics</p>
          </div>
        </div>
        <div class="d-flex justify-content-between align-items-end flex-wrap">
          <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
            <i class="mdi mdi-download text-muted"></i>
          </button>
          <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-clock-outline text-muted"></i>
          </button>
          <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-plus text-muted"></i>
          </button>
          <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
    </div> --}}
        </div>
      </div>
    </div>
  </div>
  <div class="menu">
    <div class="container">

        <div class="row">
          <div class="col-md-4 col-lg-3 col-limit" >
            <div class="rectangle">
                <div class="info">
                    <h3 class="info-title">Tổng số đơn đã nhận</h3>
                    <div class="cut-line"></div>
                    <p class="info-value">{{ $orderCount ?? '0' }} Đơn</p>
                </div>
            </div>
        </div>

          <div class="col-md-4 col-lg-3">
            <div class="rectangle">
                <div class="info">
                    <h3 class="info-title">Tổng số đơn đã hoàn thành</h3>
                    <div class="cut-line"></div>
                    <p class="info-value">{{ $completedOrderCount ?? '0' }} Đơn</p>
                </div>
            </div>
          </div>

          <div class="col-md-4 col-lg-3">
            <div class="rectangle">
                <div class="info">
                    <h3 class="info-title">Tổng số đơn đã hủy</h3>
                    <div class="cut-line"></div>
                    <p class="info-value">{{ $cancelOrderCount ?? '0' }} Đơn</p>
                </div>
            </div> 
          </div> 

          <div class="col-md-4 col-lg-3">
            <div class="rectangle">
                <div class="info">
                    <h3 class="info-title">Tổng doanh thu</h3>
                    <div class="cut-line"></div>
                    <p class="info-value">{{ number_format($total) ?? '0' }} Đồng</p>
                </div>
            </div> 
          </div> 
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<div class="menu">
  <div class="container">

      <div class="row">
        <div class="col-md-4 col-lg-3 col-limit" >
          <div class="rectangle">
              <div class="info">
                  <h3 class="info-title">Số đơn đã nhận tháng này</h3>
                  <div class="cut-line"></div>
                  <p class="info-value">{{ $currentMonth_orderCount ?? '0'  }} Đơn</p>
              </div>
          </div>
      </div>

        <div class="col-md-4 col-lg-3">
          <div class="rectangle">
              <div class="info">
                  <h3 class="info-title">Số đơn hoàn thành tháng này</h3>
                  <div class="cut-line"></div>
                  <p class="info-value">{{ $currentMonth_completedOrderCount ?? '0' }} Đơn</p>
              </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-3">
          <div class="rectangle">
              <div class="info">
                  <h3 class="info-title">Số đơn đã hủy tháng này</h3>
                  <div class="cut-line"></div>
                  <p class="info-value">{{ $currentMonth_cancelOrderCount ?? '0' }} Đơn</p>
              </div>
          </div> 
        </div> 

        <div class="col-md-4 col-lg-3">
          <div class="rectangle">
              <div class="info">
                  <h3 class="info-title">Doanh thu tháng này</h3>
                  <div class="cut-line"></div>
                  <p class="info-value">{{ number_format($total) ?? '0' }} Đồng</p>
              </div>
          </div> 
        </div> 
      </div>
  </div>
</div>
@endsection