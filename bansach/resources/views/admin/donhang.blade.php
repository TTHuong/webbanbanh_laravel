@extends('admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bảng đơn hàng </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id Đơn Hàng </th>
                            <th>Tên Khách Hàng </th>
                            <th>Giới Tính Khách Hàng </th>
                            <th>Email Khách Hàng </th>
                            <th>Địa Chỉ Khách Hàng </th>
                            <th>Số Điện Thoại Khách Hàng </th>
                            <th>Ghi Chú </th>
                            <th>Ngày Đặt </th>
                            <th>Tổng Tiền </th>
                            <th>Phương Thức Thanh Toán </th>
                            <th>Chỉnh Sửa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id Đơn Hàng </th>
                            <th>Tên Khách Hàng </th>
                            <th>Giới Tính Khách Hàng </th>
                            <th>Email Khách Hàng </th>
                            <th>Địa Chỉ Khách Hàng </th>
                            <th>Số Điện Thoại Khách Hàng </th>
                            <th>Ghi Chú </th>
                            <th>Ngày Đặt </th>
                            <th>Tổng Tiền </th>
                            <th>Phương Thức Thanh Toán </th>
                            <th>Chỉnh Sửa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($donhang as $dh)
                        <tr>
                            <th>{{$dh->id_bill}}</th>
                            <th>{{$dh->name}}</th>
                            <th>{{$dh->gender}}</th>
                            <th>{{$dh->email}}</th>
                            <th>{{$dh->address}}</th>
                            <th>{{$dh->phone_number}}</th>
                            <th>{{$dh->note}}</th>
                            <th>{{$dh->date_order}}</th>
                            <th>{{number_format($dh->total)}}</th>
                            <th>{{$dh->payment}}</th>
                            <th>
                                <div class="row">
                                    <a href="{{route('qlchitietdonhang',$dh->id_bill )}}" class="col-lg-6" href="">
                                        <i class="fas fa-info-circle" aria-hidden="true"></i>
                                    </a>
                                    <a href=" {{ route('xoadonhang', $dh->id_bill ) }} " class="col-lg-6">
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
