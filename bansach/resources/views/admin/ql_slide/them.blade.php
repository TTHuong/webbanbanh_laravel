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

            @if(Session::has('thongbao_themslide'))
            <div class="alert alert-{{Session::get('flag')}} row" role="alert">
                {{Session::get('thongbao_themslide')}}
            </div>
            @else
            <div></div>
            @endif
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('qlslide')}}">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>

                    Thêm slide
                </a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form enctype="multipart/form-data" method="post" action=" {{route('themslide')}} ">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Link </label>
                        <input type="text" class="form-control" name="link" placeholder="https://www.youtube.com/...">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Hình Slide </label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Trình Chiếu </label>
                        <select class="form-control" name="show" id="exampleFormControlSelect1">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiện</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Thêm</button>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
