<div id="ModalXemThongTin" class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="margin: 0px;width: 100%;height: 100%">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 style="text-align:center;" class="modal-title" id="gridSystemModalLabel">{ThongTinCaNhan}</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <label>{HinhDaiDien}</label>
                        <div class="thumbnail input-group" style="text-align: center">
                            <img class="img-responsive"
                                 src="<?php echo ($my_profile['avatar'] == NULL) ? (BASE_DIR . 'img/default_avatar.png') : BASE_DIR.$my_profile['avatar'] ?>"
                                 id="img" src="" style="width: 150px;height: 170px;">
                        </div>
                        <div class="input-group" style="text-align: center">
                            <input type="file" name="imgProFile" id="imgProFile">
                        </div>
                    </div>
                </div>
                <!-- up file anh -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class=" input-group col-md-12 col-sm-12" id="banner_5">
                            <label class="col-md-3" style="padding-left: 0px">{GioiTinh}</label>
                            <label
                                class="radio-inline col-md-4"><input <?php echo ($my_profile['sex'] == 0) ? 'checked="checked"' : '' ?>
                                    type="radio" name="sexUpdate" value="0" id="sexUpdate">{Nam}</label>
                            <label class="radio-inline col-md-4"><input type="radio" name="sexUpdate" value="1"
                                                                        id="sexUpdate" <?php echo ($my_profile['sex'] == 1) ? 'checked="checked"' : '' ?> >{Nu}</label>
                        </div>
                    </div>
                </div>
                <div class="input-group col-sm-12" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="emailUpdate" type="text" class="form-control" name="emailUpdate"
                           value="<?= $my_profile['tendangnhap'] ?>" disabled
                           placeholder='{DiaChiEmail}'>
                </div>
                <div class="input-group col-sm-12" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                    <input id="nameUpdate" type="text" class="form-control" name="nameUpdate"
                           value="<?= $my_profile['hoten'] ?>"
                           placeholder='{HoTenDK}'>
                </div>
                <div class=" input-group col-sm-12" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    <input id="addressUpdate" type="text" class="form-control" name="addressUpdate"
                           value="<?= $my_profile['diachi'] ?>"
                           placeholder='{DiaChiDK}'>
                </div>
                <div class=" input-group col-sm-12" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                    <input id="numberPhoneUpdate" type="text" class="form-control" name="numberPhoneUpdate"
                           value="<?= $my_profile['dienthoai'] ?>"
                           placeholder='{DienThoaiDK}'>
                </div>
                <div class=" input-group col-sm-12" id="banner_5">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-gift"></i></span>
                    <label class="form-control">{TheUuDai}</label>
                </div>
                <div class=" input-group col-sm-12 text-right" id="banner_5">
                    <a href="#" onclick="return false;" class="trogiup" style="color:#660000;">{TimHieuThem}</a>
                    <div class="text-left" id="tro_giup" style="display: none;">
                        <ul style="list-style-type: none;padding-left: 0px">
                            <?php
                                foreach ($list_discount as $key => $voucher)
                                {
                                    echo '<li class="cauhoi">' . $voucher['name'] . ' - ' . $voucher['cost'];
                                    echo ($_SESSION['lang'] == "en") ? ' USD' : $exchange_rate . ' VND';
                                    echo '</li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <p><span style="color: red;" id="thongbaocapnhat"></span></p>
                <div class="modal-footer text-right">
                    <button type="submit" id="btnLuuThongTin" name="btnLuuThongTin" class="btn btn-primary">{NutDoiMatKhau}</button>
                    <button type="button" id="btnThoatThongTin" class="btn btn-default" data-dismiss="modal">{Thoat}</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal content -->