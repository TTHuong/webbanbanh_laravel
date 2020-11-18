@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Giới thiệu</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trang-chu')}}">Trang chủ </a> / <span>Giới thiệu</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        <div class="our-history">
            <h2 class="text-center wow fadeInDown">Lịch Sử Ra Đời</h2>
            <div class="space35">&nbsp;</div>

            <div class="history-slider">
                <div class="history-navigation">
                    <a data-slide-index="0" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2014</span></a>
                    <a data-slide-index="1" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2015</span></a>
                    <a data-slide-index="2" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2016</span></a>
                    <a data-slide-index="3" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2017</span></a>
                    <a data-slide-index="4" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2018</span></a>
                    <a data-slide-index="5" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2019</span></a>
                    <a data-slide-index="6" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2020</span></a>
                </div>

                <div class="history-slides">
                    <div>
                        <div class="row">
                            <div class="col-sm-5">
                                <img width="470px" height="470px" src="https://scontent-hkg4-1.xx.fbcdn.net/v/t1.0-9/115770037_2695442214063590_8358167770446711357_n.jpg?_nc_cat=105&ccb=2&_nc_sid=09cbfe&_nc_ohc=oIM38rZ_8RsAX9T1ign&_nc_ht=scontent-hkg4-1.xx&oh=67ccc0f956fce52ad0b8d14d4d5a969e&oe=5FD2CE1A" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Đệ nhất ( chủ tiệm đời đầu )</h5>
                                <p>
                                    06 Trần Văn Ơn, <br />
                                    Phú Hoà, Thủ Dầu Một<br />
                                    Bình Dương
                                </p>
                                <div class="space20">&nbsp;</div>
                                <p> đây là người thành lập và sáng lập ra tiệm bánh ,ông thành lập khi mình còn là sinh viên tay trắng không có gì trong tay,
                                    ông đã mượn nợ và gầy dựng tiệm bánh như ngày nay , ông là người chế ra bánh mì bô xăng lửa</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-5">
                                <img width="470px" height="470px" src="https://scontent.fsgn4-1.fna.fbcdn.net/v/t1.0-9/36231253_607227256325946_5608352562651594752_n.jpg?_nc_cat=100&ccb=2&_nc_sid=8bfeb9&_nc_ohc=6erqXWcyJNcAX8RMXmP&_nc_ht=scontent.fsgn4-1.fna&oh=8719b50eabda788b294e6f1eaca28214&oe=5FD2D8FD" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Đệ nhị (chủ tiệm đời thứ hai )</h5>
                                <p>
                                    06 Trần Văn Ơn, <br />
                                    Phú Hoà, Thủ Dầu Một<br />
                                    Bình Dương
                                </p>
                                <div class="space20">&nbsp;</div>
                                <p> đây là người đã phát triển tiệm bánh trong lúc tiệm gặp khó khăn, với bí kiếm bánh chia tay do ông chế ,
                                    nó kế thừa hương vị từ bánh mì bô xăng lửa</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-5">
                                <img width="470px" height="470px" src="https://scontent-hkg4-1.xx.fbcdn.net/v/t1.0-9/65169267_871619949866231_603302678700752896_o.jpg?_nc_cat=107&cb=846ca55b-311e05c7&ccb=2&_nc_sid=ad2b24&_nc_ohc=BR46Asq9PNEAX-UQ9ay&_nc_ht=scontent-hkg4-1.xx&oh=8ead06100e2e6c91ab56859538e33be0&oe=5FD3A8D4" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Đệ tam (chủ tiệm đời thứ ba )</h5>
                                <p>
                                    06 Trần Văn Ơn, <br />
                                    Phú Hoà, Thủ Dầu Một<br />
                                    Bình Dương
                                </p>
                                <div class="space20">&nbsp;</div>
                                <p> đây có thể nói là người sắp phá hư tiệm bánh, dẫn tới nguy cơ sấp phá sản nhưng cho chí thú làm ăn vào phút cuối,
                                    nên đã cứu được tiệm bánh và biến cơ hội thành bàn thắng
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-5">
                                <img width="470px" height="470px" src="https://scontent-hkg4-1.xx.fbcdn.net/v/t1.0-9/109462866_2671395109812703_6389763839187451902_o.jpg?_nc_cat=106&ccb=2&_nc_sid=8bfeb9&_nc_ohc=D56jQjJWdRkAX8QUPAd&_nc_ht=scontent-hkg4-1.xx&oh=f7fef0a94ed90d83a8a536dcecd43fb7&oe=5FD108BB" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Đệ tứ (chủ tiệm đời thứ tư )</h5>
                                <p>
                                    06 Trần Văn Ơn, <br />
                                    Phú Hoà, Thủ Dầu Một<br />
                                    Bình Dương
                                </p>
                                <div class="space20">&nbsp;</div>
                                <p> đây có thể nói là đời chủ tiệm đẹp trai nhất, ông là người đẹp trai, nhưng trái với vẻ đẹp trai đó thì ông có cá tính hơi hãm nên vẫn ế,
                                    và theo đuổi mãi một người con gái vẫn không được.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-5">
                                <img width="470px" height="470px" src="https://scontent-hkg4-1.xx.fbcdn.net/v/t1.0-9/54519700_2303630669911415_7512472656306765824_n.jpg?_nc_cat=105&ccb=2&_nc_sid=ad2b24&_nc_ohc=IjMc7SpUZ2cAX8dtiQq&_nc_ht=scontent-hkg4-1.xx&oh=562b166a3026c0754ce154bab665c1ae&oe=5FD1C4B1" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Đệ ngũ (chủ tiệm đời thứ năm )</h5>
                                <p>
                                    06 Trần Văn Ơn, <br />
                                    Phú Hoà, Thủ Dầu Một<br />
                                    Bình Dương
                                </p>
                                <div class="space20">&nbsp;</div>
                                <p> đây có thể nói là bà chủ duy nhất cho tới hiện tại, trong thời của bà lúc bà còn làm chủ ,tiệm làm ăn vô cùng phát triển,
                                    với bí kiếp mục ruồi thần sầu, nhờ có cái mỗm vàng trong làng ăn uống , bà đã có thể tạo ra vô vàng hương vị bánh mới, cực kì lạ miệng
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-5">
                                <img width="470px" height="470px" src="https://scontent.fsgn4-1.fna.fbcdn.net/v/t1.0-9/75362421_971185319912552_3544195210089070592_o.jpg?_nc_cat=101&ccb=2&_nc_sid=730e14&_nc_ohc=8GMthCmjvCIAX8TWycB&_nc_ht=scontent.fsgn4-1.fna&oh=ecc2b4157b9fa6b88b448b3ec3318fc5&oe=5FD1410E" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Đệ lục (chủ tiệm đời thứ sáu )</h5>
                                <p>
                                    06 Trần Văn Ơn, <br />
                                    Phú Hoà, Thủ Dầu Một<br />
                                    Bình Dương
                                </p>
                                <div class="space20">&nbsp;</div>
                                <p> ông là đời chủ tiệm vô cùng nhạt nhẽ và chả có gì đặc sắc trong thời của ông, có tính ít nói hiếm khi thấy mật nên rất ít hình,
                                    người đời hay gọi ông là đàn bà cổ nhân
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-5">
                                <img width="470px" height="470px" src="https://scontent-hkg4-2.xx.fbcdn.net/v/t1.0-9/121808589_1253711214993293_6276613313570543264_o.jpg?_nc_cat=111&cb=846ca55b-311e05c7&ccb=2&_nc_sid=09cbfe&_nc_ohc=rl2mlTnqT68AX-d26t4&_nc_ht=scontent-hkg4-2.xx&oh=d439ee0a4573962bfc82b8d42684459b&oe=5FD484EE" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Đệ thất (chủ tiệm đời thứ bảy )</h5>
                                <p>
                                    06 Trần Văn Ơn, <br />
                                    Phú Hoà, Thủ Dầu Một<br />
                                    Bình Dương
                                </p>
                                <div class="space20">&nbsp;</div>
                                <p> là chủ tiệm hiện tại vô cùng cute ,dễ mếm dễ gần, hiền đẹp, hết xảy
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="space50">&nbsp;</div>
        <hr />
        <div class="space50">&nbsp;</div>
        <h2 class="text-center wow fadeInDown">Luôn Tận Tình Phục Vụ Khách Hàng</h2>
        <div class="space20">&nbsp;</div>
        <p class="text-center wow fadeInLeft">Lấy niềm vui của khách hàng làm động lực cho tiệm.<br /> Thành thật cảm ơn tất cả những vị khách đã ủng hộ và đồng cùng tiệm qua bao gian khổ. </p>
        <div class="space35">&nbsp;</div>

        <div class="row">
            <div class="col-sm-2 col-sm-push-2">
                <div class="beta-counter">
                    <p class="beta-counter-icon"><i class="fa fa-user"></i></p>
                    <p class="beta-counter-value timer numbers" data-to="{{count($ct)}}" data-speed="2000"></p>
                    <p class="beta-counter-title">Khách hàng</p>
                </div>
            </div>

            <div class="col-sm-2 col-sm-push-2">
                <div class="beta-counter">
                    <p class="beta-counter-icon"><i class="fa fa-list-alt"></i></p>
                    <p class="beta-counter-value timer numbers" data-to="{{count($lsp)}}" data-speed="2000"></p>
                    <p class="beta-counter-title">Loại sản phẩm </p>
                </div>
            </div>

            <div class="col-sm-2 col-sm-push-2">
                <div class="beta-counter">
                    <p class="beta-counter-icon"><i class="fas fa-cookie-bite"></i></p>
                    <p class="beta-counter-value timer numbers" data-to="{{count($sp)}}" data-speed="2000"></p>
                    <p class="beta-counter-title">Sản Phẩm </p>
                </div>
            </div>

            <div class="col-sm-2 col-sm-push-2">
                <div class="beta-counter">
                    <p class="beta-counter-icon"><i class="fa fa-clock-o"></i></p>
                    <p class="beta-counter-value timer numbers" data-to="24" data-speed="2000"></p>
                    <p class="beta-counter-title">Thời gian</p>
                </div>
            </div>
        </div> <!-- .beta-counter block end -->

    </div> <!-- #content -->
</div> <!-- .container -->
@endsection


