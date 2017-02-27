<?php include 'header.php'; ?>
    <script type="text/javascript" src="<?= BASE_DIR ?>js/paging_video.js"></script>
    <!--phần container giới thiệu thứ 1-->
    <section id="introduce" xmlns="http://www.w3.org/1999/html">
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
                    <h4 style="margin-top: 0px"><b><?= $gioithieu['tieu_de'] ?></b></h4>
                    <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
                    <br>
                    <p id="van_ban"> <?= $gioithieu['noidung_gioithieu'] ?></p>
                </div>
            </div>
        </div>
    </section>
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
                <p id="van_ban">{ContentActivitiesOfTimeShare}</p>
            </div>
        </div>
        <!--row so 2-->
        <div class="row space">
            <div class="col-md-12 col-sm-12">
                <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
                <h3><b>{InternationalCorporation}</b></h3>
            </div>
            <div class="col-md-6 col-sm-12" id="banner_5">
                <h4><b>1. {InternationalCorporation1}</b></h4>
                <h5><b style="color: #6B0706; font-weight: bold">{TTInternationalCorporation1}</b></h5>
                <div id="van_ban">
                    <p>{CTInternationalCorporation11}</p>
                    <p>{TTInternationalCorporation12}</p>
                </div>
            </div>
            <!--col so 2-->
            <div class="col-md-6 col-sm-12" id="banner_5">
                <img src="<?= BASE_URL ?>img/banner_hoptac.png" style="width:100%" alt="">
            </div>
        </div>
        <!--row so 2-->
        <div class="row space text-center">
            <h3><b style="color: #6B0706">{ExchangeEasier}</b></h3>
            <div class="col-md-4 col-sm-12" id="banner_5">
                <!--<div class="media">-->
                <img src="<?= BASE_URL ?>img/money.png" alt=""><br>
                <br>
                <h4 style="font-weight: bold">{TTInternationalCorporation2}</h4>
                <div class="thongtin_so" style="text-align:justify;">
                    <p id="van_ban">{CTInternationalCorporation2}<br>
                    </p>
                </div>
            </div>
            <!--so 1-->
            <div class="col-md-4 col-sm-12" id="banner_5">
                <img src="<?= BASE_URL ?>img/coconut tree.png" alt=""> <br>
                <br><h4 style="font-weight: bold">{TTInternationalCorporation3}</h4>
                <div class="van_ban" style="text-align:justify;">
                    <p id="van_ban">{CTInternationalCorporation3}<br>
                    </p>
                </div>
            </div>
            <!--so 2-->
            <div class="col-md-4 col-sm-12" id="banner_5">
                <img src="<?= BASE_URL ?>img/check.png" alt="">
                <br><br>
                <h4 style="font-weight: bold">{TTInternationalCorporation4}</h4>
                <div id="van_ban" style="text-align:justify;">
                    <p>{CTInternationalCorporation4}<br></p>
                </div>
            </div>
            <!--so 3-->
        </div>
        <!-- phan tiep theo -->
        <div class="row space">
            <div class="col-md-12 col-sm-12" id="banner_5">
                <h4><b>2. {InternationalCorporation2}</b></h4>
                <!-- <h4>MẠNG LƯỚI KHU NGHĨ DƯỠNG PHONG PHÚ</h4> -->
                <div id="van_ban">
                    <p>{ContentInternationalCorporation2}</p>
                </div>
            </div>
        </div>
        <section id="khunghiduong">
            <div class="row space">
                <div class="col-md-12 col-sm-12">
                    <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
                    <h3 style="font-weight: bold">{KhuNghiDuongGiaCa}</h3>
                </div>
                <div class="col-md-9 col-sm-12" id="img_left_img">
                    <div class="col-md-12 col-sm-12" id="img_top_img">
                        <div class='captions captions_top'>
                            <p><a href="<?= BASE_DIR . $_SESSION['lang'] ?>/controller/chuyenTrangKhuNghiDuongGiaCa">{DanhMucKhuNghiDuong}</a>
                            </p>
                        </div>
                        <?php echo "<img class='img-responsive khu_nghi_duong_gia_ca_img' src='data:image/jpg;base64," . base64_encode($array_img_t[0]->getImageBlob()) . "' />"; ?>
                    </div>
                    <div class="col-md-4 col-sm-6" id="img_left_bottom_img">
                        <div class='captions captions_bottom'>
                            <p><a href="<?= BASE_URL . $_SESSION['lang'] ?>/controller/loadingResortHintPage">{GoiYChoKyNghi}</a>
                            </p>
                        </div>
                        <?php echo "<img class='img-responsive khu_nghi_duong_gia_ca_img' src='data:image/jpg;base64," . base64_encode($array_img_t[1]->getImageBlob()) . "' />"; ?>
                    </div>
                    <div class="col-md-4 col-sm-6" id="img_mid_bottom_img">
                        <div class='captions captions_bottom'>
                            <p><a href="<?= BASE_URL . $_SESSION['lang'] ?>/controller/loadingDiscoverPage">{KhamPhaCacDiaDiem}</a>
                            </p>
                        </div>
                        <?php echo "<img class='img-responsive khu_nghi_duong_gia_ca_img' src='data:image/jpg;base64," . base64_encode($array_img_t[2]->getImageBlob()) . "' />"; ?>
                    </div>
                    <div class="col-md-4 col-sm-12" id="img_right_bottom_img">
                        <div class='captions captions_bottom'>
                            <p><a href="<?= BASE_URL . $_SESSION['lang'] ?>/controller/loadingResortNewPage">{CoGiMoiTaiTimeShare}</a>
                            </p>
                        </div>
                        <?php echo "<img class='img-responsive khu_nghi_duong_gia_ca_img' src='data:image/jpg;base64," . base64_encode($array_img_t[3]->getImageBlob()) . "' />"; ?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12" id="img_right_img">
                    <div class='captions captions_right'>
                        <p style="padding-top: 65%;text-align: center"><a
                                href="<?= BASE_URL . $_SESSION['lang'] ?>/controller/loadingDealsPage">{UuDaiDacBiet}</a>
                        </p>
                    </div>
                    <?php echo "<img class='img-responsive khu_nghi_duong_gia_ca_img' src='data:image/jpg;base64," . base64_encode($array_img_t[4]->getImageBlob()) . "' />"; ?>
                </div>

            </div>

        </section>
        <section id="thamgia">
            <div class="row space">
                <div class="col-md-12 col-sm-12">
                    <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
                    <h3 style="font-weight: bold">{ThamGia} PPC TIMESHARE</h3>
                </div>
                <div class="col-md-6 col-sm-12 thamgia" id="banner_5">
                    <div class="media">
                        <div class="media-left" id="banner_5">
                            <div class='th'>
                                <div class='caps'>
                                    <p>
                                        <a href="<?= $du_lieu_tham_gia['link_hinh_1'] ?>"><?= $du_lieu_tham_gia['label_hinh_1'] ?></a>
                                    </p>
                                </div>
                                <?php echo "<img class='img-responsive' src='data:image/jpg;base64," . base64_encode($array_img[0]->getImageBlob()) . "' />"; ?>
                            </div>
                        </div>
                        <div class="media-right" id="banner_5">
                            <div class='th'>
                                <div class='caps'>
                                    <p>
                                        <a href="<?= BASE_URL . $_SESSION['lang'] ?>/controller/loadingBenefitTimeShare"><?= $du_lieu_tham_gia['label_hinh_2'] ?></a>
                                    </p>
                                </div>
                                <?php echo "<img class='img-responsive' src='data:image/jpg;base64," . base64_encode($array_img[1]->getImageBlob()) . "' />"; ?>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-body" id="banner_5">
                            <div class='th'>
                                <div class='caps'>
                                    <p>
                                        <a href="<?= BASE_URL . $_SESSION['lang'] ?>/controller/loadingConnectPage"><?= $du_lieu_tham_gia['label_hinh_3'] ?></a>
                                    </p>
                                </div>
                                <?php echo "<img class='img-responsive' src='data:image/jpg;base64," . base64_encode($array_img[2]->getImageBlob()) . "' />"; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 thamgia" id="banner_5">
                    <div class='th'>
                        <div class='caps'>
                            <p>
                                <a href="<?= BASE_URL . $_SESSION['lang'] ?>/controller/loadingOwingATimeShare"><?= $du_lieu_tham_gia['label_hinh_4'] ?></a>
                            </p>
                        </div>
                        <?php echo "<img class='img-responsive' src='data:image/jpg;base64," . base64_encode($array_img[3]->getImageBlob()) . "' />"; ?>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 thamgia" id="banner_5" style="margin-top: 15px;">
                    <div class='th'>
                        <div class='caps'>
                            <p>
                                <a href="<?= BASE_URL . $_SESSION['lang'] ?>/controller/loadingAnnouncePage"><?= $du_lieu_tham_gia['label_hinh_5'] ?></a>
                            </p>
                        </div>
                        <?php echo "<img class='img-responsive' src='data:image/jpg;base64," . base64_encode($array_img[4]->getImageBlob()) . "' />"; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- phan tiep theo -->
        <div class="row space">
            <section id="trogiup">
                <div class="col-md-12 col-sm-12">
                    <hr class="text-left"
                        style="width:50px;border:2px solid #660000;margin-left:0px;margin-bottom:0px;">
                    <h3><b>{TroGiup}</b></h3>
                    <a href="#" onclick="return false;" class="trogiup" style="color:#660000;"><h4>
                            {CauHoiThuongGap}</h4>
                    </a>
                    <div id="tro_giup" style="display: none;">
                        <ul style="list-style-type: square;">
                            <?php
                            foreach ($cau_hoi_thuong_gap as $key => $items_cau_hoi) {
                                echo '<li class="cauhoi"><a class="test" href="#" onclick="return false;" ><span class="link_tim_hieu">' . $items_cau_hoi['cauhoi'] . '</span></a><ul class="cautraloi" style="display: none;" ><li class="noi_dung_link_tim_hieu"><p >' . $items_cau_hoi['cautraloi'] . '</p></li></ul></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </section>
            <section id="lienhe">
                <div class="col-md-12 col-sm-12">
                    <h4><b>{LienHe}</b></h4>
                </div>
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
                              id="loinhan"
                              placeholder="{NoiDung}" name="loinhan"></textarea>
                    </div>
                    <p><span style="color: red;" id="thongbaoguilh"></span></p>
                </div>
                <div class="col-md-9"></div>
                <div class="col-md-3" style="margin-top: -48px">
                    <div class="input-group" style="width:100%;margin-left: -15px;margin-top: -15px;">
                        <input type="submit" class="form-control"
                               style="width:100%;border:1px solid grey; border-radius:2px;"
                               aria-describedby="basic-addon1" id="btn_gui" value={Gui}>
                    </div>
                </div>
            </section>
        </div>
        <script>var lang = '<?=$_SESSION['lang']?>'</script>
        <div class="col-md-12 col-sm-12"
             STYLE="margin-top: 50px; margin-bottom: 50px; padding-left: 0px; padding-right: 0px">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5748836254843!2d106.68554394907014!3d10.767209992290113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f181c80d37b%3A0x11f037e825f6300e!2zMjQ0IEPhu5FuZyBRdeG7s25oLCBQaOG6oW0gTmfFqSBMw6NvLCBRdeG6rW4gMSwgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1482477318231"
                width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="row space">
            <div class="col-md-12 col-sm-12">
                <hr class="text-left" style="width:70px;border:2px solid #660000;margin-left:0px;margin-bottom:0px;">
                <h3><b>PPC TIMESHARE TV</b></h3>
                <br><br>
            </div>
            <?php

            //Detect special conditions devices
            $iPod = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
            $iPhone = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
            $iPad = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
            $Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
            $webOS = stripos($_SERVER['HTTP_USER_AGENT'], "webOS");

            //do something with this information
            if ($iPod || $iPhone || $iPad) {
                //browser reported as an iPhone/iPod touch -- do something here
            } else if ($Android) {
                echo ' <a href="https://play.google.com/store/apps/details?id=com.perfectproperties.app.ppc_app&hl=it">Play store</a>';
                //browser reported as an Android device -- do something here
            } else if ($webOS) {
                //browser reported as a webOS device -- do something here
            }

            ?>
            <div class="row">
                <?php
                foreach ($ds_video as $key => $item_video) {
                    if ($key == 0) {
                        echo ' <div class="col-md-7 col-sm-12">
                    <iframe allowfullscreen="allowfullscreen" id="main_video" width="100%" height="392" src="' . $item_video['url_video'] . '">
                    </iframe>
                </div>
                <div class="col-md-5 col-sm-12">
                    <h4 style="margin-top:-45px;"><b>{VideoCuaChungToi}</b> <div style="float:right">
                    <div class="goPrevious glyphicon glyphicon-triangle-left"></div>
                    <div class="goNext glyphicon glyphicon-triangle-right"></div></div></h4>
                    <hr style="width:100%;border:1px solid #362516;margin-left:0px;margin-top:25px;">';
                    } else {
                    }
                }
                ?>
                <div id="paging">
                    <div id="rows" style="padding-left: 0px"></div>
                    <div class="clr"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br><br><br>
    <!--phần container giới thiệu thứ 2-->

<?php include 'footer.php'; ?>