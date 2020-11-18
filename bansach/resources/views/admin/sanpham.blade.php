@extends('admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bảng sản phẩm </h6>
        </div>
        <a href="{{route('themsanpham')}}" class="btn btn-success ">Thêm</a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên Sản Phẩm </th>
                            <th>Loại Sản Phẩm</th>
                            <th>Mô Tả </th>
                            <th>Đơn Giá </th>
                            <th>Giá Khuyến Mãi </th>
                            <th>Hình </th>
                            <th>Đơn Vị </th>
                            <th>Trạng Thái </th>
                            <th>Chỉnh Sửa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên Sản Phẩm </th>
                            <th>Loại Sản Phẩm</th>
                            <th>Mô Tả </th>
                            <th>Đơn Giá </th>
                            <th>Giá Khuyến Mãi </th>
                            <th>Hình </th>
                            <th>Đơn Vị </th>
                            <th>Trạng Thái </th>
                            <th>Chỉnh Sửa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($products as $pd)
                        <tr>
                            <th>{{$pd->name}}</th>
                            <th>{{$pd->loai}}</th>
                            <th>{{$pd->description}}</th>
                            <th>{{number_format($pd->unit_price)}}</th>
                            <th>{{number_format($pd->promotion_price)}}</th>
                            <th>
                                <img height="30px" width="40px" src="source/image/product/{{$pd->image}}" alt="">
                            </th>
                            <th>{{$pd->unit}}</th>
                            <th>
                                <?php
                                if ($pd->new == 1) {
                                    echo "Mới";
                                } else {
                                    echo "Cũ";
                                }
                                ?>
                            </th>
                            <th>
                                <div class="row">
                                    <a href="{{route('suasanpham',$pd->id)}}" class="col-lg-6" href="">
                                        <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{route('xoasanpham',$pd->id)}}" class="col-lg-6">
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
