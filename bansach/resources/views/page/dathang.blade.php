@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đặt hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('trang-chu')}}">Trang chủ </a> / <span>Đặt hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">

        <form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            @if(Session::has('thongbao'))
                @if(Session::get('thongbao')=='Đặt hàng thành công')
                <div class="alert alert-success row" role="alert">
                    {{Session::get('thongbao')}}
                </div>
                @else
                <div class="alert alert-danger row" role="alert">
                    {{Session::get('thongbao')}}
                </div>
                @endif
            @endif
            <div class="row">
                <div class="col-sm-6">
                    <h4>Đặt hàng</h4>
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="name">Họ tên*</label>
                        <input type="text" id="name" name="name" value="{{Auth::user()->full_name}}" placeholder="Họ tên" required>
                    </div>
                    <div class="form-block">
                        <label>Giới tính </label>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>

                    </div>

                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="email" value="{{Auth::user()->email}}" required placeholder="bakersalley@gmail.com">
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa chỉ*</label>
                        <input type="text" id="adress" name="address" value="{{Auth::user()->address}}" placeholder="bình dương" required>
                    </div>


                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input type="text" id="phone" name="phone_number" value="{{Auth::user()->phone}}"  placeholder="0849232871" required>
                    </div>

                    <div class="form-block">
                        <label for="notes">Ghi chú</label>
                        <textarea id="notes" name="note" placeholder="giao hàng nhanh"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head">
                            <h5>Đơn hàng của bạn</h5>
                        </div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                                <div>
                                    @if(Session::has('cart'))
                                    @foreach($product_card as $product)
                                    <!--  one item	 -->
                                    <div class="media">
                                        <img width="50px" height="50px" src="source/image/product/{{$product['item']['image']}}" alt="" class="pull-left">
                                        <div class="media-body">
                                            <p class="font-large">{{$product['item']['name']}}</p>
                                            <span class="color-gray your-order-info">Số lượng: {{$product['qty']}}</span>
                                            <span class="color-gray your-order-info">Tổng đơn giá:
                                                <?php
                                                $price = 0;
                                                if ($product['item']['promotion_price'] == 0) {
                                                    $price = $product['item']['unit_price'];
                                                } else {
                                                    $price = $product['item']['promotion_price'];
                                                }
                                                echo number_format($product['qty'] * $price) . ' VNĐ';
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- end one item -->
                                    @endforeach
                                    @endif
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left">
                                    <p class="your-order-f18">Tổng tiền:</p>
                                </div>
                                <div class="pull-right">
                                    <h5 class="color-black">
                                        @if(Session::has('cart'))
                                        {{number_format(Session('cart')->totalPrice)}}
                                        @else
                                        0
                                        @endif
                                        VNĐ
                                    </h5>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="your-order-head">
                            <h5>Hình thức thanh toán</h5>
                        </div>

                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="COD" checked="checked" data-order_button_text="">
                                    <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="beta-btn primary">
                                Đặt hàng
                                <i class="fa fa-chevron-right">
                                </i>
                            </button>
                        </div>

                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
