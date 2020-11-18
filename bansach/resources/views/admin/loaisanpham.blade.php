@extends('admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bảng loại sản phẩm </h6>
        </div>
        <a href="{{route('themloaisanpham')}}" class="btn btn-success ">Thêm</a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên Loại Sản Phẩm </th>
                            <th>Mô Tả Loại Sản Phẩm </th>
                            <th>Hình </th>
                            <th>Chỉnh Sửa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên Loại Sản Phẩm </th>
                            <th>Mô Tả Loại Sản Phẩm </th>
                            <th>Hình </th>
                            <th>Chỉnh Sửa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($type_products as $tp)
                        <tr>
                            <th>{{$tp->name}}</th>
                            <th>{{$tp->description}}</th>
                            <th>
                                <img height="30px" width="40px" src="source/image/producttype/{{$tp->image}}" alt="">
                            </th>
                            <th>
                                <div class="row">
                                    <a href=" {{route('sualoaisanpham',$tp->id)}} " class="col-lg-6" href="">
                                        <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                    </a>
                                    <a href=" {{route('xoaloaisanpham',$tp->id)}} " class="col-lg-6">
                                        <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
