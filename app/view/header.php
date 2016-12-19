<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <base href="<?=BASE_URL?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?=BASE_URL?>css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?=BASE_URL?>ckeditor/ckeditor.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>css/responsive.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>css/stylehead.css">

    <script type="text/javascript" >
        $(document).ready(function () {
            $('#dangky').click(function () {
                $('#thongbao').text("Hãy nhập đầy đủ thông tin");
                tendangnhap = $('#tendangnhap').val();
                matkhau = $('#matkhau').val();
                nhaplaimatkhau = $('#nhaplaimatkhau').val();
                hoten = $('#hoten').val();
                diachi = $('#diachi').val();
                dienthoai = $('#dienthoai').val();

                loi = 0;
                if (tendangnhap == "" || matkhau == "" || hoten == ""
                    || diachi == "" || dienthoai == "") {
                    loi++;
                    $('#thongbao').text("Hãy nhập đầy đủ thông tin");
                }

                if (matkhau != nhaplaimatkhau) {
                    loi++;
                    $('#thongbao').text("Mật khẩu nhập lại không trùng khớp");
                }

                if (isNaN(dienthoai)) {
                    loi++;
                    $('#thongbao').text("Điện thoại phải là số");
                }

                if (loi != 0) {
                    return false;
                }
            });
            $('#btn_dangnhap').click(function () {
                tendangnhap = $('#username').val();
                matkhau = $('#password').val();
                if (tendangnhap == "" || matkhau == "" ) {
                    $('#thongbaodn').text("Hãy nhập đầy đủ thông tin");
                    return false;
                }
                return true;
            });
        });

        
    </script>


</head>
<body style="height:5000px;">
<!-- header -->
<header>
    <nav class="navbar navbar-fixed-top" style= "background-color:none" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand navbar-brand-centered" style="background:none">
                    <a href=""><img alt="logo" class="img-responsive text-center" src="<?=BASE_URL?>img/logo.png"/></a>
                    <h4>TIME SHARE</h4>
                </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-brand-centered">
                <ul class="nav navbar-nav left" id="banner_5">
                    <li>
                        <div id="lang">
                            <a href="<?=BASE_URL?>vi/"> <img src="<?=BASE_DIR?>/img/icon_vi.gif" align=left></a>            
                            <a href="<?=BASE_URL?>en/"> <img src="<?=BASE_DIR?>/img/icon_en.png" align=left></a>
                        </div>

                    </li>
                    <li><a href="#">{TrangChu}</a></li>
                    <li><a href="#">{GioiThieu}</a></li>
                    <li><a href="#">{KhuNghiDuong}</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right" id="banner_5">
                    <li><a href="#">{ThamGia}</a></li>
                    <li><a href="#">{TroGiup}</a></li>
                    <li><a href="#">{LienHe}</a></li>
                    <li>
                        <button class="btn btn-info" style="border-radius:0px;margin-top:10px;" id="myBtn"
                                type="button">Đăng nhập - Đăng ký ngay
                        </button>
                    </li>
                </ul>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="close"><span class="glyphicon glyphicon-remove"></span></div>
                            <h3 style="text-align:center;"><b>ĐĂNG NHẬP</b></h3>
                        </div>
                        <div class="modal-body">
                            <form action="<?=BASE_URL?>controller/dangNhap" method="POST">
                                <div class="input-group" id="banner_5">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="username" type="text" class="form-control" name="username"
                                           placeholder="Tên đăng nhập">
                                </div>
                                <div class="input-group" id="banner_5">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="password" type="password" class="form-control" name="password"
                                           placeholder="Mật khẩu">
                                </div>
                                <div class="input-group" id="banner_5" style="margin-top: 10px">
                                    <span class="input-group-addon" id="cbNhoMatKhau">
                                        <input id="rememberme" style="height: 12px;width: 12px" type="checkbox"
                                               aria-label="Nhớ mật khẩu ?" class="form-control" name="rememberme">
                                    </span>
                                    Nhớ mật khẩu ?
                                </div>
                        </div>
                        <a href="<?=BASE_URL?>controller/chuyentrangdangky"><b>Bạn chưa có tài khoản ?</b></a>
                        <p><span style="color: red;" id="thongbaodn"></span></p>
                        <div class="modal-footer text-right">
                            <button type="submit" id="btn_dangnhap" name="btn_submit" class="btn btn-default">Đăng nhập</button>
                            <button type="button" id="btn_close" class="btn btn-default">Thoát</button>

                        </div>
                        </form>
                    </div>
                    <!-- Modal content -->


                </div>
            </div><!-- /.navbar-collapse -->
            <!-- /.container-fluid -->
        </div>
    </nav>
    <div class="wrap-main">

        <!-- <div class="container"> -->
        <div class="row">
            <div class="col-md-12 col-sm-12" style="margin-right:0px;margin-left:0px;">
                <div id="myCarousel" class="carouselslide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?=BASE_URL?>img/banner_main.jpg" id="image_option" alt="IN PHARETRA DUI VITAE ODIO">
                        </div>
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
</header>