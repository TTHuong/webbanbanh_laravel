@extends('master')
@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Liên Hệ</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Liên hệ</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="beta-map">

    <div class="abs-fullwidth beta-map wow flipInX">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.7718406141366!2d106.67239731411811!3d10.98058675839626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d12739baa5ed%3A0xf500a5c3425a73a3!2zxJDhuqFpIGjhu41jIFRo4bunIEThuqd1IE3hu5l0!5e0!3m2!1svi!2s!4v1605197080646!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">

        <div class="space50">&nbsp;</div>
        <div class="row">
            <div class="col-sm-8">
                <h2>Mẫu liên hệ</h2>
                <div class="space20">&nbsp;</div>
                <p>các bạn có bất vấn đề gì với website các bạn có thể liên hệ với website theo mẫu dưới đây</p>
                <div class="space20">&nbsp;</div>
                @if(Session::has('thongbao_lienhe'))
                <div class="alert alert-success row" role="alert">
                    {{Session::get('thongbao_lienhe')}}
                </div>
                @else
                <div></div>
                @endif
                <form action="{{route('phanhoi')}}" method="POST" class="contact-form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-block">
                        <input name="name" type="text" required placeholder="Họ và tên (*) ">
                    </div>
                    <div class="form-block">
                        <input name="email" type="email" required placeholder="Email của bạn (*) ">
                    </div>
                    <div class="form-block">
                        <input name="subject" type="text" required placeholder="Tiêu đề (*) ">
                    </div>
                    <div class="form-block">
                        <textarea name="message" required placeholder="Nội dung (*) "></textarea>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="beta-btn primary">Gửi <i class="fa fa-chevron-right"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <h2>Thông tin liên hệ</h2>
                <div class="space20">&nbsp;</div>

                <h6 class="contact-title">Địa chỉ</h6>
                <p>
                    06 Trần Văn Ơn, <br />
                    Phú Hoà, Thủ Dầu Một<br />
                    Bình Dương
                </p>
                <div class="space20">&nbsp;</div>
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
