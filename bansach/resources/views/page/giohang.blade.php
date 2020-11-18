@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Giỏ Hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Giỏ hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="table-responsive">
            <!-- Shop Products Table -->
            <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                <thead>
                    <tr>
                        <th class="product-name">Sản phẩm</th>
                        <th class="product-price">Giá</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="product-subtotal">Tổng giá</th>
                        <th class="product-remove">Xóa sản phẩm </th>
                    </tr>
                </thead>
                <tbody>
                    @if(Session::has('cart'))
                    @foreach($product_card as $product)
                    <tr class="cart_item">
                        <td class="product-name">
                            <div class="media">
                                <img class="pull-left" src="source/image/product/{{$product['item']['image']}}" height="60px" width="60px" alt="">
                                <div class="media-body">
                                    <p class="font-large table-title">{{$product['item']['name']}}</p>
                                </div>
                            </div>
                        </td>

                        <td class="product-price">
                            <span class="amount">
                                @if($product['item']['promotion_price']==0)
                                {{number_format($product['item']['unit_price'])}} VNĐ
                                @else
                                {{number_format($product['item']['promotion_price'])}} VNĐ
                                @endif
                            </span>
                        </td>

                        <td class="product-quantity">
                            <span class="amount">
                                {{$product['qty']}}
                            </span>
                        </td>

                        <td class="product-subtotal">
                            <span class="amount">
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
                        </td>

                        <td class="product-remove">
                            <a href="{{route('xoagiohang',$product['item']['id'])}}" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>

                <tfoot>
                    <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-name"></th>
                                <th class="product-price">Tổng tiền giỏ hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product-name">
                                    <a href="{{route('dathang')}}" class="beta-btn primary">
                                        Đặt hàng
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                </td>
                                <td class="product-price">
                                    <span>
                                        <span class="amount">
                                            @if(Session::has('cart'))
                                            {{number_format(Session('cart')->totalPrice)}} VNĐ
                                            @endif
                                        </span>
                                    </span>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </tfoot>
            </table>
            <!-- End of Shop Table Products -->
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
