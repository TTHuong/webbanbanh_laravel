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

            @if(Session::has('thongbao_suasanpham'))
            <div class="alert alert-{{Session::get('flag')}} row" role="alert">
                {{Session::get('thongbao_suasanpham')}}
            </div>
            @else
            <div></div>
            @endif
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('qlsanpham')}}">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>

                    Sửa sản phẩm
                </a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form enctype="multipart/form-data" method="post" action="{{route('suasanpham',$product->id)}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tên Bánh </label>
                        <input type="text" class="form-control" value="{{$product->name}}" name="name" placeholder="Bánh A ">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Loại Sản Phẩm </label>
                        <select class="form-control" name="id_type" id="exampleFormControlSelect1">
                            @foreach($products_type as $pdt)
                            <option <?php if ($pdt->id == $product->id_type) {
                                        echo 'selected';
                                    }  ?> value="{{$pdt->id}}">
                                {{$pdt->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Mô Tả </label>
                        <textarea class="form-control" name="description" rows="5" placeholder="bánh a là .....">
                            {{$product->description}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Đơn Giá </label>
                        <input type="number" class="form-control" value="{{$product->unit_price}}" name="unit_price" placeholder="0">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Giá Khuyến mãi </label>
                        <input type="number" class="form-control" value="{{$product->promotion_price}}" name="promotion_price" placeholder="0">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Hình Sản Phẩm </label>
                        <input type="file" class="form-control-file" name="image">
                        <img src="{{ asset('source/image/product/'.$product->image) }}" style="margin-top: 10px; height: 100px; width: 100px;" class="img-thumbnail">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Đơn Vị </label>
                        <input type="text" class="form-control" value="{{$product->unit}}" name="unit" placeholder="Hộp,vĩ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Trạng Thái </label>
                        <select class="form-control" name="new">
                            <option <?php if ($product->new==0) {
                                        echo 'selected';
                                    }  ?> value="0">Cũ</option>
                            <option <?php if ($product->new==1) {
                                        echo 'selected';
                                    }  ?> value="1">Mới</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Lưu</button>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
