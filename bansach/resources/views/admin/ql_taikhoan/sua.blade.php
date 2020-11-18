@extends('admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            @if(count($errors)>0)
            <div class="alert alert-danger row" role="alert">
                @foreach($errors->all() as $error)
                {{$error}}
                @endforeach
            </div>
            @else
            <div></div>
            @endif

            @if(Session::has('thongbao_suataikhoan'))
            <div class="alert alert-success row" role="alert">
                {{Session::get('thongbao_suataikhoan')}}
            </div>
            @else
            <div></div>
            @endif
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('qltaikhoan')}}">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>

                    Sửa tài khoản
                </a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" action="{{route('suataikhoan',$user->id)}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Họ Và Tên </label>
                        <input type="text" class="form-control" name="full_name" value="{{$user->full_name}}" placeholder="Nguyễn Văn A ">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Quyền Hạn </label>
                        <select class="form-control" name="quyenhan" id="exampleFormControlSelect1">
                            <option <?php if ($user->quyenhan == 0) {
                                        echo 'selected';
                                    }  ?>>
                                0
                            </option>
                            <option <?php if ($user->quyenhan == 1) {
                                        echo 'selected';
                                    }  ?>>
                                1
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email </label>
                        <input type="email" class="form-control" name="email"  placeholder="example@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Mật Khẩu </label>
                        <input type="password" class="form-control" name="password" placeholder="122333@Abc">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Số Điện Thoại </label>
                        <input type="text" class="form-control" name="phone" value="{{$user->phone}}" placeholder="0849232871 ">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Địa Chỉ </label>
                        <textarea class="form-control" name="address" rows="5">
                        {{$user->address}}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Lưu</button>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
