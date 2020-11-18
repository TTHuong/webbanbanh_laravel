@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng nhập</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('trang-chu')}}">Trang chủ </a> / <span>Đăng nhập</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">

        <form action="{{route('dangnhap')}}" method="post" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>

                    @if(count($errors)>0)
                    <div class="alert alert-danger row" role="alert">
                        @foreach($errors->all() as $error)
                        {{$error}}
                        @endforeach
                    </div>
                    @else
                    <div></div>
                    @endif

                    @if(Session::has('thongbao_dangnhap'))
                    <div class="alert alert-{{Session::get('flag')}} row" role="alert">
                        {{Session::get('thongbao_dangnhap')}}
                    </div>
                    @else
                    <div></div>
                    @endif

                    <div class="form-group">
                        <label for="email">Địa chỉ email (*) </label>
                        <input class="form-control" type="email" name="email" >
                    </div>
                    <div class="form-group">
                        <label for="phone">Mật khẩu (*) </label>
                        <input type="password" class="form-control" name="password" >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mb-2">Đăng nhập </button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
