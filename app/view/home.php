<?php include 'header.php'; ?>
    <!--phần container giới thiệu thứ 1-->
    <section id="introduce">
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
        <section id="thamgia">
            <div class="row space">

                <div class="col-md-12 col-sm-12">
                    <hr class="text-left" style="width:50px;border:2px solid #362516;margin-left:0px;">
                    <h3>{ThamGia} PPC TIMESHARE</h3>
                </div>
                <div class="col-md-6 col-sm-12" id="banner_5">
                    <div class="media">
                        <div class="media-left" id="banner_5">
                            <?php echo "<img class='img-responsive' src='data:image/jpg;base64," . base64_encode($array_img[0]->getImageBlob()) . "' />"; ?>
                        </div>
                        <div class="media-right" id="banner_5">
                            <?php echo "<img class='img-responsive' src='data:image/jpg;base64," . base64_encode($array_img[1]->getImageBlob()) . "' />"; ?>

                        </div>
                    </div>
                    <div class="media">
                        <div class="media-body" id="banner_5">
                            <?php echo "<img class='img-responsive' src='data:image/jpg;base64," . base64_encode($array_img[2]->getImageBlob()) . "' />"; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12" id="banner_5">
                    <?php echo "<img class='img-responsive' src='data:image/jpg;base64," . base64_encode($array_img[3]->getImageBlob()) . "' />"; ?>
                </div>
                <div class="col-md-12 col-sm-12" id="banner_5">
                    <?php echo "<img class='img-responsive' src='data:image/jpg;base64," . base64_encode($array_img[4]->getImageBlob()) . "' />"; ?>
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
                    <a href="#" onclick="return false;" id="cauhoi" style="color:#660000;"><h4>{CauHoiThuongGap}</h4>
                    </a>
                    <div id="cau_hoi_thuong_gap" style="display: none;">
                        <ul>
                            <?php
                            foreach ($cau_hoi_thuong_gap as $key => $items_cau_hoi) {
                                echo '<li><a href="#" onclick="return false;">' . $items_cau_hoi['cauhoi'] . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <!--                    <a href="#" id="cachsudung" onclick="return false;" style="color:#660000;"><h4>{CachSuDung} PPC-->
                    <!--                            TIMESHARE</h4></a>-->
                    <!--                    <div id="cach_su_dung" style="display: none;">-->
                    <!--                        <ul>-->
                    <!--                            <li>Tại sao tôi không đăng nhập được?</li>-->
                    <!--                            <li>Tại sao tôi không đăng nhập được?</li>-->
                    <!--                            <li>Tại sao tôi không đăng nhập được?</li>-->
                    <!--                            <li>Tại sao tôi không đăng nhập được?</li>-->
                    <!--                            <li>Tại sao tôi không đăng nhập được?</li>-->
                    <!--                        </ul>-->
                    <!--                    </div>-->
                </div>
            </section>
            <section id="lienhe">
                <div class="col-md-12 col-sm-12">
                    <h4><b>{LienHe}</b></h4>
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

                    <div class="col-md-12 ">
                        <div class="input-group" style="width:100%">
                            <input type="submit" class="form-control"
                                   style="width:100%;border:1px solid grey; border-radius:2px;"
                                   aria-describedby="basic-addon1" id="btn_gui" value={Gui}>
                        </div>
                    </div>
            </section>
        </div>
        </form>
        <div class="col-md-12 col-sm-12" STYLE="margin-top: 50px; margin-bottom: 50px">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5748836254843!2d106.68554394907014!3d10.767209992290113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f181c80d37b%3A0x11f037e825f6300e!2zMjQ0IEPhu5FuZyBRdeG7s25oLCBQaOG6oW0gTmfFqSBMw6NvLCBRdeG6rW4gMSwgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1482477318231"
                width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="row space">
            <div class="col-md-12 col-sm-12">
                <hr class="text-left" style="width:70px;border:2px solid #660000;margin-left:0px;margin-bottom:0px;">
                <h4>PPC TIMESHARE TV</h4>
            </div>
            <?php
            foreach ($ds_video as $key => $item_video) {
                if ($key == 0) {
                    echo ' <div class="col-md-7 col-sm-12">
                    <iframe width="100%" height="380" src="' . $item_video['url_video'] . '">
                    </iframe>
                </div>
                <div class="col-md-5 col-sm-12">
                    <h4 style="margin-top:-45px;">{VideoCuaChungToi}</h4>
                    <hr style="width:100%;border:1px solid #362516;margin-left:0px;">';
                } else {
                    echo '  <div class="media">
                        <div class="media-left" style="width: 20%;height: 10%">
                            <img src="https://img.youtube.com/vi/' . substr($item_video['url_video'], 30) . '/0.jpg" style="width:100%;">
                        </div>
                        <div class="media-left">
                            <a href="#">' . $item_video['ten_video'] . '</a>
                        </div>
                    </div>';
                }
            }
            ?>
        </div>
    </div>
    </div>
    <br><br><br>
    <!--phần container giới thiệu thứ 2-->
    <hr class="text-left" style="width:100%;border:2px solid #362516;margin-left:0px;margin-bottom:0px;">
<?php include 'footer.php'; ?>