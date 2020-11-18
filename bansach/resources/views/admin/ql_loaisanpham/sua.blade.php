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

            @if(Session::has('thongbao_sualoaisanpham'))
            <div class="alert alert-{{Session::get('flag')}} row" role="alert">
                {{Session::get('thongbao_sualoaisanpham')}}
            </div>
            @else
            <div></div>
            @endif
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('qlloaisanpham')}}">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>

                    Sửa loại sản phẩm
                </a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form enctype="multipart/form-data" method="post" action=" {{route('sualoaisanpham',$type_products->id)}} ">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tên Loại Sản Phẩm </label>
                        <input type="text" class="form-control" value=" {{$type_products->name}} " name="name" placeholder="Bánh Chua ...  ">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Mô Tả </label>
                        <textarea class="form-control" name="description" rows="5" placeholder="bánh a là .....">
                        {{$type_products->description}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Hình Sản Phẩm </label>
                        <input type="file" class="form-control-file" name="image">
                        <img src="{{ asset('source/image/producttype/'.$type_products->image) }}" style="margin-top: 10px; height: 100px; width: 100px;" class="img-thumbnail">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Lưu</button>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
