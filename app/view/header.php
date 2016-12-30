<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?= BASE_DIR ?>">
    <link href="<?= BASE_DIR ?>css/style.css" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_DIR ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_DIR ?>css/responsive.css">
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
    <link rel="stylesheet" type="text/css" href="<?= BASE_DIR ?>css/stylehead.css">
    <script type="text/javascript"
            src="<?= BASE_DIR ?>bootstrapdatetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="<?= BASE_DIR ?>ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?= BASE_DIR ?>js/main.js"></script>
    <link rel="stylesheet" href="<?= BASE_DIR ?>bootstrapdatetimepicker/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?= BASE_DIR ?>bootstrapdatetimepicker/css/bootstrap.css"/>
    <script type="text/javascript" src="<?= BASE_DIR ?>bootstrapdatetimepicker/js/bootstrap-datetimepicker.min.js"/>
    <script type="text/javascript" src="<?= BASE_DIR ?>bootstrapdatetimepicker/js/bootstrap-datetimepicker.js"/>
    <script type="text/javascript" src="<?= BASE_DIR ?>bootstrapdatetimepicker/bootstrapv3/bootstrap/js/bootstrap.js"/>
    <script type="text/javascript">

    </script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-fixed-top" style="background-color:transparent" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand navbar-brand-centered">
                    <a href="<?= BASE_URL . $_SESSION['lang'] ?>/controller/index">
                        <img src="<?= BASE_DIR ?>img/logo.png" id="logo" class="img-responsive">
                    </a>
                </div>
            </div> <!--  end banner brand -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-brand-centered">
                <ul class="nav navbar-nav" class="menuleft">
                    <li id="language">
                        <dl id="sample" class="dropdown">
                            <dt>
                                <?php
                                if ($_SESSION['lang'] == "vi") {
                                    echo '<a href="#" onclick="return false;"><img class="flag"src="' . BASE_DIR . 'img/vietnamflag.gif"alt=""/> Asia-VietNamese</a>';
                                } else if ($_SESSION['lang'] == "en") {
                                    echo '<a href="#" onclick="return false;"><img class="flag"src="' . BASE_DIR . 'img/icon_en.png"alt=""/> Asia-English</a>';
                                }
                                ?>
                            </dt>
                            <dd>
                                <ul>
                                    <li><a href="<?= BASE_URL . "en/" ?>"><img class="flag"
                                                                               src="<?= BASE_DIR ?>img/icon_en.png"
                                                                               alt=""/>
                                            Asia-English<span class="value">En</span></a></li>
                                    <li><a href="<?= BASE_URL . "vi/" ?>"><img class="flag"
                                                                               src="<?= BASE_DIR ?>img/vietnamflag.gif"
                                                                               alt=""/>
                                            Asia-VietNamese<span class="value">Vi</span></a></li>
                                </ul>
                            </dd>
                        </dl>
                        <span id="result"></span>
                    </li>
                    <li><a href="<?= BASE_URL . $_SESSION['lang'] ?>/controller/index">{TrangChu}</a></li>
                    <li><a href="#introduce">{GioiThieu}</a></li>
                    <li><a href="#">{KhuNghiDuong}</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right" class="menuright">
                    <li><a href="#thamgia">{ThamGia}</a></li>
                    <li><a href="#trogiup">{TroGiup}</a></li>
                    <li><a href="#lienhe">{LienHe}</a></li>
                    <li>
                        <?php
                        if (!isset($_SESSION['tendangnhap']))
                            echo '<button class="btn btn-sucessful" id="btnDangNhap" style="border-radius:0px;margin-top:10px;" id="btnDangNhap" type="button">{DangNhapDangKy}</button>';
                        else {
                            echo '<div class="dropdown btnUser"> <button id="btnXinChao" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">' . XinChao . $_SESSION['tendangnhap'];
                            echo '<span class="caret"></span></button><ul style="background-color:#265a88" class="dropdown-menu">';
                            //echo '<li><a href ="#" id="hrefXemThongTin" >Xem thông tin cá nhân</a></li>';
                            echo "<li><a href ='#' id='hrefDoiMatKhau'>" . DoiMatKhau . "</a></li>";
                            echo '<li><a href = "#"></a></li>';
                            echo '<li><a href ="' . BASE_URL . $_SESSION['lang'] . '/controller/dangxuat" >' . Thoat . '</a></li>';
                            echo '</ul></div>';
                        }
                        ?>

                    </li>
                </ul>

            </div> <!-- END COLLAPSE -->
        </div> <!-- end container-fluid -->
    </nav>
