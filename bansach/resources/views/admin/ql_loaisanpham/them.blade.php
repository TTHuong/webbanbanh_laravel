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

            @if(Session::has('thongbao_themloaisanpham'))
            <div class="alert alert-{{Session::get('flag')}} row" role="alert">
                {{Session::get('thongbao_themloaisanpham')}}
            </div>
            @else
            <div></div>
            @endif
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('qlloaisanpham')}}">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>

                    Thêm loại sản phẩm
                </a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form enctype="multipart/form-data" method="post" action=" {{route('themloaisanpham')}} ">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tên Loại Sản Phẩm </label>
                        <input type="text" class="form-control" name="name" placeholder="Bánh Chua ...  ">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Mô Tả </label>
                        <textarea class="form-control" name="description" rows="5" placeholder="bánh a là ....."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Hình Sản Phẩm </label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Thêm</button>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
