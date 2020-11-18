@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sửa thông tin cá nhân</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Sửa thông tin cá nhân</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">

        <form action="" method="post" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Thông tin cá nhân</h4>
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

                    @if(Session::has('thongbao_suathongtin'))
                    <div class="alert alert-success row" role="alert">
                        {{Session::get('thongbao_suathongtin')}}
                    </div>
                    @else
                    <div></div>
                    @endif

                    <div class="form-block">
                        <label for="email">Địa chỉ Email (*) </label>
                        <input class="form-control" type="email"  name="email" >
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Họ và tên (*) </label>
                        <input class="form-control" value="{{Auth::user()->full_name}}" type="text" name="full_name" >
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa chỉ (*) </label>
                        <input class="form-control" value="{{Auth::user()->address}}" type="text" name="address" >
                    </div>


                    <div class="form-block">
                        <label for="phone">Số điện thoại (*) </label>
                        <input class="form-control" class="form-control" value="{{Auth::user()->phone}}" type="tel" name="phone" >
                    </div>
                    <div class="form-block">
                        <label for="phone">Mật khẩu (*) </label>
                        <input class="form-control" class="form-control" type="password" name="password" >
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Lưu </button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