</div> <!-- end container -->
<header id="header">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php
            foreach ($dssliderw as $key => $itemSlider) {
                if ($key == 0)
                    echo '<li class="indi active" data-target="#myCarousel" data-slide-to="' . $key . '"></li>';
                else
                    echo '<li class="indi" data-target="#myCarousel" data-slide-to="' . $key . '"></li>';
            } ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php
            foreach ($dssliderw as $key => $itemSlider) {
                if ($key == 0)
                    echo '<div class="item active">';
                else
                    echo '<div class="item">';
                echo '<div class="row">';
                echo '<img  class = " img-responsive col-sm-12 col-md-12 col-lg-12  " src ="' . BASE_DIR . $itemSlider['image_slider'] . '">';
                echo '</div>';
                if ($itemSlider['tieude_slider'] != "" || $itemSlider['mota_slider'] != "") {
                    echo '<div class="carousel-caption"><div class = "row"> <div class="col-md offset-4 col-md-8 bannerDecription">';
                    echo '<h3 class = "myh3h4">' . $itemSlider['tieude_slider'] . '</h3>';
                    echo '<h4 class = "myh3h4">' . $itemSlider['mota_slider'] . '</h4>';
                    echo '</div></div>';
                } else {
                    echo '<div class="carousel-caption"><div class = "row"> <div class="col-md offset-4 col-md-8">';
                    echo '</div></div>';
                }
                echo '<center><a href="' . $itemSlider['duongdan_slider'] . '" class="btnBookNow btn btn-default " style="margin-bottom:10px;" id="btnBN' . $key . '" >' . $itemSlider['noidung_slider'] . '</a></center></div></div>';

            }
            ?>
            <!--        </div>-->
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div id="whitecaption">
        </div>
        <div class="container" id="contentslide">
            <div class="row row-no-padding" id="row">
                <?php
                foreach ($dsKhuNghiDuongBanner as $key => $khuNghiDuongBanner) {
                    echo '<div class="col-sm-12 col-sm-3"> <div class="thumbnail"><img src="' . BASE_DIR . $khuNghiDuongBanner['link'] . '">';
                    echo ' <div class="caption"><h5>' ?>{KhuNghiDuong}<?php echo '</h5><h4>' . $khuNghiDuongBanner['ten'] . '</h4><p>' . $khuNghiDuongBanner['thongtin'] . '</p>';
                    echo '<a href="' . BASE_URL . $_SESSION['lang'] . '/controller/xemChiTietKhuNghiDuong/' . $khuNghiDuongBanner['id'] . '" class="btn btn-default" id="btnreadmore">' ?>{TimHieuThem}<?php echo '</a></div></div></div>';
                }
                ?>
            </div><!--  End Row -->
        </div> <!-- end container -->
    </div>
    <!--    Modal dang nhap -->
    <?php include 'modaldangnhap.php'; ?>
    <?php include 'modaldangky.php'; ?>
    <?php include 'modaldoimatkhau.php'; ?>
    <?php include 'modalquenmatkhau.php'; ?>
    <?php include 'modalbooknow.php'; ?>
    <div id="themkhunghiduong"></div><?php include 'modalthemkhunghiduong.php'; ?>
    <div id="thongtincanhan"></div><?php include 'modalxemthongtincanhan.php'; ?>

</header>

</body>
</html>