@extends('master')
@section('content')
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Tìm Kiếm</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($product as $np)
                            <div class="col-sm-3" style="margin-bottom: 10px;">
                                <div class="single-item">
                                    <div class="ribbon-wrapper">
                                        @if($np->promotion_price!=0)
                                        <div class="ribbon sale">Sale</div>
                                        @endif
                                    </div>

                                    <div class="single-item-header">
                                        <a href="{{route('chitietsanpham',$np->id)}}"><img src="source/image/product/{{$np->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$np->name}}</p>
                                        <p class="single-item-price" style="font-size: 18px;">
                                            @if($np->promotion_price==0)
                                            <span class="flash-sale">{{number_format($np->unit_price)}} VNĐ</span>
                                            @else
                                            <span class="flash-del">{{number_format($np->unit_price)}} VNĐ</span>
                                            <span class="flash-sale">{{number_format($np->promotion_price)}} VNĐ</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$np->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('chitietsanpham',$np->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="row">
                            {{ $product->render('name') }}
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
