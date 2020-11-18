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

            @if(Session::has('thongbao_suaslide'))
            <div class="alert alert-{{Session::get('flag')}} row" role="alert">
                {{Session::get('thongbao_suaslide')}}
            </div>
            @else
            <div></div>
            @endif
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('qlslide')}}">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>

                    Sửa slide
                </a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form enctype="multipart/form-data" method="post" action=" {{route('suaslide',$slide->id)}} ">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Link </label>
                        <input type="text" class="form-control" name="link" value="{{$slide->link}}" placeholder="https://www.youtube.com/...">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Hình Slide </label>
                        <input type="file" class="form-control-file" name="image">
                        <img src="{{ asset('source/image/slide/'.$slide->image) }}" style="margin-top: 10px; height: 100px; width: 100px;" class="img-thumbnail">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Trình Chiếu </label>
                        <select class="form-control" name="show" id="exampleFormControlSelect1">
                            <option <?php if ($slide->show == 0) {
                                        echo 'selected';
                                    }  ?> value="0">Ẩn</option>
                            <option <?php if ($slide->show == 1) {
                                        echo 'selected';
                                    }  ?> value="1">Hiện</option>
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
