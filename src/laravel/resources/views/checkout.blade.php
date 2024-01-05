@extends('layouts.inc.user.layout')

@section('title', 'Checkout')
@push('styles')
<style>
body {
    font-family: Arial;
    font-size: 17px;
    padding: 8px;
  }

  * {
    box-sizing: border-box;
  }

  .row {
    display: -ms-flexbox;
    /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap;
    /* IE10 */
    flex-wrap: wrap;
    margin: 0 -16px;
  }

  .col-25 {
    -ms-flex: 25%;
    /* IE10 */
    flex: 25%;
  }

  .col-50 {
    -ms-flex: 50%;
    /* IE10 */
    flex: 50%;
  }

  .col-75 {
    -ms-flex: 75%;
    /* IE10 */
    flex: 75%;
  }

  .col-25,
  .col-50,
  .col-75 {
    padding: 0 16px;
  }


  input[type="text"] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }

  label {
    margin-bottom: 10px;
    display: block;
  }

  .icon-container {
    margin-bottom: 20px;
    padding: 7px 0;
    font-size: 24px;
  }

  .btn {
    background-color: #007bff;
    color: white;
    padding: 12px;
    margin: 10px 0;
    border: none;
    width: 100%;
    border-radius: 3px;
    cursor: pointer;
    font-size: 17px;
  }

  .btn:hover {
    color: black;
  }

  a {
    color: #2196f3;
  }

  hr {
    border: 1px solid lightgrey;
  }

  span.price {
    float: right;
    color: grey;
  }

  /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
  @media (max-width: 800px) {
    .row {
      flex-direction: column-reverse;
    }

    .col-25 {
      margin-bottom: 20px;
    }
  }

  select {
    padding: 10px;
    font-size: 16px;
    width: 255px;
  }

  option {
    font-size: 14px;
  }
</style>
@endpush
@section('header')
    @include('layouts.inc.user.header')
@endsection

@section('content')
    {{-- <div class="container">
        <h2>Thông tin thanh toán</h2>

        @if(count($buynow) > 0)
        <form action="{{ route('checkout.process') }}" method="post">
            @csrf
            <label for="fullname">Họ và tên:</label>
            <input type="text" name="fullname" required>

            <label for="address">Địa chỉ:</label>
            <textarea name="address" required></textarea>

            <label for="phone">Số điện thoại:</label>
            <input type="text" name="phone" required>
            <input type="hidden" name="total" value="{{ $buynowtotal }}">
            <button type="submit" class="btn btn-primary">Xác nhận đơn hàng</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Tổng cộng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($buynow as $productId => $item)
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
                        <input type="hidden" value="{{ $item['product_id'] }}" name="productId" id="productId">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p id="grand-total">Tổng tiền: {{ number_format($buynowtotal) }}đ</p>
        @elseif(count($cart) > 0)

            <form action="{{ route('checkout.process') }}" method="post">
                @csrf
                <label for="fullname">Họ và tên:</label>
                <input type="text" name="fullname" required>

                <label for="address">Địa chỉ:</label>
                <textarea name="address" required></textarea>

                <label for="phone">Số điện thoại:</label>
                <input type="text" name="phone" required>
                <input type="hidden" name="total" value="{{ $grandTotal }}">
                <button type="submit" class="btn btn-primary">Xác nhận đơn hàng</button>
            </form>

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
        @else
            <p>Giỏ hàng của bạn trống.</p>
        @endif
    </div> --}}
    <div class="container">
    <h2>Thanh toán sản phẩm</h2>
    @if(count($buynow) > 0)
    <div class="row">
        <div class="col-50">
          <div id="form-container">
            <form action="{{ route('checkout.process') }}" method="post">
              @csrf
              <label for="fname"><i class="fa fa-user"></i> Họ Tên</label>
              <input type="text" id="fname" name="fullname" placeholder="Nhập họ tên" required />
    
              <label for="phone"><i class="fa fa-phone"></i> Số điện thoại</label>
              <input type="text" id="phone" name="phone" placeholder="+84......" required />
    
              <label for="adr"><i class="fa fa-address-card-o"></i> Địa chỉ</label>
              <input type="text" id="adr" name="address" placeholder="Nhập địa chỉ" required />
    
              <label for="payment"><i class="fa fa-credit-card"></i> Phương thức thanh toán</label>
              <br>
              <select name="payment" id="payment">
                <option value="1">Thanh toán khi nhận hàng</option>
              </select>
              <input type="hidden" name="total" value="{{ $buynowtotal }}">
              <input type="submit" value="Đặt hàng" id="submit-btn" class="btn" />
            </form>
          </div>
        </div>
        <div class="col-50">
          <div class="cart-container">
            <h4>
                Sản phẩm
                <span class="price" style="color: black"><i class="fa fa-shopping-cart"></i></span>
              </h4>
              <table class="table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
              @foreach($buynow as $productId => $item)
              <tr>
                <td>{{ $item['name'] }}</td>
                <td><img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" style="max-width: 50px; max-height: 50px;"></td>
                 <td>x{{ $item['quantity'] }}</td> 
                 <td>{{ number_format($item['price'] )}}</td>
                <td>{{ number_format($item['quantity'] * $item['price']) }}</td>
            </tr>
            @endforeach
                </tbody>
               </table>
            <hr />
            <p>Tổng tiền <span class="price" style="color: black"><b>{{number_format($buynowtotal)}}</b></span></p>
          </div>
        </div>
      </div>
    @elseif (count($cart) > 0)
    <div class="row">
        <div class="col-50">
          <div id="form-container">
            <form action="{{ route('checkout.process') }}" method="post">
              @csrf
              <label for="fname"><i class="fa fa-user"></i> Họ Tên</label>
              <input type="text" id="fname" name="fullname" placeholder="Nhập họ tên" required />
    
              <label for="phone"><i class="fa fa-phone"></i> Số điện thoại</label>
              <input type="text" id="phone" name="phone" placeholder="+84......" required />
    
              <label for="adr"><i class="fa fa-address-card-o"></i> Địa chỉ</label>
              <input type="text" id="adr" name="address" placeholder="Nhập địa chỉ" required />
    
              <label for="payment"><i class="fa fa-credit-card"></i> Phương thức thanh toán</label>
              <br>
              <select name="payment" id="payment">
                <option value="1">Thanh toán khi nhận hàng</option>
              </select>
              <input type="hidden" name="total" value="{{ $grandTotal }}">
              <input type="submit" value="Đặt hàng" id="submit-btn" class="btn" />
            </form>
          </div>
        </div>
        <div class="col-50">
          <div class="cart-container">
            <h4>
                Sản phẩm
                <span class="price" style="color: black"><i class="fa fa-shopping-cart"></i></span>
              </h4>
              <table class="table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
              @foreach($cart as $productId => $item)
              <tr>
                <td>{{ $item['name'] }}</td>
                <td><img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" style="max-width: 50px; max-height: 50px;"></td>
                 <td>x{{ $item['quantity'] }}</td> 
                 <td>{{ number_format($item['price'] )}}</td>
                <td>{{ number_format($item['quantity'] * $item['price']) }}</td>
            </tr>
            @endforeach
                </tbody>
               </table>
            <hr />
            <p>Tổng tiền <span class="price" style="color: black"><b>{{number_format($grandTotal)}}</b></span></p>
          </div>
        </div>
      </div>
      @else
      <p>Giỏ hàng của bạn trống.</p>
      @endif
</div>
@endsection

@section('footer')
    @include('layouts.inc.user.footer')
@endsection
