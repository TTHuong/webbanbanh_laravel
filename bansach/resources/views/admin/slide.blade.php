@extends('admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bảng slide </h6>
        </div>
        <a href=" {{route('themslide')}} " class="btn btn-success ">Thêm</a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Link </th>
                            <th>Hình </th>
                            <th>Trình Chiếu </th>
                            <th>Chỉnh Sửa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Link </th>
                            <th>Hình </th>
                            <th>Trình Chiếu </th>
                            <th>Chỉnh Sửa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($slide as $sl)
                        <tr>
                            <th>{{$sl->link}}</th>
                            <th>
                                <img height="30px" width="40px" src="source/image/slide/{{$sl->image}}" alt="">
                            </th>
                            <th>
                                <?php
                                if ($sl->show == 0) {
                                    echo "<i class='fas fa-eye-slash' ></i>";
                                } else {
                                    echo "<i class='fas fa-eye'  ' ></i>";
                                }
                                ?>
                            </th>
                            <th>
                                <div class="row">
                                    <a href=" {{route('suaslide',$sl->id)}} " class="col-lg-6" href="">
                                        <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                    </a>
                                    <a href=" {{route('xoaslide',$sl->id)}} " class="col-lg-6">
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
