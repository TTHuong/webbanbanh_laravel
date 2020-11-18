@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng ký</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Đăng ký</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">

        <form action="{{route('dangky')}}" method="post" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng ký</h4>
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

                    @if(Session::has('thongbao_dangky'))
                    <div class="alert alert-success row" role="alert">
                        {{Session::get('thongbao_dangky')}}
                    </div>
                    @else
                    <div></div>
                    @endif

                    <div class="form-block">
                        <label for="email">Địa chỉ Email (*) </label>
                        <input class="form-control" type="email" name="email" >
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Họ và tên (*) </label>
                        <input class="form-control" type="text" name="fullname" >
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa chỉ (*) </label>
                        <input class="form-control" type="text" name="adress" >
                    </div>


                    <div class="form-block">
                        <label for="phone">Số điện thoại (*) </label>
                        <input class="form-control" class="form-control" type="tel" name="phone" >
                    </div>
                    <div class="form-block">
                        <label for="phone">Mật khẩu (*) </label>
                        <input class="form-control" class="form-control" type="password" name="password" >
                    </div>
                    <div class="form-block">
                        <label for="phone">Nhập lại mật khẩu (*) </label>
                        <input class="form-control" class="form-control" type="password" name="repassword" >
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Đăng ký </button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
