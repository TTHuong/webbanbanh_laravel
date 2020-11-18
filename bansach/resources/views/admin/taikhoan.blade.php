@extends('admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bảng tài khoản </h6>
        </div>
        <a href="{{route('themtaikhoan')}}" class="btn btn-success ">Thêm</a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Quyền Hạn</th>
                            <th>Họ và Tên</th>
                            <th>Email </th>
                            <th>Mật Khẩu</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Chỉnh Sửa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Quyền Hạn</th>
                            <th>Họ và Tên</th>
                            <th>Email </th>
                            <th>Mật Khẩu</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Chỉnh Sửa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($users as $us)
                        <tr>
                            <th>{{$us->quyenhan}}</th>
                            <th>{{$us->full_name}}</th>
                            <th>{{$us->email}}</th>
                            <th>{{$us->password}}</th>
                            <th>{{$us->phone}}</th>
                            <th>{{$us->address}}</th>
                            <th>
                                <div class="row">
                                    <a class="col-lg-6" href="{{route('suataikhoan',$us->id)}}">
                                        <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                    </a>
                                    <a class="col-lg-6" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                    </a>
                                </div>

                            </th>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc muốn xóa
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-primary" onclick="window.location='{{route('xoataikhoan',$us->id)}}'">Xóa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
