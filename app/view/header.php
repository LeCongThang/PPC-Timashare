<!DOCTYPE html>
<html>
<head>
    <title>PPC Timeshare</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?= BASE_DIR ?>">
    <link href="<?= BASE_DIR ?>css/style.css" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_DIR ?>css/stylehover.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_DIR ?>css/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= BASE_DIR ?>css/stylehead.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_DIR ?>css/responsive.css">
    <link rel="stylesheet" href="<?=BASE_DIR?>font/css/font-awesome.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="<?= BASE_DIR ?>plugins/jQuery/jquery-2.2.3.min.js"></script>

    <script>var lang = '<?=$_SESSION['lang']?>'</script>

</head>
<body>
<div class="container">
    <nav class="navbar navbar-fixed-top navbar-custom" style="background-color:transparent" role="navigation">
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
                        <img src="<?= BASE_DIR ?>img/ppctimeshare.png" id="logo" class="img-responsive">
                    </a>
                </div>
            </div> <!--  end banner brand -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="res-display">
                <ul class="nav navbar-nav res-list" id="langue">
                    <li id="language">
                        <dl id="sample" class="dropdown">
                            <dt>
                                <?php
                                if ($_SESSION['lang'] == "vi") {
                                    echo '<a id="flag_lang" style="color: white;" href="#" onclick="return false;"><img class="flag"src="' . BASE_DIR . 'img/vietnamflag.jpg"alt=""/> Tiếng Việt <i class="fa fa-chevron-circle-down"></i></a>';
                                } else if ($_SESSION['lang'] == "en") {
                                    echo '<a id="flag_lang" style="color: white;" href="#" onclick="return false;"><img class="flag"src="' . BASE_DIR . 'img/icon_flag_usa.png"alt=""/> English <i class="fa fa-chevron-circle-down"></i></a>';
                                }
                                ?>
                            </dt>
                            <dd>
                                <ul>
                                    <li>
                                        <?php
                                        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                        if ($_SESSION['lang'] == "en") {
                                            $actual_link = str_replace("/en/","/vi/",$actual_link);
                                            if($actual_link==BASE_URL || $actual_link == BASE_URL_2)
                                                $actual_link = $actual_link."vi/";
                                        } else if ($_SESSION['lang'] == "vi") {
                                            $actual_link = str_replace("/vi/","/en/",$actual_link);
                                        }
                                        if ($_SESSION['lang'] == "en") {
                                            echo '<a id="flag_lang" style="color: white;" href="'.$actual_link.'" ><img style="margin-left: 5px;" class="flag"src="' . BASE_DIR . 'img/vietnamflag.jpg"alt=""/> Tiếng Việt</a>';
                                        } else if ($_SESSION['lang'] == "vi") {
                                            echo '<a id="flag_lang" style="color: white;" href="'.$actual_link.'" ><img style="margin-left: 5px;" class="flag"src="' . BASE_DIR . 'img/icon_flag_usa.png"alt=""/> English</a>';
                                        }
                                        ?>
                                    </li>
                                </ul>
                            </dd>
                        </dl>
                        <span id="result"></span>
                    </li>
                </ul>
            </div>
            <div class="res-display loginringht">
                <ul class="nav navbar-nav res-list" id="loginmenu">
                    <li id="btn-dn" style="list-style:none; ">
                        <?php
                        if (!isset($_SESSION['tendangnhap']))
                            echo '<button class="btn btn-sucessful dangNhap" style="border-radius:0px;margin-top:10px;" id="btnDangNhap" type="button" >{DangNhapDangKy}</button>';
                        else {
                            echo '<div class="dropdown btnUser"> <button id="btnXinChao"   class="btn btn-sucessful dropdown-toggle" type="button" data-toggle="dropdown">' . XinChao . $_SESSION['tentaikhoan'];
                            echo ' <span class="caret"></span></button><ul  style="background-color: #FAF9DB" class="dropdown-menu">';
                            echo '<li><a href ="#" class="thongtin" id="hrefXemThongTin" >{XemThongTinCaNhan}</a></li>';
                            echo '<li><a href ="' . BASE_URL . $_SESSION['lang'] . '/controller/getTransactionHistory" >{LichSuGiaoDich}</a></li>';
                            echo "<li><a href ='#' class='matkhau' id='hrefDoiMatKhau'><span style='color: #333'>" . DoiMatKhau . "</span></a></li>";
                            echo '<li><a href = "#"></a></li>';
                            echo '<li><a href ="' . BASE_URL . $_SESSION['lang'] . '/controller/dangxuat" ><span style="color: #333">' . Thoat . '</a></span></li>';
                            echo '</ul></div>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbar-brand-centered">
                <ul class="nav navbar-nav" id="menuleft">
                    <li id="trangChu"><a  href="<?= BASE_URL . $_SESSION['lang'] ?>/controller/index">{TrangChu}</a></li>
                    <li><a href="<?= $_SESSION['lang'] ?>/#introduce">{GioiThieu}</a></li>
                    <li><a href="<?= $_SESSION['lang'] ?>/#khunghiduong">{KhuNghiDuong}</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right menurightipd" id="menuright">
                    <li><a href="<?= $_SESSION['lang'] ?>/#thamgia">{ThamGia}</a></li>
                    <li><a href="<?= $_SESSION['lang'] ?>/#trogiup">{TroGiup}</a></li>
                    <li><a href="<?= $_SESSION['lang'] ?>/#lienhe">{LienHe}</a></li>
                    <li class="logindn" id="btn-dn">
                        <?php
                        if (!isset($_SESSION['tendangnhap']))
                            echo '<button class="btn btn-sucessful dangNhap" style="border-radius:0px;margin-top:10px;" id="btnDangNhap" type="button" >{DangNhapDangKy}</button>';
                        else {
                            echo '<div class="dropdown btnUser"> <button id="btnXinChao"   class="btn btn-sucessful dropdown-toggle" type="button" data-toggle="dropdown">' . XinChao . $_SESSION['tentaikhoan'];
                            echo ' <span class="caret"></span></button><ul  style="background-color: #FAF9DB" class="dropdown-menu">';
                            echo '<li><a href ="#" class="thongtin" id="hrefXemThongTin" >{XemThongTinCaNhan}</a></li>';
                            echo '<li><a href ="' . BASE_URL . $_SESSION['lang'] . '/controller/getTransactionHistory" >{LichSuGiaoDich}</a></li>';
                            echo "<li><a href ='#' class='matkhau' id='hrefDoiMatKhau'><span style='color: #333'>" . DoiMatKhau . "</span></a></li>";
                            echo '<li><a href = "#"></a></li>';
                            echo '<li><a href ="' . BASE_URL . $_SESSION['lang'] . '/controller/dangxuat" ><span style="color: #333">' . Thoat . '</a></span></li>';
                            echo '</ul></div>';
                        }
                        ?>
                    </li>
                </ul>
            </div> <!-- END COLLAPSE -->
            <div class="" id="resbtn-dn">
                <ul class="nav navbar-nav res-list">
                    <li>
                        <?php
                        if (!isset($_SESSION['tendangnhap']))
                            echo '<button class="btn btn-sucessful dangNhap" style="border-radius:0px;margin-top:10px;" id="btnDangNhap" type="button" >{DangNhapDangKy}</button>';
                        else {
                            echo '<div class="dropdown btnUser"> <button id="btnXinChao"   class="btn btn-sucessful dropdown-toggle" type="button" data-toggle="dropdown">' . XinChao . $_SESSION['tentaikhoan'];
                            echo ' <span class="caret"></span></button><ul  style="background-color: #FAF9DB" class="dropdown-menu">';
                            echo '<li><a href ="#" class="thongtin" id="hrefXemThongTin" >{XemThongTinCaNhan}</a></li>';
                            echo '<li><a href ="' . BASE_URL . $_SESSION['lang'] . '/controller/getTransactionHistory" >{LichSuGiaoDich}</a></li>';
                            echo "<li><a href ='#' class='matkhau' id='hrefDoiMatKhau'><span style='color: #333'>" . DoiMatKhau . "</span></a></li>";
                            echo '<li><a href = "#"></a></li>';
                            echo '<li><a href ="' . BASE_URL . $_SESSION['lang'] . '/controller/dangxuat" ><span style="color: #333">' . Thoat . '</a></span></li>';
                            echo '</ul></div>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div> <!-- end container-fluid -->
    </nav>
</div> <!-- end container -->
<header id="header">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators hidden">
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
                echo '<img  class = "img-responsive col-sm-12 col-md-12 col-lg-12  " src ="' . BASE_DIR . $itemSlider['image_slider'] . '">';
                echo '</div>';
                if ($itemSlider['tieude_slider'] != "" || $itemSlider['mota_slider'] != "") {
                    echo '<div class="carousel-caption"><div class = "row"> <div class="col-md offset-4 col-md-8 bannerDecription">';
                    echo '<h3 class = "myh3">' . $itemSlider['tieude_slider'] . '</h3>';
                    echo '<h4 class = "myh4">' . $itemSlider['mota_slider'] . '</h4>';
                    echo '</div></div>';
                } else {
                    echo '<div class="carousel-caption"><div class = "row"> <div class="col-md offset-4 col-md-8">';
                    echo '</div></div>';
                }
                echo '<center><a href="' . $itemSlider['link_lang'] . '" class="btnBookNow btn btn-default " id="disp" style="margin-bottom:10px;" >' . $itemSlider['noidung_slider'] . '</a></center></div></div>';
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
                    echo '<div class="col-sm-12 col-sm-3">';
                    if ($key == 0) echo '<div class="thumbnail" style="margin-left: 10px">';
                    else if ($key == 3) echo '<div class="thumbnail" style="margin-right: 10px">';
                    else echo '<div class="thumbnail">';
                    echo '<img class="img-responsive"" src="' . BASE_DIR . $khuNghiDuongBanner['image'] . '">';
                    echo ' <div class="caption"><h6 style="font-weight: normal!important;">' ?>{KhuNghiDuong2}<?php echo '</h6><h5>' . $khuNghiDuongBanner['name'] . '</h5><div class ="content_banner">' . $khuNghiDuongBanner['introduce'] . '</div>';
                    echo '<a href="' . BASE_URL . $_SESSION['lang'] . '/controller/loadingDetailsResort/' . $khuNghiDuongBanner['id'] . '" class="btn btn-default" id="btnreadmore">' ?>{TimHieuThem}<?php echo '</a></div></div></div>';
                }
                ?>
            </div><!--  End Row -->
        </div> <!-- end container -->
    </div>
    <!--    Modal dang nhap -->
    <?php
    if (!isset($_SESSION['id'])) {
        include 'modaldangnhap.php';
        include 'modaldangky.php';
        include 'modalquenmatkhau.php';
    } else {
        include 'modalxemthongtincanhan.php';
        include 'modaldoimatkhau.php';
    }
    ?>
</header>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="<?= BASE_DIR ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?= BASE_DIR ?>js/main.js"></script>

</body>
</html>