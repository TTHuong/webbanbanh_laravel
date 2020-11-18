@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Chi tiết sản phẩm {{$ct_sp->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Chi tiết sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="source/image/product/{{$ct_sp->image}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title" style="font-weight: bolder;font-size: 20px;">{{$ct_sp->name}}</p>
                            <p class="single-item-price">
                                @if($ct_sp->promotion_price==0)
                                <span class="flash-sale">{{number_format($ct_sp->unit_price)}} VNĐ</span>
                                @else
                                <span class="flash-del">{{number_format($ct_sp->unit_price)}} VNĐ</span>
                                <span class="flash-sale">{{number_format($ct_sp->promotion_price)}} VNĐ</span>
                                @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>
                                {{$ct_sp->description}}
                            </p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <p>Lựa Chọn :</p>
                        <div class="single-item-options">
                            <select class="wc-select" name="color">
                                <option>Số lượng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <a class="add-to-cart" href="{{route('themgiohang',$ct_sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Mô tả</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{$ct_sp->description}}</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Sản Phẩm Cùng Loại</h4>

                    <div class="row">
                        @foreach($sp_theoloai as $sp)
                        <div class="col-sm-4">
                            <div class="single-item">
                                <div class="ribbon-wrapper">
                                    @if($sp->promotion_price!=0)
                                    <div class="ribbon sale">Sale</div>
                                    @endif
                                </div>
                                <div class="single-item-header">
                                    <a href="{{route('chitietsanpham',$sp->id)}}"><img src="source/image/product/{{$sp->image}}" alt="" height="250px"></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$sp->name}}</p>
                                    <p class="single-item-price">
                                        @if($sp->promotion_price==0)
                                        <span class="flash-sale">{{number_format($sp->unit_price)}} VNĐ</span>
                                        @else
                                        <span class="flash-del">{{number_format($sp->unit_price)}} VNĐ</span>
                                        <span class="flash-sale">{{number_format($sp->promotion_price)}} VNĐ</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{{route('themgiohang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('chitietsanpham',$sp->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        {{ $sp_theoloai->render('name') }}
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Bán chạy nhất</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($banchay as $bc)
                            <div class="media beta-sales-item">

                                <a class="pull-left" href="{{route('chitietsanpham',$bc->id)}}"><img src="source/image/product/{{$bc->image}}" alt=""></a>
                                <div class="media-body">
                                    {{$bc->name}}
                                    <p class="single-item-price" style="font-size: 15px;">
                                        @if($bc->promotion_price==0)
                                        <span class="flash-sale">{{number_format($bc->unit_price)}} VNĐ</span>
                                        @else
                                        <span class="flash-del">{{number_format($bc->unit_price)}} VNĐ</span>
                                        <span class="flash-sale">{{number_format($bc->promotion_price)}} VNĐ</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm mới</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($new_product as $sp)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('chitietsanpham',$sp->id)}}"><img src="source/image/product/{{$sp->image}}" alt=""></a>
                                <div class="media-body">
                                    {{$sp->name}}
                                    <p class="single-item-price" style="font-size: 15px;">
                                        @if($bc->promotion_price==0)
                                        <span class="flash-sale">{{number_format($bc->unit_price)}} VNĐ</span>
                                        @else
                                        <span class="flash-del">{{number_format($bc->unit_price)}} VNĐ</span>
                                        <span class="flash-sale">{{number_format($bc->promotion_price)}} VNĐ</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
