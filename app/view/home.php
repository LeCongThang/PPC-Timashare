<?php include 'header.php'; ?>
    <!--phần container giới thiệu thứ 1-->
    <div class="container">
        <div class="row text-left">
            <div class="col-md-12 col-sm-12">
                <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
                <h2>{GioiThieu}</h2>
            </div>
            <div class="col-md-6 col-sm-12">
                <img src="<?= BASE_URL ?><?= $gioithieu['img_tieude'] ?>" style="width:100%;">
            </div>
            <div class="col-md-6 col-sm-12">
                <h4><b><?= $gioithieu['tieu_de'] ?></b></h4>
                <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
                <br>
                <p id="van_ban"> <?= $gioithieu['noidung_gioithieu1'] ?></p>
                <p id="van_ban"> <?= $gioithieu['noidung_gioithieu2'] ?></p>
            </div>
        </div>
    </div>
    <!--phần container giới thiệu thứ 1-->

    <!--phần container giới thiệu thứ 2-->
    <div class="row space" id="row_so">
        <div class="container">
            <h2 style="color:white;text-align:center;">{WhatIsTimeShare}</h2>
            <div class="col-md-6 col-sm-12" id="banner_5">
                <div class="image_banner">
                    <img src="<?= BASE_URL ?>img/banner_5.png" style="width:100%;" alt="">
                </div>
                <div id="conten_banner">
                    <h4><b>1.{TitleWhatIsTimeShare1}</b></h4>
                    <!--<br>-->
                    <p>{ContentWhatIsTimeShare1}</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 " id="banner_5">
                <div class="image_banner">
                    <img src="<?= BASE_URL ?>img/banner_6.png" style="width:100%;" alt="">
                </div>
                <div id="conten_banner">
                    <h4><b>2.{TitleWhatIsTimeShare2}</b></h4>
                    <!--<br>-->
                    <p>{ContentWhatIsTimeShare2}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row space" id="conten_banner2">
            <div class="col-md-12 col-sm-12">
                <h3><b>{TitleActivitiesOfTimeShare}</b></h3>
                <hr class="text-left" style="width:150px;border:2px solid #362516;">

                <p id="van_ban"><b>{ContentActivitiesOfTimeShare}</b></p>

            </div>
        </div>
        <!--row so 2-->
        <div class="row space">

            <div class="col-md-12 col-sm-12">
                <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
                <h3><b>{InternationalCorporation}</b></h3>
            </div>
            <div class="col-md-6 col-sm-12" id="banner_5">

                <h4><b>1.{InternationalCorporation1}</b></h4>
                <h5><b>{TTInternationalCorporation1}</b></h5>
                <div id="van_ban">
                    <p>{CTInternationalCorporation11}</p>
                    <p{TTInternationalCorporation12}</p>
                </div>
            </div>
            <!--col so 2-->
            <div class="col-md-6 col-sm-12" id="banner_5">
                <img src="<?= BASE_URL ?>img/banner_hoptac.png" style="width:100%" alt="">
            </div>
        </div>
        <!--row so 2-->
        <div class="row space text-center">
            <h3><b>{ExchangeEasier}</b></h3>
            <div class="col-md-4 col-sm-12" id="banner_5">
                <!--<div class="media">-->
                <img src="<?= BASE_URL ?>img/money.png" alt=""><br>
                <br>
                <h4>{TTInternationalCorporation2}</h4>
                <div class="thongtin_so" style="text-align:justify;">
                    <p id="van_ban">{CTInternationalCorporation2}<br><a href="#">{TimHieuThem}</a></p>
                </div>
            </div>
            <!--so 1-->
            <div class="col-md-4 col-sm-12" id="banner_5">
                <img src="<?= BASE_URL ?>img/coconut tree.png" alt=""> <br>
                <br><h4>{TTInternationalCorporation3}</h4>
                <div class="van_ban" style="text-align:justify;">
                    <p id="van_ban">{CTInternationalCorporation3}<br> <a href="#">{TimHieuThem}</a></p>
                </div>
            </div>
            <!--so 2-->
            <div class="col-md-4 col-sm-12" id="banner_5">
                <img src="<?= BASE_URL ?>img/check.png" alt="">
                <br><br>
                <h4>{TTInternationalCorporation4}</h4>
                <div id="van_ban" style="text-align:justify;">
                    <p>{CTInternationalCorporation4}<br><a href="#">{TimHieuThem}</a></p>

                </div>
            </div>
            <!--so 3-->
        </div>
        <!-- phan tiep theo -->
        <div class="row space">
            <div class="col-md-12 col-sm-12" id="banner_5">
                <h4><b>2.{InternationalCorporation2}</b></h4>
                <!-- <h4>MẠNG LƯỚI KHU NGHĨ DƯỠNG PHONG PHÚ</h4> -->
                <div id="van_ban">
                    <p>{ContentInternationalCorporation2}</p>
                </div>
            </div>
            <!--col so 2-->
        </div>
        <div class="row space">

            <div class="col-md-12 col-sm-12">
                <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
                <h3>{ThamGia} PPC TIMESHARE</h3>
            </div>
            <div class="col-md-6 col-sm-12" id="banner_5">
                <div class="media">
                    <div class="media-left" id="banner_5">
                        <img src="<?= BASE_URL ?>img/banner-knd1.jpg" style="width:100%;">
                    </div>
                    <div class="media-right" id="banner_5">
                        <img src="<?= BASE_URL ?>img/banner-knd2.jpg" style="width:100%;">

                    </div>
                </div>
                <div class="media">
                    <div class="media-body" id="banner_5">
                        <img src="<?= BASE_URL ?>img/banner-knd3.jpg" class="img-reponsive">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12" id="banner_5">
                <img src="<?= BASE_URL ?>img/banner-knd4.jpg" class="img-reponsive">
            </div>
            <div class="col-md-12 col-sm-12" id="banner_5">
                <img src="<?= BASE_URL ?>img/banner-knd5.jpg" class="img-reponsive">
            </div>
        </div>
        <!-- phan tiep theo -->
        <div class="row space">
            <div class="col-md-12 col-sm-12">
                <hr class="text-left" style="width:50px;border:2px solid #660000;margin-left:0px;margin-bottom:0px;">
                <h3><b>{TroGiup}</b></h3>
                <a href="#" style="color:#660000;"><h4>{CauHoiThuongGap}</h4></a>
                <a href="#" style="color:#660000;"><h4>{CachSuDung} PPC TIMESHARE</h4></a>

            </div>
            <div class="col-md-12 col-sm-12">
                <h4>{LienHe}</h4>
            </div>
            <form action="<?= BASE_URL . $_SESSION['lang'] ?>/controller/lienHe" method="post">
                <div class="col-md-4 col-sm-12">
                    <div class="input-group" style="width:100%;">
                        <!-- <span class="input-group-addon" id="basic-addon1">@</span> -->
                        <input type="text" class="form-control" placeholder='{Ten}'
                               style="width:100%;border:1px solid grey;border-radius:2px;"
                               aria-describedby="basic-addon1" name="ten"
                               id="ten">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="input-group" style="width:100%;">
                        <!-- <span class="input-group-addon" id="basic-addon1">@</span> -->
                        <input type="text" class="form-control"
                               style="width:100%;border:1px solid grey; border-radius:2px;"
                               aria-describedby="basic-addon1" id="dienthoaicongty" placeholder='{DienThoai}'
                               name="dienthoaicongty">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="input-group" style="width:100%;">
                        <!-- <span class="input-group-addon" id="basic-addon1">@</span> -->
                        <input type="text" class="form-control"
                               style="width:100%;border:1px solid grey; border-radius:2px;"
                               aria-describedby="basic-addon1" id="email" placeholder='{Email}' name="email">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" id="banner_5">
                    <div class="input-group" style="width:100%;">
                    <textarea rows="10" cols="159" style="width:100%;border:1px solid grey; border-radius:2px;"
                              class="ckeditor" id="ckeditor" placeholder="YOUR MESSAGE" name="loinhan">
                    </textarea>
                    </div>
                    <p><span style="color: red;" id="thongbaoguilh"></span></p>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="input-group" style="width:100%;text-align: center!important;">
                        <input type="submit" class="form-control"
                               style="width:100%;border:1px solid grey; border-radius:2px;"
                               aria-describedby="basic-addon1" id="btn_gui" value={Gui}>
                    </div>
                </div>
        </div>
        </form>
        <!-- map  -->
        <!--    <div class="row space">-->
        <!--        <div class="col-md-12 col-sm-12">-->
        <!--            <div id="map" style="width:100%;height:400px;background-color:grey;">-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    <div class="row space">-->
        <!--        <div class="col-md-12 col-sm-12">-->
        <!--            <hr class="text-left" style="width:70px;border:2px solid #660000;margin-left:0px;margin-bottom:0px;">-->
        <!--            <h4>PPC TIMESHARE TV</h4>-->
        <!--        </div>-->
        <!--        <div class="col-md-6 col-sm-12">-->
        <!--            <iframe width="100%" height="380" src="https://www.youtube.com/embed/XGSy3_Czz8k">-->
        <!--            </iframe>-->
        <!--        </div>-->
        <!--        <div class="col-md-6 col-sm-12">-->
        <!--            <h4 style="margin-top:0px;">OUR VIDEOS</h4>-->
        <!--            <hr style="width:100%;border:1px solid #362516;margin-left:0px;">-->
        <!--            <div class="media">-->
        <!--                <div class="media-left">-->
        <!--                    <img src="--><? //=BASE_URL?><!--img/check.png" style="width:70%;">-->
        <!--                </div>-->
        <!--                <div class="media-left">-->
        <!--                    <p> iframe width="100%" height="345" src="https://www.youtube.com/embed/XGSy3_Czz8k"</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="media">-->
        <!--                <div class="media-left">-->
        <!--                    <img src="--><? //=BASE_URL?><!--img/check.png" style="width:70%;">-->
        <!--                </div>-->
        <!--                <div class="media-left">-->
        <!--                    <p> iframe width="100%" height="345" src="https://www.youtube.com/embed/XGSy3_Czz8k"</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="media">-->
        <!--                <div class="media-left">-->
        <!--                    <img src="--><? //=BASE_URL?><!--img/check.png" style="width:70%;">-->
        <!--                </div>-->
        <!--                <div class="media-left">-->
        <!--                    <p> iframe width="100%" height="345" src="https://www.youtube.com/embed/XGSy3_Czz8k"</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="media">-->
        <!--                <div class="media-left">-->
        <!--                    <img src="--><? //=BASE_URL?><!--img/check.png" style="width:70%;">-->
        <!--                </div>-->
        <!--                <div class="media-left">-->
        <!--                    <p> iframe width="100%" height="345" src="https://www.youtube.com/embed/XGSy3_Czz8k"</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
    </div>
    <br><br><br>
    <!--phần container giới thiệu thứ 2-->
    <hr class="text-left" style="width:100%;border:2px solid #362516;margin-left:0px;margin-bottom:0px;">
<?php include 'footer.php'; ?>