@extends('admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('qldonhang')}}">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Bảng chi tiết đơn hàng số {{$id}}
                </a>

            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên Sản Phẩm </th>
                            <th>Hình Sản Phẩm </th>
                            <th>Giá Sản Phẩm </th>
                            <th>Số Lượng Sản Phẩm </th>
                            <th>Chỉnh Sửa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên Sản Phẩm </th>
                            <th>Hình Sản Phẩm </th>
                            <th>Giá Sản Phẩm </th>
                            <th>Số Lượng Sản Phẩm </th>
                            <th>Chỉnh Sửa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($billdetaill as $bd)
                        <tr>
                            <th>{{$bd->name}}</th>
                            <th>
                                <img height="30px" width="40px" src="{{ asset('source/image/product/'.$bd->image) }}" alt="">
                            </th>
                            <th>{{$bd->unit_price}}</th>
                            <th>{{$bd->quantity}}</th>
                            <th>
                                <div class="row">
                                    <a href=" {{ route('xoachitietdonhang', $bd->id ) }} " class="col-lg-6">
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
